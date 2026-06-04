<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Sistem Apotek</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4ff;
        }

        /* ── Left panel ── */
        .left-panel {
            display: none;
            width: 45%;
            background: linear-gradient(160deg, #1565c0 0%, #0d47a1 60%, #01579b 100%);
            color: #fff;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 50px;
            position: relative;
            overflow: hidden;
        }
        @media (min-width: 900px) { .left-panel { display: flex; } }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
        }
        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -60px; left: -60px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }

        .left-panel .brand-icon {
            font-size: 72px;
            margin-bottom: 20px;
            opacity: 0.95;
        }
        .left-panel h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .left-panel p {
            font-size: 15px;
            opacity: 0.8;
            text-align: center;
            line-height: 1.7;
            max-width: 300px;
        }
        .left-panel .features {
            margin-top: 40px;
            width: 100%;
            max-width: 320px;
        }
        .left-panel .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.12);
            font-size: 14px;
            opacity: 0.85;
        }
        .left-panel .feature-item:last-child { border-bottom: none; }
        .left-panel .feature-item i { font-size: 18px; min-width: 20px; }

        /* ── Right panel (form) ── */
        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 36px;
        }
        .login-header .logo-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px; height: 72px;
            border-radius: 20px;
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: #fff;
            font-size: 32px;
            margin-bottom: 16px;
            box-shadow: 0 8px 24px rgba(26,115,232,0.35);
        }
        .login-header h4 {
            font-weight: 700;
            color: #1a1a2e;
            font-size: 22px;
            margin-bottom: 4px;
        }
        .login-header p {
            color: #8a94a6;
            font-size: 14px;
        }

        .card-login {
            background: #fff;
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 4px 40px rgba(0,0,0,0.10);
            border: none;
        }

        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #444;
            margin-bottom: 6px;
        }

        .input-group-text {
            background: #f0f4ff;
            border-right: none;
            border-color: #dde3f0;
            color: #1a73e8;
            border-radius: 10px 0 0 10px !important;
        }
        .form-control {
            border-left: none;
            border-color: #dde3f0;
            border-radius: 0 10px 10px 0 !important;
            padding: 10px 14px;
            height: auto;
            font-size: 14px;
            color: #2d3748;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 3px rgba(26,115,232,0.12);
        }
        .form-control:focus + .input-group-append .input-group-text,
        .input-group:focus-within .input-group-text {
            border-color: #1a73e8;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            font-size: 15px;
            color: #fff;
            letter-spacing: 0.3px;
            transition: opacity 0.2s, transform 0.1s;
            margin-top: 8px;
        }
        .btn-login:hover { opacity: 0.92; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }

        .toggle-pw {
            position: absolute;
            right: 12px; top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #8a94a6;
            font-size: 15px;
            z-index: 10;
        }
        .toggle-pw:hover { color: #1a73e8; }

        .pw-wrapper {
            position: relative;
        }
        .pw-wrapper .form-control {
            padding-right: 38px;
        }

        .divider {
            text-align: center;
            margin: 20px 0 16px;
            color: #c0c8d8;
            font-size: 12px;
            position: relative;
        }
        .divider::before, .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #e8ecf4;
        }
        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .back-link {
            display: block;
            text-align: center;
            font-size: 13px;
            color: #8a94a6;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-link:hover { color: #1a73e8; text-decoration: none; }
        .back-link i { margin-right: 4px; }

        .alert {
            border-radius: 10px;
            font-size: 14px;
            padding: 10px 14px;
        }
        .alert-danger { background: #fff0f0; border-color: #fcc; color: #c0392b; }
        .alert-success { background: #f0fff8; border-color: #b2f0d4; color: #1a7f4b; }
    </style>
</head>
<body>

    {{-- ────────── LEFT PANEL ────────── --}}
    <div class="left-panel">
        <div class="brand-icon"><i class="fas fa-pills"></i></div>
        <h2>Sistem Apotek</h2>
        <p>Platform manajemen persediaan obat yang terintegrasi dan mudah digunakan.</p>

        <div class="features">
            <div class="feature-item">
                <i class="fas fa-boxes"></i>
                <span>Manajemen stok obat real-time</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-truck"></i>
                <span>Pencatatan obat masuk & supplier</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-chart-bar"></i>
                <span>Laporan & dashboard informatif</span>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt"></i>
                <span>Akses aman berbasis peran</span>
            </div>
        </div>
    </div>

    {{-- ────────── RIGHT PANEL (FORM) ────────── --}}
    <div class="right-panel">
        <div class="login-box">

            <div class="login-header">
                <div class="logo-circle"><i class="fas fa-pills"></i></div>
                <h4>Selamat Datang</h4>
                <p>Masuk ke panel administrasi apotek</p>
            </div>

            <div class="card-login">

                {{-- Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Success (setelah logout) --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle mr-1"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    {{-- Username --}}
                    <div class="form-group mb-3">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}"
                                placeholder="Masukkan username"
                                autofocus
                                autocomplete="username"
                            >
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="form-group mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <div class="pw-wrapper flex-grow-1">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    autocomplete="current-password"
                                >
                                <span class="toggle-pw" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </button>
                </form>

                <div class="divider">atau</div>

                <a href="{{ url('/') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke halaman publik
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>