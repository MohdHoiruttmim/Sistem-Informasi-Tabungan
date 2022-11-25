<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
</head>

<body>

  @section('container')
  <div class="container pt-32 px-56 mx-auto">
    @yield('content')
  </div>
  @show
</body>

</html>