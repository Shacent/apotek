<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Apotek') | Sistem Apotek</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .brand-link { background: #1a56db; }
        .brand-link .brand-text { color: #fff !important; font-weight: 600; }
        .sidebar { background: #1e2a4a; }
        .nav-sidebar .nav-link { color: #b0bec5; border-radius: 6px; margin: 2px 8px; }
        .nav-sidebar .nav-link:hover, .nav-sidebar .nav-link.active { background: #1a56db !important; color: #fff !important; }
        .nav-sidebar .nav-link .nav-icon { color: inherit; }
    </style>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle me-1"></i>
                    {{ auth()->user()->nama }}
                    <span class="badge badge-secondary ml-1">{{ auth()->user()->role }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#1e2a4a;">
        <a href="{{ route('dashboard') }}" class="brand-link" style="background:#1a56db;">
            <i class="fas fa-pills ml-3 mr-2 text-white"></i>
            <span class="brand-text font-weight-bold">Sistem Apotek</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header text-uppercase" style="color:#546e8a;font-size:10px;padding: 8px 16px;">Master Data</li>

                    <li class="nav-item">
                        <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Kategori Obat</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('supplier.index') }}" class="nav-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>Supplier</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('obat.index') }}" class="nav-link {{ request()->routeIs('obat.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-capsules"></i>
                            <p>Data Obat</p>
                        </a>
                    </li>

                    <li class="nav-header text-uppercase" style="color:#546e8a;font-size:10px;padding: 8px 16px;">Transaksi Stok</li>

                    <li class="nav-item">
                        <a href="{{ route('obat-masuk.index') }}" class="nav-link {{ request()->routeIs('obat-masuk.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-arrow-circle-down text-success"></i>
                            <p>Obat Masuk</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('obat-keluar.index') }}" class="nav-link {{ request()->routeIs('obat-keluar.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-arrow-circle-up text-warning"></i>
                            <p>Obat Keluar</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page_title', 'Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <footer class="main-footer text-sm">
        <strong>Sistem Informasi Apotek</strong> &copy; {{ date('Y') }}
    </footer>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html>