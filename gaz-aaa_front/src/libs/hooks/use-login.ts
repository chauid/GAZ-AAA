import { useForm } from 'react-hook-form';

import useMutation from '@libs/use-mutation';

export interface ILoginPostData {
  ID: string;
  PW: string;
}

export default function useLogin(toast: any) {
  const apiURL = `${import.meta.env.VITE_API_URL}/v1/login`;
  const { register, setValue, getValues, handleSubmit } = useForm<ILoginPostData>();
  const [mutation, { data, loading, error }] = useMutation<ILoginPostData>(apiURL);

  async function onValid(form: ILoginPostData) {
    mutation(form);

    // if (loading) {
    //   return;
    // }

    console.log(error);
    await toast.current.show({ severity: 'success', summary: '로그인...', detail: error });
  }

  function onInvalid() {
    toast.current.show({ severity: 'warn', summary: '로그인 오류', detail: '아이디와 비밀번호를 확인해주세요' });
  }

  return {
    register,
    setValue,
    getValues,
    handleSubmit: handleSubmit(onValid, onInvalid),
  };
}
