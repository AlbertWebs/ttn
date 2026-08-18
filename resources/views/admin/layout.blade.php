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
                <strong>{{ auth()->user()->name }}</strong>
                <span>{{ auth()->user()->email }}</span>
            </div>
            <a class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">Account</a>
            <a href="{{ url('/') }}" target="_blank" rel="noopener">View website</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="nav-logout" type="submit">Log out</button>
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
