@extends('admin.layout')

@section('title', ($item->exists ? 'Edit' : 'Add').' '.$config['singular'])

@section('content')
<div class="card">
    <form method="POST" action="{{ $item->exists ? route('admin.resources.update', [$resource, $item->id]) : route('admin.resources.store', $resource) }}" enctype="multipart/form-data" class="form-grid">
        @csrf
        @if ($item->exists)
            @method('PUT')
        @endif
        @foreach ($config['fields'] as $field)
            @php $name = $field['name']; $value = old($name, $item->{$name}); @endphp
            @if (($field['type'] ?? 'text') === 'textarea' || ($field['type'] ?? '') === 'html')
                <label>{{ $field['label'] }}
                    <textarea class="{{ ($field['type'] ?? '') === 'html' ? 'html' : '' }}" name="{{ $name }}">{{ $value }}</textarea>
                </label>
            @elseif (($field['type'] ?? '') === 'image')
                <label>{{ $field['label'] }}
                    <input type="file" name="{{ $name }}" accept="image/*">
                    @if ($item->{$name})
                        <img class="preview" src="{{ media_url($item->{$name}) }}" alt="">
                    @endif
                </label>
            @elseif (($field['type'] ?? '') === 'checkbox')
                <label class="check">
                    <input type="checkbox" name="{{ $name }}" value="1" @checked((string) $value === '1' || $value === true || $value === 1 || is_null($item->id))>
                    {{ $field['label'] }}
                </label>
            @elseif (($field['type'] ?? '') === 'number')
                <label>{{ $field['label'] }}
                    <input type="number" name="{{ $name }}" value="{{ $value ?? 0 }}">
                </label>
            @else
                <label>{{ $field['label'] }}
                    <input type="text" name="{{ $name }}" value="{{ $value }}" @required(!empty($field['required']))>
                </label>
            @endif
        @endforeach
        <div class="actions">
            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn btn-ghost" href="{{ route('admin.resources.index', $resource) }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
