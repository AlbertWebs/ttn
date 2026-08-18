<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | {{ setting('site_name', 'TTN') }} Admin</title>
    <link rel="icon" href="{{ media_url(setting('favicon'), 'uploads/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('admin/admin.css') }}">
</head>
<body class="admin-app">
@php
    $currentResource = request()->route('resource');
    $adminUser = auth()->user();
    $adminInitials = collect(preg_split('/\s+/', trim($adminUser->name) ?: 'A'))
        ->filter()
        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->take(2)
        ->implode('');
    $newInquiries = 0;
    try { $newInquiries = \App\Models\Inquiry::query()->where('status', 'new')->count(); } catch (\Throwable $e) {}
    $homepageResources = collect(config('cms.resources'))->except('pages');
@endphp
<button class="admin-menu-toggle" type="button" data-admin-toggle aria-controls="admin-nav">Menu</button>
<div class="admin-shell">
    <aside class="admin-nav" id="admin-nav">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ media_url(setting('logo'), 'uploads/logo-ttn.png') }}" alt="">
            <span>
                TTN Admin
                <small>Content dashboard</small>
            </span>
        </a>
        <div class="admin-nav-scroll">
            <nav class="admin-nav-group">
                <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}" href="{{ route('admin.inquiries.index') }}">
                    Inquiries
                    @if ($newInquiries)
                        <em class="nav-badge">{{ $newInquiries }}</em>
                    @endif
                </a>
            </nav>
            <span class="nav-label">Website</span>
            <nav class="admin-nav-group">
                <a class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit', 'general') }}">Content &amp; settings</a>
                <a class="{{ $currentResource === 'pages' ? 'active' : '' }}" href="{{ route('admin.resources.index', 'pages') }}">Legal pages</a>
            </nav>
            <span class="nav-label">Homepage</span>
            <nav class="admin-nav-group">
                @foreach ($homepageResources as $key => $resource)
                    <a class="{{ $currentResource === $key ? 'active' : '' }}" href="{{ route('admin.resources.index', $key) }}">{{ $resource['title'] }}</a>
                @endforeach
            </nav>
        </div>
        <div class="admin-nav-foot">
            <div class="admin-user">
                <span class="admin-user-mark" aria-hidden="true">{{ $adminInitials }}</span>
                <div class="admin-user-meta">
                    <strong>{{ $adminUser->name }}</strong>
                    <em>Signed in</em>
                    <span title="{{ $adminUser->email }}">{{ $adminUser->email }}</span>
                </div>
            </div>
            <div class="admin-foot-links">
                <a class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">Account</a>
                <a href="{{ url('/') }}" target="_blank" rel="noopener">View website</a>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="nav-logout" type="submit">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M9 21H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Sign out
                </button>
            </form>
        </div>
    </aside>
    <main class="admin-main">
        <div class="admin-top">
            <div>
                <h1>@yield('title', 'Dashboard')</h1>
                <div class="muted">@yield('subtitle')</div>
            </div>
            @yield('actions')
        </div>
        @if (session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert">{{ $errors->first() }}</div>
        @endif
        @yield('content')
    </main>
</div>
<div class="admin-nav-backdrop" data-admin-toggle></div>
<script>
    document.querySelectorAll('[data-admin-toggle]').forEach(function (el) {
        el.addEventListener('click', function () {
            document.body.classList.toggle('nav-open');
        });
    });
</script>
</body>
</html>
