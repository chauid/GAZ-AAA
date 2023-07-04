import { useForm } from 'react-hook-form';

export interface ILoginPostData {
  ID: string;
  PW: string;
}

export default function useLogin(toast: any) {
  const loginForm = useForm<ILoginPostData>();

  // 로그인 요청을 보내보자

  function onValid(from: ILoginPostData) {
    toast.current.show({ severity: 'success', summary: 'Form Submitted', detail: loginForm.getValues('PW') });
  }

  function onInvalid() {
    toast.current.show({ severity: 'warn', summary: 'Form Submitted', detail: loginForm.getValues('PW') });
  }

  return {
    loginForm,
    handleSubmit: loginForm.handleSubmit(onValid, onInvalid),
  };
}
