<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BlogHub - Latest Government Job Updates')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ route('blogs.index') }}">
            <i class="bi bi-newspaper me-2"></i>BlogHub
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('blogs.index') ? 'active fw-semibold' : '' }}"
                       href="{{ route('blogs.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="{{ route('admin.login') }}">
                        <i class="bi bi-shield-lock me-1"></i>Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="footer mt-5">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold text-white mb-2"><i class="bi bi-newspaper me-2"></i>BlogHub</h5>
                <p class="text-light opacity-75 small">Your one-stop source for government exam notifications, results, admit cards, and more.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h6 class="text-white fw-semibold mb-2">Categories</h6>
                <ul class="list-unstyled small">
                    @foreach(['Admit Card','Result','Answer Key','Exam Date','Notification'] as $cat)
                        <li><a href="{{ route('blogs.index', ['category' => $cat]) }}" class="text-light opacity-75 text-decoration-none">{{ $cat }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h6 class="text-white fw-semibold mb-2">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('blogs.index') }}" class="text-light opacity-75 text-decoration-none">Home</a></li>
                    <li><a href="{{ route('admin.login') }}" class="text-light opacity-75 text-decoration-none">Admin Panel</a></li>
                </ul>
            </div>
        </div>
        <div class="border-top border-secondary py-3 text-center">
            <p class="text-light opacity-75 small mb-0">&copy; {{ date('Y') }} BlogHub. All rights reserved. | Built with Laravel & Bootstrap</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('js/blog-filter.js') }}"></script>
@yield('scripts')
</body>
</html>
