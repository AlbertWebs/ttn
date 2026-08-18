<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | {{ setting('site_name', 'Trusted Touch Nursing') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ media_url(setting('favicon'), 'uploads/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('admin/admin.css') }}?v={{ @filemtime(public_path('admin/admin.css')) }}">
</head>
<body class="admin-login">
    <div class="login-shell">
        <div class="login-card">
            <div class="login-inner">
                <div class="login-meta">
                    <div class="login-kicker">Admin access</div>
                    <div class="login-avatar" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="8" r="3.2"></circle>
                            <path d="M5 19c1.6-3.2 4-4.8 7-4.8S17.4 15.8 19 19"></path>
                        </svg>
                    </div>
                </div>
                <h1>{{ setting('site_name', 'Trusted Touch Nursing') }}</h1>
                <p class="login-sub">Sign in to manage content and settings.</p>

                @if ($errors->any())
                    <div class="alert">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('admin.login.store') }}">
                    @csrf
                    <div class="field">
                        <label for="email">Email</label>
                        <div class="input-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                <path d="M3 7l9 6 9-6"></path>
                            </svg>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                <path d="M8 11V8a4 4 0 0 1 8 0v3"></path>
                            </svg>
                            <input id="password" type="password" name="password" required>
                            <button class="toggle-pass" type="button" data-toggle-password>Show</button>
                        </div>
                    </div>
                    <div class="login-row">
                        <label><input type="checkbox" name="remember" value="1"> Remember me</label>
                        <a href="{{ url('/') }}">Back to site</a>
                    </div>
                    <button class="login-submit" type="submit">Log in</button>
                </form>
                <p class="login-note">Use an administrator account to edit homepage content, inquiries, and site settings. If you don’t have access, contact an administrator.</p>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('[data-toggle-password]')?.addEventListener('click', function () {
            const input = document.getElementById('password');
            const hidden = input.type === 'password';
            input.type = hidden ? 'text' : 'password';
            this.textContent = hidden ? 'Hide' : 'Show';
        });
    </script>
</body>
</html>
