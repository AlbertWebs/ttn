@extends('admin.layout')

@section('title', ($item->exists ? 'Edit' : 'Add').' '.$config['singular'])
@section('subtitle', 'Saved items appear on the public website according to their visibility.')

@section('content')
<div class="card">
    <form method="POST" action="{{ $item->exists ? route('admin.resources.update', [$resource, $item->id]) : route('admin.resources.store', $resource) }}" enctype="multipart/form-data" class="form-grid">
        @csrf
        @if ($item->exists)
            @method('PUT')
        @endif
        @foreach ($config['fields'] as $field)
            @php
                $name = $field['name'];
                $value = old($name, $item->{$name});
                $type = $field['type'] ?? 'text';
                $wide = in_array($type, ['textarea', 'html', 'image', 'checkbox'], true);
            @endphp
            @if ($type === 'textarea' || $type === 'html')
                <div class="form-field wide">
                    <span class="field-label">{{ $field['label'] }}</span>
                    <textarea class="{{ $type === 'html' ? 'html' : '' }}" name="{{ $name }}">{{ $value }}</textarea>
                </div>
            @elseif ($type === 'image')
                <div class="form-field wide">
                    <span class="field-label">{{ $field['label'] }}</span>
                    <input type="file" name="{{ $name }}" accept="image/*">
                    <span class="form-hint">Leave empty to keep the current image.</span>
                    @if ($item->{$name})
                        <img class="preview" src="{{ media_url($item->{$name}) }}" alt="">
                    @endif
                </div>
            @elseif ($type === 'checkbox')
                <label class="form-field wide check">
                    <input type="checkbox" name="{{ $name }}" value="1" @checked((string) $value === '1' || $value === true || $value === 1 || is_null($item->id))>
                    {{ $field['label'] }}
                </label>
            @elseif ($type === 'number')
                <div class="form-field">
                    <span class="field-label">{{ $field['label'] }}</span>
                    <input type="number" name="{{ $name }}" value="{{ $value ?? 0 }}">
                </div>
            @else
                <div class="form-field">
                    <span class="field-label">{{ $field['label'] }}</span>
                    <input type="text" name="{{ $name }}" value="{{ $value }}" @required(!empty($field['required']))>
                </div>
            @endif
        @endforeach
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn btn-ghost" href="{{ route('admin.resources.index', $resource) }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
