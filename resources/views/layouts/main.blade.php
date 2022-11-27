<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/app.css" rel="stylesheet">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
</head>

<body class="overflow-y-hidden">
  <div class="container-wrapper flex">
    @yield('sidenav')
    @section('container')
    <div class="container pt-32 px-56 mx-auto">
      @yield('content')
    </div>
    @show
  </div>
  @vite('resources/js/app.js')
  <!-- alternative  -->
  <!-- <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script> -->
</body>

</html>