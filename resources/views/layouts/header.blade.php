<div class="HeaderNav">
  <a class="Logo" href="{{ route('home') }}"><img class="Logo" src="{{ asset('img/Logo.png') }}" alt="GAZ-AAA"></a>
  <p class="HeaderContents"><a class="HeaderLink" href="{{ route('exchange') }}">거래소</a></p>
  <p class="HeaderContents"><a class="HeaderLink" href="Investments.php">투자내역</a></p>
  <p class="HeaderContents"><a class="HeaderLink" href="Profile.php">내 정보</a></p>
</div>
<div class="HeaderLogin">
  <div class="HeaderLoginBox">
    @php
      if(Auth::check()) echo 'login';
      else echo 'not login';
    @endphp
    @auth
      <span><a class="HeaderLogin" href="{{ route('login') }}">로그인됨</a></span>
    @endauth
    @guest
      <span><a class="HeaderLink" href="{{ route('login') }}">로그인 하기</a></span>
    @endguest
  </div>
  <div class="HeaderLoginBox">
    @auth
      <span><a class="HeaderLink" href="{{ route('registry') }}">회원가입 안 해도 됨</a></span>
    @endauth
    @guest
      <span><a class="HeaderLink" href="{{ route('registry') }}">회원가입</a></span>
    @endguest
  </div>
</div>
