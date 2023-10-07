<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('coreui/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('coreui/vendors/@coreui/icons/css/free.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/datatables.min.css') }}">
    <title>@yield('title')</title>
    @yield('header')
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <img class="sidebar-brand-full" src="{{ asset('images/fav.png') }}" 
                width="100px" height="100px" style="margin:10px;" alt="">
            <img class="sidebar-brand-narrow" 
                width="46" height="46" src="{{ asset('images/fav.png') }}" alt="">
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            @include('layouts.menu')
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" 
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <i class="nav-icon icon-lg cil-menu"></i>
                </button>

                <a class="header-brand d-md-none" href="#">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg>
                </a>

                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('qr-generator') }}">
                            QR Generator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('report-presensi') }}">
                            Report Presensi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('create-anggota') }}">
                            Tambah Anggota
                        </a>
                    </li>
                </ul>

                <ul class="header-nav ms-auto"> 
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg>
                        </a>
                    </li>
                </ul>

                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" 
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md">
                                <img class="avatar-img" 
                                    src="{{ asset('images/fav.png') }}" alt="user@email.com">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Kopasus IT Admin</div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Profile
                            </a>
                                <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Settings
                            </a>
                        </div>            
                    </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <!-- if breadcrumb is single--><span>Home</span>
                        </li>
                        <li class="breadcrumb-item active"><span>@yield('breadcrumb')</span></li>
                    </ol>
                </nav>
            </div>
        </header>
        
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div><a href="https://instagram.com/nathanael_tan_" target="_blank">
                Valentinus Moreno</a><a href="https://instagram.com/rpl_pesat" 
                target="_blank">&nbsp;RPL</a> © 2022</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://instagram.com/kopasus_it" 
            target="_blank">Kopasus IT , Knowledge Sharing </a></div>
        </footer>
    </div>


    <script src="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('datatable/datatables.min.js') }}"></script>
    @yield('footer')
</body>

</html>