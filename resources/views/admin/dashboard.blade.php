@extends('admin.layout')

@section('title', 'Dashboard')
@section('subtitle', 'A quick look at inquiries and the content that appears on the website.')

@section('content')
<div class="grid-stats">
    <a class="stat" href="{{ route('admin.inquiries.index') }}">
        <span class="muted">New inquiries</span>
        <b>{{ $newInquiries }}</b>
    </a>
    <a class="stat" href="{{ route('admin.inquiries.index') }}">
        <span class="muted">All inquiries</span>
        <b>{{ $inquiryCount }}</b>
    </a>
    <a class="stat" href="{{ route('admin.resources.index', 'services') }}">
        <span class="muted">Services</span>
        <b>{{ $serviceCount }}</b>
    </a>
    <a class="stat" href="{{ route('admin.resources.index', 'team-members') }}">
        <span class="muted">Team / quotes</span>
        <b>{{ $teamCount }} / {{ $testimonialCount }}</b>
    </a>
</div>
<div class="card">
    <div class="card-head">
        <h3>Recent inquiries</h3>
        <a href="{{ route('admin.inquiries.index') }}">View all</a>
    </div>
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr><th>Name</th><th>Email</th><th>Status</th><th>Mail</th><th></th></tr>
            </thead>
            <tbody>
            @forelse ($recentInquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td><span class="pill {{ $inquiry->status === 'new' ? 'pill-new' : 'pill-muted' }}">{{ $inquiry->status }}</span></td>
                    <td><span class="pill {{ $inquiry->mail_sent ? 'pill-sent' : 'pill-muted' }}">{{ $inquiry->mail_sent ? 'Sent' : 'Not sent' }}</span></td>
                    <td><a class="btn btn-ghost btn-sm" href="{{ route('admin.inquiries.show', $inquiry) }}">Open</a></td>
                </tr>
            @empty
                <tr><td colspan="5"><div class="empty"><p>No inquiries yet.</p></div></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
