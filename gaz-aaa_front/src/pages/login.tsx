import { InputText } from 'primereact/inputtext';
import { Password } from 'primereact/password';
import { Toast } from 'primereact/toast';
import { useRef } from 'react';

import LayoutPage from '@components/page';
import useLogin from '@libs/hooks/use-login';

const Login = () => {
  const toast = useRef(null);
  const { register, setValue, handleSubmit } = useLogin(toast);

  return (
    <LayoutPage>
      <div className="Login_Window">
        <div className="InputForm">
          <div className="LoginTitle">
            <h2>로그인</h2>
          </div>
          <Toast ref={toast} />
          <div className="LoginForm">
            <label>
              <span>ID</span>
              <InputText placeholder="아이디 입력(영문 + 숫자)" {...register('ID', { required: true })} />
              {/* <span>아이디</span>
                <input type="text" name="UserID" placeholder="아이디 입력(영문/숫자)" maxLength={15} pattern="^[a-zA-Z0-9]+$" required /> */}
            </label>
            <br />
            <label>
              <span>비밀번호</span>
              <Password placeholder="비밀번호 입력" autoComplete="on" feedback={false} {...register('PW')} />
            </label>
          </div>
          <a className="HelpBar" href="FindID.php">
            아이디 찾기
          </a>
          <a className="HelpBar" href="FindPW.php">
            비밀번호 찾기
          </a>
          <a className="HelpBar" href="Registry.php">
            회원가입
          </a>
          <input type="submit" className="LoginSubmit" value="로그인" onClick={handleSubmit} />
        </div>
      </div>
    </LayoutPage>
  );
};

export default Login;
