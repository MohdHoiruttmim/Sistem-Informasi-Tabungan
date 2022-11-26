<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div class="container-wrapper flex">
    @yield('sidenav')
    @section('container')
    <div class="container pt-32 px-56 mx-auto">
      @yield('content')
    </div>
    @show
  </div>
</body>

</html>