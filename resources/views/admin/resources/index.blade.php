@extends('admin.layout')

@section('title', $config['title'])
@section('subtitle', $resource === 'pages' ? 'Privacy, terms, and cookie policy shown on the website.' : 'Add, edit, hide, or remove items shown on the homepage.')

@section('actions')
    <a class="btn btn-primary" href="{{ route('admin.resources.create', $resource) }}">Add {{ $config['singular'] }}</a>
@endsection

@section('content')
<div class="card">
    @if ($items->isEmpty())
        <div class="empty">
            <p>Nothing in {{ strtolower($config['title']) }} yet.</p>
            <a class="btn btn-primary" href="{{ route('admin.resources.create', $resource) }}">Add {{ $config['singular'] }}</a>
        </div>
    @else
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    @foreach ($config['columns'] as $column)
                        <th>{{ \Illuminate\Support\Str::headline($column) }}</th>
                    @endforeach
                    @if ($items->first() && array_key_exists('is_visible', $items->first()->getAttributes()))
                        <th>Visibility</th>
                    @endif
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr>
                    @foreach ($config['columns'] as $column)
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags((string) $item->{$column}), 90) }}</td>
                    @endforeach
                    @if (array_key_exists('is_visible', $item->getAttributes()))
                        <td><span class="pill {{ $item->is_visible ? 'pill-on' : 'pill-off' }}">{{ $item->is_visible ? 'Visible' : 'Hidden' }}</span></td>
                    @endif
                    <td class="actions">
                        <a class="btn btn-ghost btn-sm" href="{{ route('admin.resources.edit', [$resource, $item->id]) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.resources.destroy', [$resource, $item->id]) }}" onsubmit="return confirm('Delete this {{ $config['singular'] }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
