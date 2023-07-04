@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
@endsection

@section('title', '로그인 - 가즈-아(GAZ-AAA)')

@section('contents')
  <div id="Logins">
    <div className="Login_Window">
      <div className="InputForm">
        <div id="LoginForm"><h2>로그인</h2></div>
        <form action="/api/v1/login" method="POST">
          <div className="LoginForm">
            <label htmlFor="UserID">아이디</label>
            <input id="UserID" type="text" name="UserID" placeholder="아이디 입력(영문/숫자)" maxLength="15" pattern="^[a-zA-Z0-9]+$" required />
            <br />
            <label htmlFor="Password">비밀번호</label>
            <input id="Password" type="password" name="Password" placeholder="비밀번호 입력" maxLength="20" required />
          </div>
          <div className="LoginFrom-Nav">
            <a className="HelpBar" href="FindID.php">아이디 찾기</a>
            <a className="HelpBar" href="FindPW.php">비밀번호 찾기</a>
            <a className="HelpBar" href="Registry.php">회원가입</a>
          </div>
          <input type="submit" id="LoginButton" value="로그인" />
        </form>
      </div>
    </div>
  </div>
@endsection
