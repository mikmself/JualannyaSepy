<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JualannyaSepy | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="/sepy/logo-trans.png"/>
    <link rel="stylesheet" href="/assets/css/styles.min.css"/>
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="./index.html" class="text-nowrap logo-img">
                    <img src="/sepy/logo-trans.png" width="180" alt=""/>
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Menu</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('product-index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-package"></i>
                        </span>
                            <span class="hide-menu">Product</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('category-index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-folder"></i>
                        </span>
                            <span class="hide-menu">Product Category</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('order-index')}}" aria-expanded="false">
                            <span>
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">Order</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('shipping-index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-truck"></i>
                        </span>
                            <span class="hide-menu">Shipping</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('user-index')}}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">User</span>
                        </a>
                    </li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="body-wrapper">
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <b style="margin-right: .2cm;">{{auth()->user()->name}}</b>
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                </div>
            </nav>
        </header>
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
    </div>
</div>
<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/assets/js/sidebarmenu.js"></script>
</body>
</html>
