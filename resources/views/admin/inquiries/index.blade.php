@extends('admin.layout')

@section('title', 'Inquiries')
@section('subtitle', 'Messages submitted from the homepage contact form')

@section('content')
<div class="card">
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
        @forelse ($inquiries as $inquiry)
            <tr>
                <td>{{ $inquiry->created_at?->format('d M Y H:i') }}</td>
                <td>{{ $inquiry->name }}</td>
                <td>{{ $inquiry->email }}</td>
                <td>{{ $inquiry->status }}</td>
                <td>{{ $inquiry->mail_sent ? 'Sent' : 'Not sent' }}</td>
                <td><a href="{{ route('admin.inquiries.show', $inquiry) }}">View</a></td>
            </tr>
        @empty
            <tr><td colspan="6">No inquiries yet.</td></tr>
        @endforelse
        </tbody>
    </table>
    <div style="margin-top:16px" class="actions">
        @if (! $inquiries->onFirstPage())
            <a class="btn btn-ghost" href="{{ $inquiries->previousPageUrl() }}">Previous</a>
        @endif
        @if ($inquiries->hasMorePages())
            <a class="btn btn-ghost" href="{{ $inquiries->nextPageUrl() }}">Next</a>
        @endif
    </div>
</div>
@endsection
