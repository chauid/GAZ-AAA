<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/Master.css') }}">
  @yield('style')
  <title>@yield('title', 'None title')</title>
  @viteReactRefresh
  @vite('resources/js/app.jsx')
</head>

<body>
  <div class="Header">
    @include('layouts.header')
  </div>

  <div class="Contents">
    @yield('contents')
  </div>

  <div class="Footer">
    @include('layouts.footer')
  </div>
</body>

</html>
