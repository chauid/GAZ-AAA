import { Link } from 'react-router-dom';

import Logo from '@assets/Logo.png';

function Header() {
  return (
    <header className="Header">
      <div className="HeaderNav">
        <Link to="/home">
          <div className="HeaderLogo">
            <img className="LogoImage" src={Logo} alt="GAZ-AAA" />
          </div>
        </Link>
        <p className="HeaderContents">
          <Link className="HeaderLink" to="/exchange">
            거래소
          </Link>
        </p>
        <p className="HeaderContents">
          <Link className="HeaderLink" to="/investments">
            투자내역
          </Link>
        </p>
        <p className="HeaderContents">
          <Link className="HeaderLink" to="/profile">
            내 정보
          </Link>
        </p>
      </div>
      <div className="HeaderLogin">
        <div className="HeaderLoginBox">
          <Link className="HeaderLoginLink" to="/login">
            로그인
          </Link>
        </div>
        <div className="HeaderLoginBox">
          <div className="HeaderLoginBox">
            <Link className="HeaderLoginLink" to="/register">
              회원가입
            </Link>
          </div>
        </div>
      </div>
    </header>
  );
}
export default Header;
