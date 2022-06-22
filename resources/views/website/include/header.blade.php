<style>
    .dropdown:hover>.dropdown-menu{
        display: block;
    }
</style>
<div class="container-fluid p-0">
    <div class="col-md-12" style="background:#ff5722;">
        <div class="container p-2">
            <div class="row">
                <div class="col-md-6 text-center">
                    <span class="text-white">Turning Brands into Amazon Best Sellers</span>
                </div>
                <div class="col-md-6 icons">
                    <a href="#" class="rounded-circle bg-primary"><i
                            class="pull-right m-1 fa fa-instagram header-icon "></i></a>
                    <a href="#"><i class="pull-right m-1 fa fa-twitter header-icon"></i></a>
                    <a href="#"><i class="pull-right m-1 fa fa-facebook header-icon"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 sticky-top " style="background:white;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="#" class="navbar-brand">
                        <img class="logo-img" src="{{ asset('website/images/logo.png') }}" alt="Logo"
                            height="70">
                    </a>
                    <div class="container-fluid">
                        <button class="navbar-toggler toggle-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <i class="fa fa-shopping-cart p-2 mobile-cart-icon"></i>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a href="{{ route('home_page') }}"
                                        class="nav-link h4">Home</a></li>
                                <li class="nav-item"><a href="{{ route('about') }}"
                                        class="nav-link h4">About</a></li>
                                <li class="nav-item"><a href="{{ route('services') }}"
                                        class="nav-link h4">Services</a>
                                </li>
                                <li class="nav-item">

                                    <a href="https://wa.me/+923019115376?text=I want to contact with you through angvo."
                                        target="_blank" class="nav-link h4">Contact</a>
                                </li>

                                @if (auth()->check())
                                    <li class="nav-item"><a
                                            href="{{ auth()->user()->role == 'admin' ? route('dashboard') : route('user_dashboard') }}"
                                            class="nav-link h4">Dashboard</a></li>
                                    <li class="nav-item"><a href="{{ route('logout') }}"
                                            class="nav-link h4">Logout</a>
                                    </li>
                                @else
                                    <li class="nav-item"><a href="{{ route('login') }}"
                                            class="nav-link h4">Login</a></li>
                                    <li class="nav-item"><a href="{{ route('register') }}"
                                            class="nav-link h4">Registers</a>
                                    </li>
                                @endif
                                <li class="d-md-block d-none">
                                    <div class="dropdown">
                                            <i class="fa fa-shopping-cart fs-1 text-info" type="button"
                                               id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" onclick="view_cart()">
                                                <span
                                                    class="position-absolute top-0 fs-6 translate-middle badge rounded-pill bg-danger" id="cart_counts">
                                                    {{ count((array) session('cart')) }}
                                                </span>
                                            </i>
                                        <div>

                                        </div>

                                            <ul id="card_data" style="width:300px;max-height:400px;overflow-y:scroll"
                                                class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @include('website.partials.cart')
                                            </ul>
                                    </div>
                                </li>

                                <a href="{{ route('services') }}" class="btn btn-primary hoverable display-btn ms-5">
                                    LET'S GET STARTED</a>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
