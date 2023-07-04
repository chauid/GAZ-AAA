import { useForm } from 'react-hook-form';

export interface IRegisterPostData {
  ID: string;
  PW: string;
}

export default function Register(toast: any) {
  const loginForm = useForm<IRegisterPostData>();

  function onValid(from: IRegisterPostData) {
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
