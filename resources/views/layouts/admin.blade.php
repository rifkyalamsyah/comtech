<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('css/stisla/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/stisla/component.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ url('admin/profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Comtech</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">CT</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link "
                                href="{{ url('admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Admin</li>
                        <li
                            class="nav-item dropdown {{ Route::currentRouteName() == 'admin' || Route::currentRouteName() == 'member' ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i
                                    class="fas fa-user"></i> <span>Pengguna</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Route::currentRouteName() == 'admin' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('admin/list-admin') }}">Admin</a>
                                </li>
                                <li class="{{ Route::currentRouteName() == 'member' ? 'active' : '' }}"><a
                                        class="nav-link" href="{{ url('admin/list-member') }}">Member</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown {{ Route::currentRouteName() == 'barang' ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Barang</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('admin/tambah-barang') ? 'active' : '' }}"><a
                                        class="nav-link" href="{{ url('admin/tambah-barang') }}">Tambah Barang</a>
                                </li>
                                <li class="{{ Request::is('admin/barang') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ url('admin/barang') }}">List
                                        Barang</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="blank.html"><i class="fas fa-cart-shopping"></i>
                                <span>Pesanan</span></a>
                        </li>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $title ?></h1>
                    </div>
                    @yield('content')
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ url('js/stisla/stisla.js') }}"></script>
    <script src="{{ url('js/stisla/scripts.js') }}"></script>
    <script src="{{ url('js/stisla/custom.js') }}"></script>
    <script src="{{ url('js/stisla/page/index-0.js') }}"></script>
</body>

</html>
