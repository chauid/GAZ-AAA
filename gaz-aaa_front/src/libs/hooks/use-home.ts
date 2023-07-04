import { useState, useEffect } from 'react';
import useSWR from 'swr';
import useSWRImmutable from 'swr/immutable';

export interface ICoinListOnDay {
  coinName: string;
  coinSymbol: string;
  price: string;
  compareYesterday: number;
}

export interface ICoinHistory {
  coinName: string;
}

export interface IGetCoinResponse {
  code: number;
  msssage: string;
  coinlist: ICoinListOnDay[];
}

export default function useHome() {
  const getCoinApi = `${import.meta.env.VITE_API_URL}/v1/getcoins`;
  const getCoinHistoryApi = `${import.meta.env.VITE_API_URL}/v1/getcoinhistory?count=1000`;
  const { data: dayCoins, isLoading, error } = useSWR<IGetCoinResponse>(getCoinApi, { refreshInterval: 1500 });
  const { data: yesterday } = useSWRImmutable<IGetCoinResponse>(getCoinHistoryApi);
  const [mCoinList, setMCoinList] = useState<ICoinListOnDay[]>([]);

  useEffect(() => {
    if (dayCoins) {
      setMCoinList(
        dayCoins.coinlist.map((coin) => {
          const priceToString = coin.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
          const newCoinItem: ICoinListOnDay = {
            ...coin,
            price: priceToString,
          };
          return newCoinItem;
        }),
      );
    }
  }, [dayCoins]);
  return {
    coinlist: mCoinList,
    isLoading,
    error,
  };
}
