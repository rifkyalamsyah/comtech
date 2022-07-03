<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,300;1,700&display=swap"
        rel="stylesheet">
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ url('css/landing/styles.css') }}" rel="stylesheet" />
    <title><?= $title ?></title>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                <img class="d-inline-block align-middle mr-2" width="45" src="{{ url('img/logo.png') }}"
                    alt="logo">
                <span class="text-uppercase font-weight-bold">Comtech</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>

                @auth
                    @if (Auth::user()->is_admin == true)
                        <li class="btn btn-primary btn-sm rounded-pill mx-3"><a
                                class="nav-link text-white bi bi-speedometer2" href="{{ url('admin/dashboard') }}">
                                Dashboard</a></li>
                    @else
                        <li class="btn btn-primary btn-sm rounded-pill mx-3"><a class="nav-link text-white bi bi-cart4"
                                href="{{ url('home') }}"> Shop</a></li>
                    @endif
                @else
                    <li class="btn btn-primary btn-sm rounded-pill mx-3"><a class="nav-link text-white" href="/login">Get
                            Started!</a></li>
                @endauth
            </div>
        </div>
    </nav>
    <div>
        @yield('container')
    </div>
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2022 - Comtech</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="{{ url('js/landing/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
