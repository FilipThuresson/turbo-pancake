<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="height: 100vh;">
        <nav class="navbar navbar-expand-md navbar-light bg-dark text-white shadow-sm">

        </nav>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;" u>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                  Home
                </a>
              </li>
              <hr>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                  Dashboard
                </a>
              </li>
              <hr>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                  Orders
                </a>
              </li>
              <hr>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                  Products
                </a>
              </li>
              <hr>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                  Customers
                </a>
              </li>
            </ul>
          </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
