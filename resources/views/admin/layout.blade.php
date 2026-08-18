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
<div class="admin-shell">
    <aside class="admin-nav">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ media_url(setting('logo'), 'uploads/logo-ttn.png') }}" alt="">
            <span>TTN Admin</span>
        </a>
        <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}" href="{{ route('admin.inquiries.index') }}">Inquiries</a>
        <a class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit', 'general') }}">Content &amp; settings</a>
        <span class="nav-label">Homepage lists</span>
        @foreach (config('cms.resources') as $key => $resource)
            <a class="{{ request()->route('resource') === $key ? 'active' : '' }}" href="{{ route('admin.resources.index', $key) }}">{{ $resource['title'] }}</a>
        @endforeach
        <span class="nav-label">Account</span>
        <a class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">Admin account</a>
        <a href="{{ url('/') }}" target="_blank">View website</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-ghost" style="width:100%;margin-top:12px;" type="submit">Log out</button>
        </form>
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
</body>
</html>
