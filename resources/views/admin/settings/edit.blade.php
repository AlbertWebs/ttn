@extends('admin.layout')

@section('title', $group['title'])
@section('subtitle', 'These fields publish on the website as soon as you save.')

@section('content')
@php
    $families = [
        'Site' => ['general', 'contact', 'social', 'seo', 'mail', 'footer'],
        'Homepage' => ['hero', 'about', 'vision', 'values', 'why', 'services', 'team', 'testimonials', 'contact_form'],
    ];
@endphp
<div class="settings-nav">
    @foreach ($families as $family => $keys)
        <div>
            <span class="tab-family-label">{{ $family }}</span>
            <div class="tabs">
                @foreach ($keys as $key)
                    @if (isset($groups[$key]))
                        <a class="{{ $groupKey === $key ? 'active' : '' }}" href="{{ route('admin.settings.edit', $key) }}">{{ $groups[$key]['title'] }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>
<div class="card">
    <form method="POST" action="{{ route('admin.settings.update', $groupKey) }}" enctype="multipart/form-data" class="form-grid">
        @csrf
        @method('PUT')
        @foreach ($group['fields'] as $field)
            @php
                $value = setting($field['key']);
                $type = $field['type'] ?? 'text';
                $wide = in_array($type, ['textarea', 'image', 'html'], true);
            @endphp
            @if ($type === 'textarea')
                <div class="form-field wide">
                    <span class="field-label">{{ $field['label'] }}</span>
                    <textarea name="{{ $field['key'] }}">{{ old($field['key'], $value) }}</textarea>
                </div>
            @elseif ($type === 'image')
                <div class="form-field wide">
                    <span class="field-label">{{ $field['label'] }}</span>
                    <input type="file" name="{{ $field['key'] }}" accept="image/*">
                    <span class="form-hint">Leave empty to keep the current image.</span>
                    @if ($value)
                        <img class="preview" src="{{ media_url($value) }}" alt="">
                    @endif
                </div>
            @else
                <div class="form-field{{ $wide ? ' wide' : '' }}">
                    <span class="field-label">{{ $field['label'] }}</span>
                    <input type="text" name="{{ $field['key'] }}" value="{{ old($field['key'], $value) }}">
                </div>
            @endif
        @endforeach
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save {{ strtolower($group['title']) }}</button>
            <span class="muted">Visible on the public site immediately.</span>
        </div>
    </form>
</div>
@endsection
