<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | {{ setting('site_name', 'TTN') }} Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ media_url(setting('favicon'), 'uploads/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('admin/admin.css') }}?v={{ @filemtime(public_path('admin/admin.css')) }}">
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
    $navIcon = function (string $name) {
        $icons = [
            'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.2"/><rect x="14" y="3" width="7" height="7" rx="1.2"/><rect x="3" y="14" width="7" height="7" rx="1.2"/><rect x="14" y="14" width="7" height="7" rx="1.2"/>',
            'inbox' => '<polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>',
            'sliders' => '<line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/>',
            'file' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>',
            'heart' => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>',
            'star' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
            'layers' => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
            'link' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>',
            'users' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
            'award' => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
            'quote' => '<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V21z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3z"/>',
        ];
        $inner = $icons[$name] ?? $icons['layers'];
        return '<svg class="nav-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.$inner.'</svg>';
    };
    $resourceIcons = [
        'core-values' => 'heart',
        'features' => 'star',
        'services' => 'layers',
        'related-services' => 'link',
        'team-members' => 'users',
        'consultant-skills' => 'award',
        'testimonials' => 'quote',
        'pages' => 'file',
    ];
@endphp
<button class="admin-menu-toggle" type="button" data-admin-toggle aria-controls="admin-nav">Menu</button>
<div class="admin-shell">
    <aside class="admin-nav" id="admin-nav">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ media_url(setting('logo'), 'uploads/logo-ttn.png') }}" alt="">
            <span class="admin-brand-copy">
                <b>TTN Admin</b>
                <small>Content studio</small>
            </span>
        </a>
        <div class="admin-nav-scroll">
            <nav class="admin-nav-group">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <span class="nav-link-main">{!! $navIcon('grid') !!}<span>Dashboard</span></span>
                </a>
                <a class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}" href="{{ route('admin.inquiries.index') }}">
                    <span class="nav-link-main">{!! $navIcon('inbox') !!}<span>Inquiries</span></span>
                    @if ($newInquiries)
                        <em class="nav-badge">{{ $newInquiries }}</em>
                    @endif
                </a>
            </nav>
            <span class="nav-label">Website</span>
            <nav class="admin-nav-group">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit', 'general') }}">
                    <span class="nav-link-main">{!! $navIcon('sliders') !!}<span>Content &amp; settings</span></span>
                </a>
                <a class="nav-link {{ $currentResource === 'pages' ? 'active' : '' }}" href="{{ route('admin.resources.index', 'pages') }}">
                    <span class="nav-link-main">{!! $navIcon('file') !!}<span>Legal pages</span></span>
                </a>
            </nav>
            <span class="nav-label">Homepage</span>
            <nav class="admin-nav-group">
                @foreach ($homepageResources as $key => $resource)
                    <a class="nav-link {{ $currentResource === $key ? 'active' : '' }}" href="{{ route('admin.resources.index', $key) }}">
                        <span class="nav-link-main">{!! $navIcon($resourceIcons[$key] ?? 'layers') !!}<span>{{ $resource['title'] }}</span></span>
                    </a>
                @endforeach
            </nav>
        </div>
        <div class="admin-nav-foot">
            <div class="admin-user">
                <span class="admin-user-mark" aria-hidden="true">{{ $adminInitials }}</span>
                <div class="admin-user-meta">
                    <strong>{{ $adminUser->name }}</strong>
                    <span title="{{ $adminUser->email }}">{{ $adminUser->email }}</span>
                </div>
            </div>
            <div class="admin-foot-links">
                <a class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">Account</a>
                <a href="{{ url('/') }}" target="_blank" rel="noopener">View site</a>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="nav-logout" type="submit">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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
