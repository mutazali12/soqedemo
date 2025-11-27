<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'سوقي - Souqi Marketplace')</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-shop text-primary"></i> سوقي
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            @lang('nav.home')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.products.index') }}">
                            @lang('nav.products')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.cart.index') }}">
                            <i class="bi bi-bag"></i> @lang('nav.cart')
                        </a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="{{ route('customer.dashboard') }}">@lang('nav.dashboard')</a></li>
                                <li><a class="dropdown-item" href="{{ route('customer.orders.index') }}">@lang('nav.my_orders')</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="dropdown-item">@lang('nav.logout')</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">@lang('nav.login')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">@lang('nav.register')</a>
                        </li>
                    @endauth
                    
                    <!-- Language Switcher -->
                    <li class="nav-item">
                        <div class="btn-group ms-2" role="group">
                            <a href="{{ route('set-locale', 'ar') }}" class="btn btn-sm btn-outline-primary {{ app()->getLocale() === 'ar' ? 'active' : '' }}">
                                العربية
                            </a>
                            <a href="{{ route('set-locale', 'en') }}" class="btn btn-sm btn-outline-primary {{ app()->getLocale() === 'en' ? 'active' : '' }}">
                                English
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Alerts -->
    @if ($errors->any())
        <div class="container mt-3">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>عن سوقي</h5>
                    <p>منصة تجارة إلكترونية عربية تجمع التجار والعملاء في مكان واحد.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">عن المنصة</a></li>
                        <li><a href="#" class="text-decoration-none text-light">الشروط والأحكام</a></li>
                        <li><a href="#" class="text-decoration-none text-light">سياسة الخصوصية</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>تواصل معنا</h5>
                    <p>
                        <i class="bi bi-telephone"></i> +966 1234 56789<br>
                        <i class="bi bi-envelope"></i> info@souqi.com
                    </p>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center">
                <p>&copy; 2025 سوقي - جميع الحقوق محفوظة</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    @vite('resources/js/app.js')
    @yield('scripts')
</body>
</html>
