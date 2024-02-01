<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JualannyaSepy | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="/sepy/logo-trans.png"/>
    <link rel="stylesheet" href="/assets/css/styles.min.css"/>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/sepy/logo-trans.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            JualanSepy
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <div class="d-flex" >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/product">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cart">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="/order">Order</a></li>
                    @auth
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="nav-link btn btn-secondary" style="margin-left: 1cm;">Logout</button>
                            </form>
                        </li>
                    @elseguest
                        <li class="nav-item">
                            <a href="/login" class="nav-link btn btn-secondary" style="margin-left: 1cm;">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
<main>
    <div class="container-fluid">
        @if(session()->has('success'))
            <div class="alert alert-success " role="alert">
                {{session()->get('success')}}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger " role="alert">
                {{session()->get('error')}}
            </div>
        @endif
        @yield('content')
    </div>
</main>
<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/app.min.js"></script>
</body>
</html>
