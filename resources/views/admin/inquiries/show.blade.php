@extends('admin.layout')

@section('title', 'Inquiry')
@section('actions')
    <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Delete this inquiry?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection

@section('content')
<div class="card">
    <p><strong>Name:</strong> {{ $inquiry->name }}</p>
    <p><strong>Email:</strong> <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></p>
    <p><strong>Status:</strong> {{ $inquiry->status }}</p>
    <p><strong>Mail:</strong> {{ $inquiry->mail_sent ? 'Sent' : 'Not sent' }}</p>
    @if ($inquiry->mail_error)
        <p><strong>Mail error:</strong> {{ $inquiry->mail_error }}</p>
    @endif
    <p><strong>Received:</strong> {{ $inquiry->created_at?->format('d M Y H:i') }}</p>
    <p>{{ $inquiry->message }}</p>
</div>
@endsection
