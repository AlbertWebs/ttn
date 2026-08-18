@extends('admin.layout')

@section('title', 'Inquiries')
@section('subtitle', 'Messages submitted from the homepage contact form.')

@section('content')
<div class="card">
    @if ($inquiries->isEmpty())
        <div class="empty">
            <p>No inquiries yet.</p>
        </div>
    @else
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>When</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->created_at?->format('d M Y H:i') }}</td>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td><span class="pill {{ $inquiry->status === 'new' ? 'pill-new' : 'pill-muted' }}">{{ $inquiry->status }}</span></td>
                    <td><span class="pill {{ $inquiry->mail_sent ? 'pill-sent' : 'pill-muted' }}">{{ $inquiry->mail_sent ? 'Sent' : 'Not sent' }}</span></td>
                    <td><a class="btn btn-ghost btn-sm" href="{{ route('admin.inquiries.show', $inquiry) }}">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="actions pager">
        @if (! $inquiries->onFirstPage())
            <a class="btn btn-ghost" href="{{ $inquiries->previousPageUrl() }}">Previous</a>
        @endif
        @if ($inquiries->hasMorePages())
            <a class="btn btn-ghost" href="{{ $inquiries->nextPageUrl() }}">Next</a>
        @endif
    </div>
    @endif
</div>
@endsection
