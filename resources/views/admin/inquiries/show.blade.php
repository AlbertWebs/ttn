@extends('admin.layout')

@section('title', $inquiry->name)
@section('subtitle')
    Inquiry received {{ $inquiry->created_at?->format('d M Y') }} at {{ $inquiry->created_at?->format('H:i') }}
@endsection
@section('actions')
    <div class="actions">
        <a class="btn btn-ghost" href="{{ route('admin.inquiries.index') }}">Back to inquiries</a>
        <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Delete this inquiry?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
@endsection

@section('content')
<div class="detail-grid">
    <div class="card">
        <h3 style="margin:0 0 16px">Details</h3>
        <dl class="meta-list">
            <div>
                <dt>Email</dt>
                <dd><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></dd>
            </div>
            <div>
                <dt>Status</dt>
                <dd><span class="pill {{ $inquiry->status === 'new' ? 'pill-new' : 'pill-muted' }}">{{ $inquiry->status }}</span></dd>
            </div>
            <div>
                <dt>Mail</dt>
                <dd><span class="pill {{ $inquiry->mail_sent ? 'pill-sent' : 'pill-muted' }}">{{ $inquiry->mail_sent ? 'Sent' : 'Not sent' }}</span></dd>
            </div>
            @if ($inquiry->mail_error)
            <div>
                <dt>Mail error</dt>
                <dd>{{ $inquiry->mail_error }}</dd>
            </div>
            @endif
            <div>
                <dt>Received</dt>
                <dd>{{ $inquiry->created_at?->format('d M Y H:i') }}</dd>
            </div>
        </dl>
    </div>
    <div class="card">
        <h3 style="margin:0 0 16px">Message</h3>
        <p class="message-body">{{ $inquiry->message }}</p>
    </div>
</div>
@endsection
