import { Link } from 'react-router-dom';

import Logo from '@assets/Logo.png';

function Footer() {
  return (
    <footer className="Footer">
      <div className="SiteInfo">
        <p className="address">고객 센터 | 010-007빵-빵야빵야 | 서울시 미추홀구 보람동215-2 | 고객 지원 안 합니다. 고객이 없어요!</p>
        <p>본 가상자산은 저위험 상품으로써 수익금의 전부 또는 일부 손실을 초래 할 수 있습니다.</p>
      </div>
      <div className="FooterContents">
        <Link className="Logo" to="/Home">
          <img className="FooterLogo" src={Logo} alt="GAZ-AAA" />
        </Link>
        <p>Designed by 누구게?</p>
      </div>
    </footer>
  );
}
export default Footer;
