<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style type="text/css">
        i.star-image {
            width: 20px;
            float: left;
            height: 22px;
            font-weight: 600;
        }

        .star-image {
            background: url("{{ asset('assets/images/star-image-br.png') }}") no-repeat center !important;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->

        <section class="header-bg" id="header-section" @if(request()->is('/')) style="height:650px;" @endif >

            <nav class="navbar navbar-expand-lg navbar-dark navbar-bg">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/images/logo.png') }}"
                            class="navbar-logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="#">Product 1</a></li>
                                    <li><a class="dropdown-item" href="#">Product 2</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Company</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Resources</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                        </ul>

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>
                                <li class="nav-item"><a class="nav-link btn btn-primary btn-lg px-4 me-sm-3 text-white"
                                        href="{{ route('register') }}">Start Free</a></li>

                            @endauth
                        </ul>

                    </div>
                </div>
            </nav>

            @if(request()->is('/'))
            <!-- Header-->
            <header>
                <div class="container">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-xl-5 col-xxl-5">
                            <div class="my-5 text-center text-xl-start bg-0e0e0e mb-3">
                                <h1 class="fw-bolder mb-2 bg-0e0e0e">Neque porro quisquam est qui dolorem ipsum quia
                                    dolor sit amet</h1>
                                <p class="fw-normal mb-4 bg-0e0e0e">Neque porro quisquam est qui dolorem ipsum quia
                                    dolor sit amet Neque porro quisquam est qui</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>

                                    <!-- <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> -->
                                </div>
                            </div>
                            <div class="text-left">
                                <span>Also available on</span><a href="#"><i class="fa fa-brands fa-apple"
                                        style="color: #0e0e0e;padding: 0px 10px;"></i></a><a href="#"><i
                                        class="fab fa-google-play"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-xxl-7 text-center"><img class="img-fluid rounded-3"
                                src="{{ asset('assets/images/image-header-2.png') }}" alt="..." /></div>
                    </div>
                </div>
            </header>
            @endif

        </section>

        @yield('content')


    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
