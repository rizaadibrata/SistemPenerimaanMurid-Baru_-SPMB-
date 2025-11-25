<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Administrator - SMK Bakti Nusantara 666</title>
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; height: 100vh; overflow: hidden; }
        .login-container { display: flex; height: 100vh; }
        .left-section { flex: 1; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%); position: relative; overflow: hidden; clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%); }
        .left-section::before { content: ''; position: absolute; width: 500px; height: 500px; background: rgba(255,255,255,0.1); border-radius: 50%; top: -200px; left: -150px; }
        .left-section::after { content: ''; position: absolute; width: 400px; height: 400px; background: rgba(255,255,255,0.08); border-radius: 50%; bottom: -150px; right: -100px; }
        .left-content { z-index: 1; text-align: center; color: white; padding: 50px; animation: fadeIn 0.8s ease; }
        .left-content i { font-size: 70px; margin-bottom: 30px; opacity: 0.95; }
        .left-content h1 { font-size: 32px; font-weight: 600; margin-bottom: 12px; }
        .left-content .subtitle { font-size: 14px; font-weight: 500; opacity: 0.9; margin-bottom: 10px; }
        .left-content p { font-size: 15px; opacity: 0.85; line-height: 1.6; }
        .right-section { flex: 1; display: flex; align-items: center; justify-content: center; background: #f8fafc; }
        .login-box { width: 100%; max-width: 420px; padding: 50px 40px; background: white; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); animation: fadeIn 0.8s ease; }
        .login-header { text-align: center; margin-bottom: 40px; }
        .login-header i { font-size: 50px; color: #3b82f6; margin-bottom: 20px; }
        .login-header h2 { font-size: 26px; color: #1e293b; margin-bottom: 6px; font-weight: 600; }
        .login-header p { color: #64748b; font-size: 14px; }
        .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; background: #fee; color: #c53030; border-left: 3px solid #f87171; font-size: 14px; }
        .form-group { margin-bottom: 24px; }
        .form-label { display: block; margin-bottom: 8px; color: #475569; font-size: 14px; font-weight: 500; }
        .input-wrapper { position: relative; }
        .input-wrapper i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 16px; transition: color 0.3s; }
        .form-group input { width: 100%; padding: 14px 16px 14px 48px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 15px; transition: all 0.3s; outline: none; background: white; color: #1e293b; }
        .form-group input:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
        .form-group input:focus ~ i { color: #3b82f6; }
        .btn-login { width: 100%; padding: 14px; background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%); color: white; border: none; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 12px rgba(59,130,246,0.3); }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(59,130,246,0.4); }
        .btn-login:active { transform: translateY(0); }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @media (max-width: 768px) { .left-section { display: none; } .login-box { padding: 40px 30px; margin: 20px; } }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="left-section">
            <div class="left-content">
                <i class="fas fa-school"></i>
                <div class="subtitle">Administrator Portal</div>
                <h1>SMK Bakti Nusantara 666</h1>
                <p>Sistem Informasi Penerimaan Peserta Didik Baru<br>Panel Administrasi & Manajemen</p>
            </div>
        </div>
        <div class="right-section">
            <div class="login-box">
                <div class="login-header">
                    <i class="fas fa-user-shield"></i>
                    <h2>Login Administrator</h2>
                    <p>Akses dashboard pengelolaan sistem</p>
                </div>
                @if(session('error'))
                    <div class="alert">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" placeholder="Masukkan email Anda" required autocomplete="email">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrapper">
                            <input type="password" name="password" placeholder="Masukkan password Anda" required autocomplete="current-password">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn-login">Masuk Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>