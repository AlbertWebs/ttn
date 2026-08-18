@extends('admin.layout')

@section('title', 'Admin account')
@section('subtitle', 'Update the name and email shown in the sidebar, or set a new password.')

@section('content')
<div class="card" style="max-width:640px">
    <form method="POST" action="{{ route('admin.profile.update') }}" class="form-grid">
        @csrf
        @method('PUT')
        <div class="form-field">
            <span class="field-label">Name</span>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-field">
            <span class="field-label">Email</span>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-field">
            <span class="field-label">New password</span>
            <input type="password" name="password">
            <span class="form-hint">Leave blank to keep the current password.</span>
        </div>
        <div class="form-field">
            <span class="field-label">Confirm password</span>
            <input type="password" name="password_confirmation">
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Update account</button>
        </div>
    </form>
</div>
@endsection
