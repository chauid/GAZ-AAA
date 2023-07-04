import { Column } from 'primereact/column';
import { DataTable } from 'primereact/datatable';
import { Skeleton } from 'primereact/skeleton';
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

import LayoutPage from '@components/page';
import useHome, { ICoinListOnDay } from '@libs/hooks/use-home';

const Home = () => {
  const { coinlist, isLoading, error } = useHome();
  const [selectedProduct, setSelectedProduct] = useState<ICoinListOnDay>();

  const navigate = useNavigate();
  const loading: ICoinListOnDay[] = Array(20).fill({ coinName: '', coinSymbol: '', price: '', compareYesterday: 0 });
  const columnSkeleton = () => <Skeleton />;

  const print = coinlist.map((item, index) => (
    <div key={index}>
      {item.coinName}, price: {item.price}
    </div>
  ));
  return (
    <LayoutPage>
      <div className="HomeContents">
        <div className="grid-item">
          <div className="CointableTitle">
            <h2>실시간 급상승 코인</h2>
          </div>
          <DataTable
            value={isLoading || error ? loading : coinlist}
            size="small"
            scrollable
            selectionMode="single"
            selection={selectedProduct}
            onSelectionChange={(e) => {
              const coin = e.value as ICoinListOnDay;
              if (coin.coinSymbol) {
                setSelectedProduct(e.value as ICoinListOnDay);
                navigate(`/exchange?Coin=${coin.coinSymbol}`);
              }
            }}
            showGridlines
            scrollHeight="650px"
            tableStyle={{ minWidth: '10rem' }}
          >
            <Column align="center" field="coinName" body={isLoading || error ? columnSkeleton : ''} header="코인명" />
            <Column alignHeader="center" align="right" field="price" body={isLoading || error ? columnSkeleton : ''} header="현재가(KRW)" />
            <Column
              alignHeader="center"
              align="right"
              field="compareYesterday"
              body={isLoading || error ? columnSkeleton : ''}
              header="전일 대비(24H)"
            />
          </DataTable>
        </div>
        <div className="grid-item">
          <div className="CointableTitle">
            <h2>실시간 급하락 코인</h2>
          </div>
          {/* <table>
            <tr>
              <th>코인명</th>
              <th>현재가(KRW)</th>
              <th>전일대비(24H)</th>
            </tr>
          </table> */}
          {isLoading && <div>loading</div>}
          {coinlist && <div>{print}</div>}
        </div>
      </div>
    </LayoutPage>
  );
};

export default Home;
