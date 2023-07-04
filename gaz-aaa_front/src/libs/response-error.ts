interface IErrorInfo {
  ok: boolean;
  message: string;
  [key: string]: unknown;
}

export default class ResponseError extends Error {
  status: number | undefined;

  info: IErrorInfo | undefined;

  constructor(msg: string) {
    super(msg);
    Object.setPrototypeOf(this, ResponseError.prototype);
  }
}
