@extends('admin.layout')

@section('title', $config['title'])
@section('subtitle', $resource === 'pages' ? 'Privacy, terms, and cookie policy shown on the website' : 'Add, edit, hide, or remove items shown on the homepage')

@section('actions')
    <a class="btn btn-primary" href="{{ route('admin.resources.create', $resource) }}">Add {{ $config['singular'] }}</a>
@endsection

@section('content')
<div class="card">
    <table class="table">
        <thead>
            <tr>
                @foreach ($config['columns'] as $column)
                    <th>{{ \Illuminate\Support\Str::headline($column) }}</th>
                @endforeach
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($items as $item)
            <tr>
                @foreach ($config['columns'] as $column)
                    <td>{{ \Illuminate\Support\Str::limit(strip_tags((string) $item->{$column}), 90) }}</td>
                @endforeach
                <td class="actions">
                    <a class="btn btn-ghost" href="{{ route('admin.resources.edit', [$resource, $item->id]) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.resources.destroy', [$resource, $item->id]) }}" onsubmit="return confirm('Delete this {{ $config['singular'] }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="{{ count($config['columns']) + 1 }}">Nothing here yet.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
