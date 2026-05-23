<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        .welcome-card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin: 0 auto 15px;
        }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-dark px-4 py-3">
    <span class="navbar-brand fw-bold fs-4">🚀 MyApp</span>
    <div class="d-flex align-items-center gap-3">
        <span class="text-white fw-semibold">
            👋 Hello, {{ Auth::user()->name }}
        </span>
        <a href="/logout" class="btn btn-outline-light btn-sm rounded-pill px-3">
            Logout
        </a>
    </div>
</nav>

{{-- Main Content --}}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card welcome-card p-5 text-center">

                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <h2 class="fw-bold" style="color:#764ba2;">
                    Welcome, {{ Auth::user()->name }}! 🎉
                </h2>

                <p class="text-muted mt-2">
                    You are successfully logged in.
                </p>

                <p class="text-muted">
                    📧 {{ Auth::user()->email }}
                </p>

                <div class="mt-4">
                    <a href="/logout" class="btn btn-danger rounded-pill px-4">
                        Logout
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>