import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { SWRConfig } from 'swr';

import ResponseError from '@libs/response-error';
import Exchange from '@pages/exchange';
import Home from '@pages/home';
import Login from '@pages/login';
import NotFound from '@pages/notfound';
import Register from '@pages/register';

import 'primereact/resources/themes/lara-light-indigo/theme.css';
import 'primereact/resources/primereact.min.css';
import '@styles/master.scss';

function App() {
  return (
    <SWRConfig
      value={{
        fetcher: (url: string) =>
          // eslint-disable-next-line implicit-arrow-linebreak
          fetch(url).then(async (res) => {
            if (!res.ok) {
              const error = new ResponseError('An error occurred while fetching the data.');
              error.info = await res.json();
              error.status = res.status;
              throw error;
            }
            return res.json();
          }),
      }}
    >
      <BrowserRouter>
        <Routes>
          <Route path="/" Component={Home} />
          <Route path="/home" Component={Home} />
          <Route path="/exchange" Component={Exchange} />
          <Route path="/investments" Component={Exchange} />
          <Route path="/profile" Component={Exchange} />
          <Route path="/login" Component={Login} />
          <Route path="/register" Component={Register} />
          <Route path="/notify" Component={Exchange} />
          <Route path="/*" Component={NotFound} />
        </Routes>
      </BrowserRouter>
    </SWRConfig>
  );
}

export default App;
