<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        body { background: #f1f5f9; }
        .admin-sidebar {
            width: 250px; min-width: 250px; min-height: 100vh;
            background: #1e293b; color: #e2e8f0;
            position: sticky; top: 0; height: 100vh; overflow-y: auto;
        }
        .sidebar-brand { padding: 1.25rem 1.5rem; border-bottom: 1px solid rgba(255,255,255,.1); }
        .sidebar-brand a { color: #fff; text-decoration: none; font-size: 1.2rem; font-weight: 700; }
        .sidebar-nav .nav-link {
            color: #94a3b8; padding: .65rem 1.5rem;
            display: flex; align-items: center; gap: 10px;
            border-left: 3px solid transparent; transition: all .15s;
        }
        .sidebar-nav .nav-link:hover, .sidebar-nav .nav-link.active {
            color: #fff; background: rgba(255,255,255,.08);
            border-left-color: #3b82f6;
        }
        .sidebar-nav .nav-link i { font-size: 18px; }
        .admin-topbar {
            background: #fff; border-bottom: 1px solid #e2e8f0;
            padding: .75rem 1.5rem;
            display: flex; justify-content: space-between; align-items: center;
        }
        .main-content { flex: 1; min-width: 0; }
        @media(max-width:768px) {
            .admin-sidebar { display: none !important; }
            .main-content { width: 100%; }
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="admin-sidebar d-none d-md-flex flex-column">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-newspaper me-2"></i>BlogHub Admin
            </a>
        </div>
        <nav class="sidebar-nav mt-2 flex-grow-1">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('admin.blogs.index') }}"
               class="nav-link {{ request()->routeIs('admin.blogs.index') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> All Blogs
            </a>
            <a href="{{ route('admin.blogs.create') }}"
               class="nav-link {{ request()->routeIs('admin.blogs.create') ? 'active' : '' }}">
                <i class="bi bi-plus-circle"></i> Add Blog
            </a>
            <hr class="border-secondary mx-3">
            <a href="{{ route('blogs.index') }}" target="_blank" class="nav-link">
                <i class="bi bi-box-arrow-up-right"></i> View Site
            </a>
        </nav>
        <div class="p-3 border-top border-secondary">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main -->
    <div class="main-content">
        <div class="admin-topbar">
            <h6 class="mb-0 fw-semibold">@yield('title', 'Dashboard')</h6>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted small"><i class="bi bi-person-circle me-1"></i>{{ session('admin_name', 'Admin') }}</span>
                <!-- Mobile logout -->
                <form method="POST" action="{{ route('admin.logout') }}" class="d-md-none">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">Logout</button>
                </form>
            </div>
        </div>

        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
