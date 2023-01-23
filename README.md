# PHP-Web Server Files
웹서버 프로그래밍 과제물 문서화 목적 저장소입니다.   
모든 문서는 PHP 기반으로 작성되었습니다.   
서버 주소 : [**http://34.168.223.254**](http://34.168.223.254)

## 1. 페이지 파일
> 모든 페이지 파일은 Page 폴더에 있습니다.   
> 실질적인 서버 파일은 PHP 파일이 있는 [Page](https://github.com/chauid/PHP-Web/tree/main/ServerFiles/Page)와 스타일시트가 있는 [StyleSheet](https://github.com/chauid/PHP-Web/tree/main/ServerFiles/StyleSheet) 로 구성되어있습니다.

## 2. Backup DB
> 디버그를 하기 위해 만든 Coin 정보가 있는 DB 생성 스키마 파일입니다.   
> 실제 서버와 같은 스키마입니다.

## 3. Update Coin DB
> 서버에 있는 Coins DB의 값을 인위적으로 변동하여 DB에 Update하는 프로그램입니다.   
> 이 프로그램은 C언어로 작성되었습니다.   
> 실제 빌드를 리눅스에 하기 때문에 윈도우 환경에서 빌드한 소스코드와 차이가 있습니다.   
> 윈도우 소스코드 : [Coins.cpp](https://github.com/chauid/PHP-Web/blob/main/ServerFiles/UpdateDB/CoinDB/CoinDB/CoinDB.cpp)   
> 리눅스 소스코드 : [ForLinux.cpp](https://github.com/chauid/PHP-Web/blob/main/ServerFiles/UpdateDB/CoinDB/CoinDB/ForLinux.cpp)
