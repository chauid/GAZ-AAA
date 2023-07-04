import { Button } from 'primereact/button';
import { Link } from 'react-router-dom';

const NotFound = () => (
  <div className="NotFound">
    <div className="backBtn">
      <div>404 Not Found</div>
      <div>
        <Link to="home">
          <Button className="btn" label="홈으로 돌아가기" />
        </Link>
      </div>
    </div>
  </div>
);

export default NotFound;
