#pragma warning(disable : 4996)
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <time.h>
#include "/usr/include/mysql/mysql.h"
constexpr int CoinCount = 31; // 코인 개수
void ExcuteQuery(MYSQL* connect, char query[]); // 쿼리 실행 함수 
void NewCardIssue(char* CoinName, char* CoinNews, int* NewsContinuous, int* NewsEffect); // 뉴스 카드 발급 함수
int main()
{
    const char HOST[] = "localhost";
    const char HOSTNAME[] = "root";
    const char HOSTPW[] = "";
    const char DB[] = "coins";
    const int PORT = 3306;
    MYSQL* Connect;
    MYSQL_RES* Result = NULL;
    MYSQL_ROW Rows;
    int Status; // 쿼리 실행 여부
    time_t timer;
    struct tm t;
    srand((unsigned int)time(NULL)); // 프로그램 시작시 랜덤 시드
    Connect = mysql_init(NULL);
    printf("DB version:%s\n", mysql_get_client_info());
    if (mysql_real_connect(Connect, HOST, HOSTNAME, HOSTPW, DB, PORT, NULL, 0)) // DB 연결 성공 
    {
        printf("DB Connection Success\n\n");
        char Query[400] = { 0 }; // 쿼리문 최대 길이
        char CoinNames[CoinCount][20] = { 0, }; // 코인 CoinCount개 * 20바이트
        int CoinPrice[CoinCount] = { 0 }; // 코인 CoinCount개
        short CoinDelisting[CoinCount] = { 0 }; // 상폐 여부
        char CoinNews[CoinCount][100] = { 0, }; // 코인 CoinCount개 * 100바이트
        int CoinNewsContinuous[CoinCount] = { 0 }; // 뉴스 지속시간
        int CoinDelistingCount[CoinCount] = { 0 }; // 상폐 지속 시간(재상장 카운트다운)
        int CoinOpeningPrice[CoinCount] = { 0 }; // 코인 시가 
        int CoinLowPrice[CoinCount] = { 0 }; // 코인 저가 
        int CoinHighPrice[CoinCount] = { 0 }; // 코인 저가 
        int CoinClosingPrice[CoinCount] = { 0 }; // 코인 종가 
        int CoinOpeningPrice1[CoinCount] = { 0 }; // 코인 시가 - 1시간 
        int CoinLowPrice1[CoinCount] = { 0 }; // 코인 저가 - 1시간 
        int CoinHighPrice1[CoinCount] = { 0 }; // 코인 저가 - 1시간 
        int CoinClosingPrice1[CoinCount] = { 0 }; // 코인 종가 - 1시간 
        int CoinNewsEffect[CoinCount] = { 0 }; // 음수: 부정적인 뉴스, 양수: 긍정적인 뉴스 / 절대값이 클수록 효과가 큼 (-5 ~ +5)
        bool IsBackup = false; // 10분마다 backup 
        bool IsBackup1 = false; // 1시간마다 backup
        sprintf(Query, "%s", "SET names utf8");
        ExcuteQuery(Connect, Query);
        timer = time(NULL); // 1970년 1월 1일 0시 0분 0초부터 시작하여 현재까지의 초
        localtime_r(&timer, &t); // 포맷팅을 위해 구조체에 넣기
        int year = t.tm_year + 1900, month = t.tm_mon + 1, day = t.tm_mday, hour = t.tm_hour, minute = t.tm_min / 10; // 가공 분 = 실제 분 / 10
        // 시가 가져오기 = 이전 종가(직접 정해줌)
        printf("minute DB\n");
        mysql_select_db(Connect, "coinsdb");
        char SearchTable[30] = { 0 }; // 검색할 테이블 이름
        for (int i = 0; i < 48; i++) // 48 : 8시간 
        {
            minute -= 1; // 전 시간 DB 조회
            if (minute < 0) hour -= 1, minute = 5;
            if (hour < 0) // 0시 이전은 조회 X
            {
                hour = 0;
                for (int j = 0; j < CoinCount; j++)// 백업 DB 없을 경우 시가 = 기본 시장가(5000원)으로 설정 
                {
                    CoinOpeningPrice[j] = 5000; // 시가
                    CoinLowPrice[j] = 5000; // 저가
                    CoinHighPrice[j] = 5000; // 고가
                }
                break; // 백업DB 없음 -> 5000으로 초기화
            }
            sprintf(SearchTable, "%d%02d%02d_%02d_%dCoins", year, month, day, hour, minute);
            sprintf(Query, "SHOW TABLES LIKE '%s'", SearchTable);
            //printf("Query : %s", Query); // Debug
            Status = mysql_query(Connect, Query);
            if (Status != 0) printf("Error : %s\n", mysql_error(Connect));
            else
            {
                Result = mysql_store_result(Connect);
                if (mysql_fetch_row(Result) == NULL) printf("%s Not Found...\n", SearchTable);
                else
                {
                    sprintf(Query, "SELECT ClosingPrice FROM %s", SearchTable);
                    printf("%s Found.\n", SearchTable);
                    Status = mysql_query(Connect, Query);
                    if (Status != 0) printf("Error : %s\n", mysql_error(Connect));
                    else
                    {
                        int k = 0;
                        Result = mysql_store_result(Connect);
                        while ((Rows = mysql_fetch_row(Result)) != NULL)
                        {
                            CoinOpeningPrice[k] = atoi(Rows[0]);
                            CoinLowPrice[k] = atoi(Rows[0]);
                            CoinHighPrice[k] = atoi(Rows[0]);
                            k++;
                        }
                        break; // 백업DB 찾음 -> 값 불러오기 
                    }
                }
            }
        }
        printf("\nhour DB\n");
        year = t.tm_year + 1900, month = t.tm_mon + 1, day = t.tm_mday, hour = t.tm_hour; // 시간 재활용
        mysql_select_db(Connect, "coinsdb_hour");
        for (int i = 0; i < 8; i++) // 1시간 단위 불러오기 
        {
            hour -= 1;
            if (hour < 0) // 0시 이전은 조회 X
            {
                hour = 0;
                for (int j = 0; j < CoinCount; j++)// 백업 DB 없을 경우 시가 = 기본 시장가(5000원)으로 설정 
                {
                    CoinOpeningPrice1[j] = 5000; // 시가
                    CoinLowPrice1[j] = 5000; // 저가
                    CoinHighPrice1[j] = 5000; // 고가
                }
                break; // 백업DB 없음 -> 5000으로 초기화
            }
            sprintf(SearchTable, "%d%02d%02d_%02dCoins", year, month, day, hour);
            sprintf(Query, "SHOW TABLES LIKE '%s'", SearchTable);
            printf("Query : %s", Query); // Debug
            int Status;
            Status = mysql_query(Connect, Query);
            if (Status != 0) printf("Error : %s\n", mysql_error(Connect));
            else
            {
                Result = mysql_store_result(Connect);
                if (mysql_fetch_row(Result) == NULL) printf("%s Not Found...\n", SearchTable);
                else
                {
                    sprintf(Query, "SELECT ClosingPrice FROM %s", SearchTable);
                    printf("%s Found.\n", SearchTable);
                    Status = mysql_query(Connect, Query);
                    if (Status != 0) printf("Error : %s\n", mysql_error(Connect));
                    else
                    {
                        int k = 0;
                        Result = mysql_store_result(Connect);
                        while ((Rows = mysql_fetch_row(Result)) != NULL)
                        {
                            CoinOpeningPrice1[k] = atoi(Rows[0]);
                            CoinLowPrice1[k] = atoi(Rows[0]);
                            CoinHighPrice1[k] = atoi(Rows[0]);
                            k++;
                        }
                        break; // 백업DB 찾음 -> 값 불러오기 
                    }
                }
            }
        }
        mysql_select_db(Connect, "coins");
        while (1)
        {
            timer = time(NULL); // 1970년 1월 1일 0시 0분 0초부터 시작하여 현재까지의 초 
            localtime_r(&timer, &t); // 포맷팅을 위해 구조체에 넣기(변경된 시간 변수 초기화) 
            year = t.tm_year + 1900, month = t.tm_mon + 1, day = t.tm_mday, hour = t.tm_hour, minute = t.tm_min / 10; // 가공 분 = 실제 분 / 10
            //printf("%dyear %dmon %dd %dh %dm %ds\n", year, month, day, hour, minute, t.tm_sec);
            sprintf(Query, "SELECT * FROM coinlist"); // 코인 목록 가져오기
            Status = mysql_query(Connect, Query);
            if (Status != 0) printf("Error : %s\n", mysql_error(Connect));
            else
            {
                int i = 0;
                Result = mysql_store_result(Connect);
                while ((Rows = mysql_fetch_row(Result)) != NULL)
                {
                    sprintf(CoinNames[i], "%s", Rows[0]);
                    CoinPrice[i] = atoi(Rows[2]);
                    CoinDelisting[i] = atoi(Rows[3]);
                    CoinDelistingCount[i] = atoi(Rows[4]);
                    sprintf(CoinNews[i], "%s", Rows[5]);
                    CoinNewsContinuous[i] = atoi(Rows[6]);
                    CoinNewsEffect[i] = atoi(Rows[7]);
                    i++;
                }
                mysql_free_result(Result);
            }
            if (t.tm_min % 5 == 0 && t.tm_min % 10 != 0) IsBackup = false; // %5분마다 backup = false 
            if (t.tm_min % 10 == 0 && !IsBackup) // 10분마다 backup = true 
            {
                //printf("DB-Backup %d%02d%02d_%02d_%dCoins\n", year, month, day, hour, minute);
                mysql_select_db(Connect, "coinsdb");
                char CreateQuery[600];
                sprintf(CreateQuery, "CREATE TABLE %d%02d%02d_%02d_%dCoins (CoinName VARCHAR(20) NOT NULL COLLATE 'euckr_korean_ci', Price INT(11) NULL DEFAULT '0', ClosingPrice INT(11) NULL DEFAULT '0', LowPrice INT(11) NULL DEFAULT '0', HighPrice INT(11) NULL DEFAULT '0', PRIMARY KEY(CoinName) USING BTREE) COLLATE = 'euckr_korean_ci' ENGINE = InnoDB;", year, month, day, hour, minute);
                ExcuteQuery(Connect, CreateQuery);
                sprintf(Query, "INSERT INTO coinsdb.%d%02d%02d_%02d_%dCoins (CoinName, ClosingPrice) SELECT CoinName, Price FROM coins.coinlist;", year, month, day, hour, minute);
                ExcuteQuery(Connect, Query);
                for (int i = 0; i < CoinCount; i++)
                {
                    sprintf(Query, "UPDATE %d%02d%02d_%02d_%dCoins SET Price=%d, LowPrice=%d, HighPrice=%d WHERE CoinName='%s';", year, month, day, hour, minute, CoinOpeningPrice[i], CoinLowPrice[i], CoinHighPrice[i], CoinNames[i]);
                    ExcuteQuery(Connect, Query);
                    CoinOpeningPrice[i] = CoinPrice[i], CoinLowPrice[i] = CoinPrice[i], CoinHighPrice[i] = CoinPrice[i]; // 시가 = 저가 = 고가 = 현재가로 초기화 
                }
                sprintf(Query, "%s", "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'coinsdb';");
                Status = mysql_query(Connect, Query);
                Result = mysql_store_result(Connect);
                Rows = mysql_fetch_row(Result);
                int TableCount = atoi(Rows[0]);
                while (TableCount > 144)
                {
                    sprintf(Query, "%s", "SHOW TABLES;");
                    Status = mysql_query(Connect, Query);
                    Result = mysql_store_result(Connect);
                    Rows = mysql_fetch_row(Result);
                    sprintf(Query, "DROP TABLE %s", Rows[0]);
                    mysql_free_result(Result);
                    ExcuteQuery(Connect, Query);
                    sprintf(Query, "%s", "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'coinsdb';");
                    Status = mysql_query(Connect, Query);
                    Result = mysql_store_result(Connect);
                    Rows = mysql_fetch_row(Result);
                    TableCount = atoi(Rows[0]);
                    mysql_free_result(Result);
                }
                IsBackup = true;
                mysql_select_db(Connect, "coins");
            }
            if (t.tm_min % 30 == 0 && t.tm_min != 0) IsBackup1 = false; // %30분마다 backup1 = false 
            if (t.tm_min == 0 && !IsBackup1) // 1시간마다 backup1 = true 
            {
                char CreateQuery[600];
                //printf("DB-Backup %d%02d%02d_%02dCoins\n", year, month, day, hour);
                mysql_select_db(Connect, "coinsdb_hour");
                sprintf(CreateQuery, "CREATE TABLE %d%02d%02d_%02dCoins (CoinName VARCHAR(20) NOT NULL COLLATE 'euckr_korean_ci', Price INT(11) NULL DEFAULT '0', ClosingPrice INT(11) NULL DEFAULT '0', LowPrice INT(11) NULL DEFAULT '0', HighPrice INT(11) NULL DEFAULT '0', PRIMARY KEY(CoinName) USING BTREE) COLLATE = 'euckr_korean_ci' ENGINE = InnoDB;", year, month, day, hour);
                ExcuteQuery(Connect, CreateQuery);
                sprintf(Query, "INSERT INTO coinsdb_hour.%d%02d%02d_%02dCoins (CoinName, ClosingPrice) SELECT CoinName, Price FROM coins.coinlist;", year, month, day, hour);
                ExcuteQuery(Connect, Query);
                for (int i = 0; i < CoinCount; i++)
                {
                    sprintf(Query, "UPDATE %d%02d%02d_%02dCoins SET Price=%d, LowPrice=%d, HighPrice=%d WHERE CoinName='%s';", year, month, day, hour, CoinOpeningPrice1[i], CoinLowPrice1[i], CoinHighPrice1[i], CoinNames[i]);
                    ExcuteQuery(Connect, Query);
                    CoinOpeningPrice1[i] = CoinPrice[i], CoinLowPrice1[i] = CoinPrice[i], CoinHighPrice1[i] = CoinPrice[i]; // 시가 = 저가 = 고가 = 현재가로 초기화 
                }
                sprintf(Query, "%s", "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'coinsdb_hour';");
                Status = mysql_query(Connect, Query);
                Result = mysql_store_result(Connect);
                Rows = mysql_fetch_row(Result);
                int TableCount = atoi(Rows[0]);
                while (TableCount > 920) // 23 * 40 
                {
                    sprintf(Query, "%s", "SHOW TABLES;");
                    Status = mysql_query(Connect, Query);
                    Result = mysql_store_result(Connect);
                    Rows = mysql_fetch_row(Result);
                    sprintf(Query, "DROP TABLE %s", Rows[0]);
                    mysql_free_result(Result);
                    ExcuteQuery(Connect, Query);
                    sprintf(Query, "%s", "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'coinsdb_hour';");
                    Status = mysql_query(Connect, Query);
                    Result = mysql_store_result(Connect);
                    Rows = mysql_fetch_row(Result);
                    TableCount = atoi(Rows[0]);
                    mysql_free_result(Result);
                }
                IsBackup1 = true;
                mysql_select_db(Connect, "coins");
            }
            for (int i = 0; i < CoinCount; i++)
            {
                int Fluctuation = CoinPrice[i];
                if (CoinNewsContinuous[i] == 0) sprintf(CoinNews[i], "%s", "");
                if (CoinNewsContinuous[i] < 0) CoinNewsContinuous[i] = 0; // 뉴스 없을 때 -1
                /* 변동 알고리즘 */
                // 기본 변동률 적용 : 뉴스 없음 
                int NoNews = rand() % 11; // 뉴스 없을 때 변동 확률 
                if (NoNews < 3) Fluctuation += 0; // 변동 없음 27% 
                else if (NoNews > 6) // 상승 36%
                {
                    if (strcmp(CoinNames[i], "가자코인") == 0) Fluctuation += (rand() % 10) + 1;
                    if (strcmp(CoinNames[i], "까스") == 0) Fluctuation += (rand() % 20) + 1;
                    if (strcmp(CoinNames[i], "디카르코") == 0) Fluctuation += (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "람다토큰") == 0) Fluctuation += (rand() % 10) + 1;
                    if (strcmp(CoinNames[i], "리퍼리음") == 0) Fluctuation += (rand() % 2) + 1;
                    if (strcmp(CoinNames[i], "리풀") == 0) Fluctuation += (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "비투코인") == 0) Fluctuation += (rand() % 100) + 1;
                    if (strcmp(CoinNames[i], "새럼") == 0) Fluctuation += (rand() % 3) + 1;
                    if (strcmp(CoinNames[i], "서브프레임") == 0) Fluctuation += (rand() % 2) + 1;
                    if (strcmp(CoinNames[i], "센드박스") == 0) Fluctuation += (rand() % 11) + 1;
                    if (strcmp(CoinNames[i], "솔리나") == 0) Fluctuation += (rand() % 30) + 1;
                    if (strcmp(CoinNames[i], "스틤") == 0) Fluctuation += (rand() % 7) + 1;
                    if (strcmp(CoinNames[i], "스틤달러") == 0) Fluctuation += (rand() % 15) + 1;
                    if (strcmp(CoinNames[i], "승환토큰") == 0) Fluctuation += (rand() % 3) + 1;
                    if (strcmp(CoinNames[i], "시바코인") == 0) Fluctuation += (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "썸띵") == 0) Fluctuation += (rand() % 6) + 1;
                    if (strcmp(CoinNames[i], "아르곳") == 0) Fluctuation += (rand() % 6) + 1;
                    if (strcmp(CoinNames[i], "아이쿠") == 0) Fluctuation += (rand() % 2) + 1;
                    if (strcmp(CoinNames[i], "아화토큰") == 0) Fluctuation += (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "앱토수") == 0) Fluctuation += (rand() % 17) + 1;
                    if (strcmp(CoinNames[i], "에이더") == 0) Fluctuation += (rand() % 15) + 1;
                    if (strcmp(CoinNames[i], "엑스인피니티") == 0) Fluctuation += (rand() % 20) + 1;
                    if (strcmp(CoinNames[i], "웨이부") == 0) Fluctuation += (rand() % 12) + 1;
                    if (strcmp(CoinNames[i], "위밋스") == 0) Fluctuation += (rand() % 16) + 1;
                    if (strcmp(CoinNames[i], "이더리음") == 0) Fluctuation += (rand() % 70) + 1;
                    if (strcmp(CoinNames[i], "체인링쿠") == 0) Fluctuation += (rand() % 30) + 1;
                    if (strcmp(CoinNames[i], "칠리츠") == 0) Fluctuation += (rand() % 11) + 1;
                    if (strcmp(CoinNames[i], "코스모수") == 0) Fluctuation += (rand() % 18) + 1;
                    if (strcmp(CoinNames[i], "폴리콘") == 0) Fluctuation += (rand() % 11) + 1;
                    if (strcmp(CoinNames[i], "풀로우") == 0) Fluctuation += (rand() % 18) + 1;
                    if (strcmp(CoinNames[i], "헌투") == 0) Fluctuation += (rand() % 6) + 1;
                }
                else // 하락 36%
                {
                    if (strcmp(CoinNames[i], "가자코인") == 0) Fluctuation -= (rand() % 10) + 1;
                    if (strcmp(CoinNames[i], "까스") == 0) Fluctuation -= (rand() % 20) + 1;
                    if (strcmp(CoinNames[i], "디카르코") == 0) Fluctuation -= (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "람다토큰") == 0) Fluctuation -= (rand() % 10) + 1;
                    if (strcmp(CoinNames[i], "리퍼리음") == 0) Fluctuation -= (rand() % 2) + 1;
                    if (strcmp(CoinNames[i], "리풀") == 0) Fluctuation -= (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "비투코인") == 0) Fluctuation -= (rand() % 100) + 1;
                    if (strcmp(CoinNames[i], "새럼") == 0) Fluctuation -= (rand() % 3) + 1;
                    if (strcmp(CoinNames[i], "서브프레임") == 0) Fluctuation -= (rand() % 2) + 1;
                    if (strcmp(CoinNames[i], "센드박스") == 0) Fluctuation -= (rand() % 11) + 1;
                    if (strcmp(CoinNames[i], "솔리나") == 0) Fluctuation -= (rand() % 30) + 1;
                    if (strcmp(CoinNames[i], "스틤") == 0) Fluctuation -= (rand() % 7) + 1;
                    if (strcmp(CoinNames[i], "스틤달러") == 0) Fluctuation -= (rand() % 15) + 1;
                    if (strcmp(CoinNames[i], "승환토큰") == 0) Fluctuation -= (rand() % 3) + 1;
                    if (strcmp(CoinNames[i], "시바코인") == 0) Fluctuation -= (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "썸띵") == 0) Fluctuation -= (rand() % 6) + 1;
                    if (strcmp(CoinNames[i], "아르곳") == 0) Fluctuation -= (rand() % 6) + 1;
                    if (strcmp(CoinNames[i], "아이쿠") == 0) Fluctuation -= (rand() % 2) + 1;
                    if (strcmp(CoinNames[i], "아화토큰") == 0) Fluctuation -= (rand() % 4) + 1;
                    if (strcmp(CoinNames[i], "앱토수") == 0) Fluctuation -= (rand() % 17) + 1;
                    if (strcmp(CoinNames[i], "에이더") == 0) Fluctuation -= (rand() % 15) + 1;
                    if (strcmp(CoinNames[i], "엑스인피니티") == 0) Fluctuation -= (rand() % 20) + 1;
                    if (strcmp(CoinNames[i], "웨이부") == 0) Fluctuation -= (rand() % 12) + 1;
                    if (strcmp(CoinNames[i], "위밋스") == 0) Fluctuation -= (rand() % 16) + 1;
                    if (strcmp(CoinNames[i], "이더리음") == 0) Fluctuation -= (rand() % 70) + 1;
                    if (strcmp(CoinNames[i], "체인링쿠") == 0) Fluctuation -= (rand() % 30) + 1;
                    if (strcmp(CoinNames[i], "칠리츠") == 0) Fluctuation -= (rand() % 11) + 1;
                    if (strcmp(CoinNames[i], "코스모수") == 0) Fluctuation -= (rand() % 18) + 1;
                    if (strcmp(CoinNames[i], "폴리콘") == 0) Fluctuation -= (rand() % 11) + 1;
                    if (strcmp(CoinNames[i], "풀로우") == 0) Fluctuation -= (rand() % 18) + 1;
                    if (strcmp(CoinNames[i], "헌투") == 0) Fluctuation -= (rand() % 6) + 1;
                }
                if (CoinNewsEffect[i] != 0)
                {
                    int Percentage = rand() % 5 + 1; // 뉴스 있을 경우, 변동폭 확률 
                    Fluctuation += ((abs(CoinPrice[i] - Fluctuation) / 2) * Percentage) * CoinNewsEffect[i]; // 뉴스 있음 : 추가 변동률 적용 
                }
                if (Fluctuation < CoinLowPrice[i]) CoinLowPrice[i] = Fluctuation; // 저가
                if (Fluctuation > CoinHighPrice[i]) CoinHighPrice[i] = Fluctuation; // 고가
                if (CoinLowPrice[i] < 0) CoinLowPrice[i] = 0; // 저가 0원 보정
                if (Fluctuation < CoinLowPrice1[i]) CoinLowPrice1[i] = Fluctuation; // 저가 - 1시간 
                if (Fluctuation > CoinHighPrice1[i]) CoinHighPrice1[i] = Fluctuation; // 고가 - 1시간 
                if (CoinLowPrice1[i] < 0) CoinLowPrice1[i] = 0; // 저가 0원 보정 - 1시간 
                if (CoinDelistingCount[i] == 0) // 재상장
                {
                    CoinDelisting[i] = 0; // 재상장
                    CoinNewsEffect[i] = 1; // 재상장시 상승률 보장
                    sprintf(CoinNews[i], "%s 재상장!", CoinNames[i]);
                    if (strcmp(CoinNames[i], "가자코인") == 0) CoinPrice[i] = 4000;
                    if (strcmp(CoinNames[i], "까스") == 0) CoinPrice[i] = 12000;
                    if (strcmp(CoinNames[i], "디카르코") == 0) CoinPrice[i] = 520;
                    if (strcmp(CoinNames[i], "람다토큰") == 0) CoinPrice[i] = 200;
                    if (strcmp(CoinNames[i], "리퍼리음") == 0) CoinPrice[i] = 190;
                    if (strcmp(CoinNames[i], "리풀") == 0) CoinPrice[i] = 830;
                    if (strcmp(CoinNames[i], "비투코인") == 0) CoinPrice[i] = 3500000;
                    if (strcmp(CoinNames[i], "새럼") == 0) CoinPrice[i] = 1100;
                    if (strcmp(CoinNames[i], "서브프레임") == 0) CoinPrice[i] = 30;
                    if (strcmp(CoinNames[i], "센드박스") == 0) CoinPrice[i] = 260;
                    if (strcmp(CoinNames[i], "솔리나") == 0) CoinPrice[i] = 23000;
                    if (strcmp(CoinNames[i], "스틤") == 0) CoinPrice[i] = 600;
                    if (strcmp(CoinNames[i], "스틤달러") == 0) CoinPrice[i] = 1200;
                    if (strcmp(CoinNames[i], "승환토큰") == 0) CoinPrice[i] = 100;
                    if (strcmp(CoinNames[i], "시바코인") == 0) CoinPrice[i] = 140;
                    if (strcmp(CoinNames[i], "썸띵") == 0) CoinPrice[i] = 94;
                    if (strcmp(CoinNames[i], "아르곳") == 0) CoinPrice[i] = 110;
                    if (strcmp(CoinNames[i], "아이쿠") == 0) CoinPrice[i] = 46;
                    if (strcmp(CoinNames[i], "아화토큰") == 0) CoinPrice[i] = 148;
                    if (strcmp(CoinNames[i], "앱토수") == 0) CoinPrice[i] = 8000;
                    if (strcmp(CoinNames[i], "에이더") == 0) CoinPrice[i] = 260;
                    if (strcmp(CoinNames[i], "엑스인피니티") == 0) CoinPrice[i] = 8500;
                    if (strcmp(CoinNames[i], "웨이부") == 0) CoinPrice[i] = 1900;
                    if (strcmp(CoinNames[i], "위밋스") == 0) CoinPrice[i] = 630;
                    if (strcmp(CoinNames[i], "이더리음") == 0) CoinPrice[i] = 1250000;
                    if (strcmp(CoinNames[i], "체인링쿠") == 0) CoinPrice[i] = 11500;
                    if (strcmp(CoinNames[i], "칠리츠") == 0) CoinPrice[i] = 130;
                    if (strcmp(CoinNames[i], "코스모수") == 0) CoinPrice[i] = 4000;
                    if (strcmp(CoinNames[i], "폴리콘") == 0) CoinPrice[i] = 1300;
                    if (strcmp(CoinNames[i], "풀로우") == 0) CoinPrice[i] = 1050;
                    if (strcmp(CoinNames[i], "헌투") == 0) CoinPrice[i] = 75;
                    CoinNewsContinuous[i] = 600; // 10분 동안 재상장 알림
                    sprintf(Query, "UPDATE coinlist SET Price=%d, Delisting=0, DelistingCount=-1, News='%s', NewsContinuous=%d, NewsEffect=%d WHERE CoinName='%s'", CoinPrice[i], CoinNews[i], CoinNewsContinuous[i], CoinNewsEffect[i], CoinNames[i]);
                    ExcuteQuery(Connect, Query);
                    continue;
                }
                if (Fluctuation <= 0 && CoinDelisting[i] == 0) // 최초 상장 폐지
                {
                    Fluctuation = 0;
                    sprintf(CoinNews[i], "%s 상장폐지!", CoinNames[i]);
                    CoinDelistingCount[i] = 600 + rand() % 150; // 최소 10분 이상 상폐
                    CoinNewsContinuous[i] = CoinDelistingCount[i];
                    sprintf(Query, "UPDATE coinlist SET Price=0, Delisting=1, DelistingCount=%d, News='%s', NewsContinuous=%d, NewsEffect=0 WHERE CoinName='%s'", CoinDelistingCount[i], CoinNews[i], CoinNewsContinuous[i], CoinNames[i]);
                    ExcuteQuery(Connect, Query);
                    continue;
                }
                if (CoinDelisting[i] == 1 && CoinDelistingCount[i] != -1) // 상장 폐지 중
                {
                    sprintf(Query, "UPDATE coinlist SET Price=0, DelistingCount=%d, NewsContinuous=%d WHERE CoinName='%s' AND Delisting=1", --CoinDelistingCount[i], --CoinNewsContinuous[i], CoinNames[i]);
                }
                else
                {
                    NewCardIssue(CoinNames[i], CoinNews[i], &CoinNewsContinuous[i], &CoinNewsEffect[i]);
                    sprintf(Query, "UPDATE coinlist SET Price=%d, Delisting=%d, News='%s', NewsContinuous=%d, NewsEffect=%d WHERE CoinName='%s' AND Delisting=0", Fluctuation, CoinDelisting[i], CoinNews[i], --CoinNewsContinuous[i], CoinNewsEffect[i], CoinNames[i]);
                }
                ExcuteQuery(Connect, Query);
            }
            sleep(2); // 2초
        }
        mysql_close(Connect);
    }
    else printf("DB Connection Fail\n\n");
    return 0;
}
void ExcuteQuery(MYSQL* connect, char query[])
{
    MYSQL_RES* Result;
    int Status;
    Status = mysql_query(connect, query);
    if (Status != 0) printf("Error : %s\n", mysql_error(connect));
    else Result = mysql_store_result(connect);
}
void NewCardIssue(char* CoinName, char* CoinNews, int* NewsContinuous, int* NewsEffect)
{
    int RandomNews = rand() % 5;
    if (strcmp(CoinName, "가자코인") == 0 && *NewsContinuous == 0) // 뉴스가 없을 때
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "가즈아~~~~~~~!!!");
            *NewsEffect = 5;
            break;
        case 1:
            sprintf(CoinNews, "%s", "으아아아~~~~~~~~~악!!");
            *NewsEffect = -5;
            break;
        case 2:
            sprintf(CoinNews, "%s", "가즈아~~~~~~~!!!");
            *NewsEffect = 5;
            break;
        case 3:
            sprintf(CoinNews, "%s", "으아아아~~~~~~~~~악!!");
            *NewsEffect = -5;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0;
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "까스") == 0 && *NewsContinuous == 0) // 뉴스가 없을 때
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "도시까스 가격 인상 계획안 발표!");
            *NewsEffect = 2;
            break;
        case 1:
            sprintf(CoinNews, "%s", "시민들, 까스비 너무 비싸다! 이에 도시까스 가격 인하.");
            *NewsEffect = -2;
            break;
        case 2:
            sprintf(CoinNews, "%s", "까스공사측, 까스비 안정화 노력...");
            *NewsEffect = 1;
            break;
        case 3:
            sprintf(CoinNews, "%s", "까스공사 적자 소식.");
            *NewsEffect = -1;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0;
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "디카르코") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "물류센터의 물류 요청 급증!");
            *NewsEffect = 4;
            break;
        case 1:
            sprintf(CoinNews, "%s", "디카르코 데이터 센터 화재 발생!");
            *NewsEffect = -4;
            break;
        case 2:
            sprintf(CoinNews, "%s", "새로운 물류 네트워크 기획안 발표.");
            *NewsEffect = 2;
            break;
        case 3:
            sprintf(CoinNews, "%s", "물류네트워크 수요 증가 소식.");
            *NewsEffect = -2;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "람다토큰") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "동영상 플랫폼의 주요 화폐로 람다 토큰 사용을 권장하는 추세.");
            *NewsEffect = 4;
            break;
        case 1:
            sprintf(CoinNews, "%s", "람다 플랫폼, 불건전한 동영상 유포되다!");
            *NewsEffect = -5;
            break;
        case 2:
            sprintf(CoinNews, "%s", "람다 플랫폼, 보안 강화 프로젝트 실행.");
            *NewsEffect = 2;
            break;
        case 3:
            sprintf(CoinNews, "%s", "이번 분기, 동영상 플랫폼 수요량 감소.");
            *NewsEffect = -1;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "리퍼리음") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
            case 0:
                sprintf(CoinNews, "%s", "새로운 인디 게임사 탄생! 리퍼리음 수요 증가!");
                *NewsEffect = 3;
                break;
            case 1:
                sprintf(CoinNews, "%s", "게임 수요 감소에 따른 인디 게임사 마케팅 부담 증가.");
                *NewsEffect = -1;
                break;
            case 2:
                sprintf(CoinNews, "%s", "모든 게임사의 활발한 마케팅 경쟁!");
                *NewsEffect = 3;
                break;
            case 3:
                sprintf(CoinNews, "%s", "셧다운제 부활 소식에 인디 게임사들 대규모 경영 위기!!");
                *NewsEffect = -5;
                break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "리풀") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "리풀코인, 압도적인 거래 속도에 모두가 놀라!");
            *NewsEffect = 4;
            break;
        case 1:
            sprintf(CoinNews, "%s", "리풀 코인 송금 타이밍 실패, 이용자의 불만 토로...");
            *NewsEffect = -3;
            break;
        case 2:
            sprintf(CoinNews, "%s", "블록체인 네트워크에서 “리풀코인”, 성장 가능성 화폐 TOP10에 선정.");
            *NewsEffect = 3;
            break;
        case 3:
            sprintf(CoinNews, "%s", "리풀코인, 갑작스런 하락세 관측.");
            *NewsEffect = -4;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "비투코인") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "암호화폐 거래 중 가장 안전한 암호화폐에 “비투코인” 선정.");
            *NewsEffect = 2;
            break;
        case 1:
            sprintf(CoinNews, "%s", "암호화폐 거래 규제, 화폐 가격 하락 우려.");
            *NewsEffect = -1;
            break;
        case 2:
            sprintf(CoinNews, "%s", "비투코인 끝없는 상승세, “가상화폐는 다 잃어도 되는 사람만 투자해야.”");
            *NewsEffect = 4;
            break;
        case 3:
            sprintf(CoinNews, "%s", "비투코인 붕괴 소식 들려와...");
            *NewsEffect = -5;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "새럼") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "FTZ 암호화폐 거래소 이용객 늘어...");
            *NewsEffect = 3;
            break;
        case 1:
            sprintf(CoinNews, "%s", "FTZ, “고객 자금 관리 허술하다.” 투자자들 눈물...");
            *NewsEffect = -3;
            break;
        case 2:
            sprintf(CoinNews, "%s", "세계 4위권 암호화페 거래소에 FTZ 등극.");
            *NewsEffect = 4;
            break;
        case 3:
            sprintf(CoinNews, "%s", "FTZ 파산 위기! 가상화페 몰락의 시작?");
            *NewsEffect = -4;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "서브프레임") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "센드박스") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "블록체인 게임 유행, 센드박스 코인 사용량 급증!");
            *NewsEffect = 3;
            break;
        case 1:
            sprintf(CoinNews, "%s", "센드박스 51% 공격으로 이중지불 피해 발생! 알고보니 자신이 만든 게임이 안 팔린 유저들의 분노.");
            *NewsEffect = -4;
            break;
        case 2:
            sprintf(CoinNews, "%s", "폭스에딧 이용자 늘어, 센드박스 코인 거래량 증가 전망.");
            *NewsEffect = 3;
            break;
        case 3:
            sprintf(CoinNews, "%s", "모래 상자 안에 모래가 모두 고갈나는 사태 발생! 아이들, 더 이상 모래성 못 만들어 오열... ");
            *NewsEffect = -2;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%) 
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "솔리나") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "스틤") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "스틤달러") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "승환토큰") == 0 && *NewsContinuous == 0) // 뉴스가 없을 때
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "“서승환식 포르테” 연비 30.7KM 달성, 하이브리드 차주도 모두 놀라!");
            *NewsEffect = 4;
            break;
        case 1:
            sprintf(CoinNews, "%s", "서모씨, 음주 단속중 꼬깔콘 쳐 “충격”");
            *NewsEffect = -5;
            break;
        case 2:
            sprintf(CoinNews, "%s", "일본이 절망하고 세계가 열광하며 외신이 주목하는 “서승환식 포르테”");
            *NewsEffect = 4;
            break;
        case 3:
            sprintf(CoinNews, "%s", "서모씨, 포르테 시승해 브랜드 가치 하락!");
            *NewsEffect = -3;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0;
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "시바코인") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "시바코인, 금성갈 때 사용할 필수 코인으로 선언!");
            *NewsEffect = 5;
            break;
        case 1:
            sprintf(CoinNews, "%s", "일론 머슼흐, 전라도 영광 출신으로 밝혀져... 충격!");
            *NewsEffect = -5;
            break;
        case 2:
            sprintf(CoinNews, "%s", "일론 머슼흐, “금성 갈끄니까~” 선언.");
            *NewsEffect = 4;
            break;
        case 3:
            sprintf(CoinNews, "%s", "스페이스에쓰, 로켓 추락 소식.");
            *NewsEffect = -4;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "썸띵") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "아르곳") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "아이쿠") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "아화토큰") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "앱토수") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "앱토수, 삼댜수 판매량 돌파!");
            *NewsEffect = 3;
            break;
        case 1:
            sprintf(CoinNews, "%s", "앱토수에서 유해물질 검출! 사람들의 앱토수 거부 반응 증가.");
            *NewsEffect = -4;
            break;
        case 2:
            sprintf(CoinNews, "%s", "오늘의 물건강 소식: “앱토수, 최고의 식수다.”");
            *NewsEffect = 3;
            break;
        case 3:
            sprintf(CoinNews, "%s", "물 시장 경쟁 증가로 앱토수의 입지 흔들려-...");
            *NewsEffect = -2;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "에이더") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "엑스인피니티") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "웨이부") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "위밋스") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "이더리음") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "가상화폐 채굴 붐! 공장 사장들, 채굴장 사업으로 전환");
            *NewsEffect = 2;
            break;
        case 1:
            sprintf(CoinNews, "%s", "채굴장 규제 강화, 그래픽카드 시장 포화상태");
            *NewsEffect = -4;
            break;
        case 2:
            sprintf(CoinNews, "%s", "이더리음, 올해의 가상화폐 TOP3 선정!");
            *NewsEffect = 1;
            break;
        case 3:
            sprintf(CoinNews, "%s", "블록체인 암호화 기술의 발전, 채굴하기 더 어려워져...");
            *NewsEffect = -4;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "체인링쿠") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "칠리츠") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "코스모수") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "폴리콘") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "풀로우") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
    else if (strcmp(CoinName, "헌투") == 0 && *NewsContinuous == 0)
    {
        switch (RandomNews)
        {
        case 0:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 1:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 2:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        case 3:
            sprintf(CoinNews, "%s", "");
            *NewsEffect = 0;
            break;
        default:
            sprintf(CoinNews, "%s", ""); // 3 ~ 4 뉴스 없음. 3 / 5 확률로 뉴스 
            *NewsEffect = 0; // 상승세 보장 (상승률:50%)
            break;
        }
        *NewsContinuous = 300 + rand() % 150; // 5분 이상 지속
    }
}