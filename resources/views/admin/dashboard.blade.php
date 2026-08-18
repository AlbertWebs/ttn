@extends('admin.layout')

@section('title', 'Dashboard')
@section('subtitle', 'Overview of website content and incoming inquiries')

@section('content')
<div class="grid-stats">
    <div class="stat"><span class="muted">New inquiries</span><b>{{ $newInquiries }}</b></div>
    <div class="stat"><span class="muted">All inquiries</span><b>{{ $inquiryCount }}</b></div>
    <div class="stat"><span class="muted">Services</span><b>{{ $serviceCount }}</b></div>
    <div class="stat"><span class="muted">Team / testimonials</span><b>{{ $teamCount }} / {{ $testimonialCount }}</b></div>
</div>
<div class="card">
    <h3 style="margin-top:0">Recent inquiries</h3>
    <table class="table">
        <thead>
            <tr><th>Name</th><th>Email</th><th>Status</th><th>Mail</th><th></th></tr>
        </thead>
        <tbody>
        @forelse ($recentInquiries as $inquiry)
            <tr>
                <td>{{ $inquiry->name }}</td>
                <td>{{ $inquiry->email }}</td>
                <td>{{ $inquiry->status }}</td>
                <td>{{ $inquiry->mail_sent ? 'Sent' : 'Not sent' }}</td>
                <td><a href="{{ route('admin.inquiries.show', $inquiry) }}">Open</a></td>
            </tr>
        @empty
            <tr><td colspan="5">No inquiries yet.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
