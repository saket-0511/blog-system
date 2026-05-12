<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BlogHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0,0,0,.4);
        }
        .login-logo {
            width: 60px; height: 60px; border-radius: 14px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.25rem;
        }
        .form-control:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,.15); }
        .btn-login {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            border: none; color: #fff; padding: .75rem;
            border-radius: 10px; font-weight: 600; letter-spacing: .3px;
        }
        .btn-login:hover { opacity: .9; color: #fff; }
        .credentials-box {
            background: #f8fafc; border: 1px dashed #cbd5e1;
            border-radius: 10px; padding: .75rem 1rem; font-size: .8rem;
        }
    </style>
</head>
<body>
<div class="login-card">
    <div class="login-logo">
        <i class="bi bi-newspaper text-white fs-4"></i>
    </div>
    <h4 class="text-center fw-bold mb-1">Admin Panel</h4>
    <p class="text-center text-muted small mb-4">Sign in to manage BlogHub</p>

    @if($errors->any())
        <div class="alert alert-danger py-2 small">
            <i class="bi bi-exclamation-triangle me-1"></i>{{ $errors->first() }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success py-2 small">
            <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-warning py-2 small">
            <i class="bi bi-lock me-1"></i>{{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold small">Email Address</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="bi bi-envelope text-muted"></i>
                </span>
                <input type="email" name="email"
                       class="form-control border-start-0 ps-0"
                       placeholder="admin@blog.com"
                       value="{{ old('email') }}"
                       required autofocus>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold small">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="bi bi-lock text-muted"></i>
                </span>
                <input type="password" name="password"
                       class="form-control border-start-0 ps-0"
                       placeholder="••••••••"
                       required id="passwordInput">
                <button type="button" class="input-group-text bg-light"
                        onclick="togglePwd()">
                    <i class="bi bi-eye text-muted" id="eyeIcon"></i>
                </button>
            </div>
        </div>
        <button type="submit" class="btn btn-login w-100">
            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
        </button>
    </form>

    <div class="credentials-box mt-4">
        <p class="mb-1 text-muted">Default credentials:</p>
        <p class="mb-0"><strong>Email:</strong> admin@blog.com</p>
        <p class="mb-0"><strong>Password:</strong> Admin@1234</p>
    </div>

    <p class="text-center mt-3 mb-0">
        <a href="{{ route('blogs.index') }}" class="text-muted small text-decoration-none">
            <i class="bi bi-arrow-left me-1"></i>Back to Website
        </a>
    </p>
</div>

<script>
function togglePwd() {
    const input = document.getElementById('passwordInput');
    const icon  = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye-slash text-muted';
    } else {
        input.type = 'password';
        icon.className = 'bi bi-eye text-muted';
    }
}
</script>
</body>
</html>
