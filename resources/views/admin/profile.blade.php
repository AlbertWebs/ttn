@extends('admin.layout')

@section('title', 'Admin account')

@section('content')
<div class="card" style="max-width:560px">
    <form method="POST" action="{{ route('admin.profile.update') }}" class="form-grid">
        @csrf
        @method('PUT')
        <label>Name
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </label>
        <label>Email
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </label>
        <label>New password
            <input type="password" name="password">
        </label>
        <label>Confirm password
            <input type="password" name="password_confirmation">
        </label>
        <div>
            <button class="btn btn-primary" type="submit">Update account</button>
        </div>
    </form>
</div>
@endsection
