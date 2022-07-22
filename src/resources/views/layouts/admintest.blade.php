<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
    <div id="app">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="aside-nav">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">{{ config('app.name', 'Laravel') }}</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/admin" class="nav-link text-white {{ Route::currentRouteNamed('admin') ? 'active' : '' }}">
                        <i class="bi bi-house"></i>
                        Home
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin-dash') }}" class="nav-link text-white {{ Route::currentRouteNamed('admin-dash') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                      Dashboard
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin-orders') }}" class="nav-link text-white {{ Route::currentRouteNamed('admin-orders') ? 'active' : '' }}">
                        <i class="bi bi-receipt"></i>
                        Orders
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin-products') }}" class="nav-link text-white {{ Route::currentRouteNamed('admin-products') ? 'active' : '' }}">
                        <i class="bi bi-diagram-3"></i>
                        Products
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin-customers') }}" class="nav-link text-white {{ Route::currentRouteNamed('admin-customers') ? 'active' : '' }}">
                        <i class="bi bi-person-video2"></i>
                        Customers
                    </a>
                  </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a></li>
                </ul>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </div>
        </div>
        <main class="py-4">
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" id="status">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
