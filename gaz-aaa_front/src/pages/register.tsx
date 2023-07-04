import LayoutPage from '@components/page';

const Register = () => {
  const a = 1;
  return (
    <LayoutPage>
      <div className="Registry_Window">
        <div className="InputForm">
          <div id="Registry">
            <h2>회원가입</h2>
          </div>
          <form action="RegistryUser.php" method="POST">
            <div className="Registry">
              <label htmlFor="UserID">아이디*</label>
              <input type="text" name="UserID" placeholder="아이디 입력(영문/숫자)" minLength={3} maxLength={15} pattern="^[a-zA-Z0-9]+$" required />
              <br />
              <label htmlFor="UserName">이름*</label>
              <input type="text" name="UserName" placeholder="이름 입력" maxLength={15} required />
              <br />
              <label htmlFor="UserName">별칭(닉네임)*</label>
              <input type="text" name="UserNickName" placeholder="별칭 입력" maxLength={15} required />
              <br />
              <label htmlFor="UserPhone">휴대전화 번호*</label>
              <input type="text" name="UserPhone" placeholder="휴대전화 번호 '-'없이" pattern="[0-9]+" minLength={11} maxLength={11} required />
              <br />
              <label htmlFor="UserPW">비밀번호*</label>
              <input type="password" name="UserPW" placeholder="비밀번호 입력" minLength={8} maxLength={20} required />
              <br />
              <label htmlFor="UserPWChk">비밀번호 확인*</label>
              <input type="password" name="UserPWChk" placeholder="비밀번호 재입력" minLength={8} maxLength={20} required />
            </div>
            <input id="RegistryButton" type="submit" value="가입하기" />
          </form>
        </div>
      </div>
    </LayoutPage>
  );
};

export default Register;
