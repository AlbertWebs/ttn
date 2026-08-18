@extends('admin.layout')

@section('title', $group['title'])
@section('subtitle', 'Changes appear on the public website immediately')

@section('content')
<div class="tabs">
    @foreach ($groups as $key => $item)
        <a class="{{ $groupKey === $key ? 'active' : '' }}" href="{{ route('admin.settings.edit', $key) }}">{{ $item['title'] }}</a>
    @endforeach
</div>
<div class="card">
    <form method="POST" action="{{ route('admin.settings.update', $groupKey) }}" enctype="multipart/form-data" class="form-grid">
        @csrf
        @method('PUT')
        @foreach ($group['fields'] as $field)
            @php $value = setting($field['key']); @endphp
            @if (($field['type'] ?? 'text') === 'textarea')
                <label>{{ $field['label'] }}
                    <textarea name="{{ $field['key'] }}">{{ old($field['key'], $value) }}</textarea>
                </label>
            @elseif (($field['type'] ?? '') === 'image')
                <label>{{ $field['label'] }}
                    <input type="file" name="{{ $field['key'] }}" accept="image/*">
                    @if ($value)
                        <img class="preview" src="{{ media_url($value) }}" alt="">
                    @endif
                </label>
            @else
                <label>{{ $field['label'] }}
                    <input type="text" name="{{ $field['key'] }}" value="{{ old($field['key'], $value) }}">
                </label>
            @endif
        @endforeach
        <div>
            <button class="btn btn-primary" type="submit">Save {{ strtolower($group['title']) }}</button>
        </div>
    </form>
</div>
@endsection
