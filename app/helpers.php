<?php

if (! function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        try {
            return \App\Models\Setting::getValue($key, $default);
        } catch (\Throwable $e) {
            return $default;
        }
    }
}

if (! function_exists('media_url')) {
    function media_url(?string $path, ?string $fallback = null): string
    {
        $path = $path ?: $fallback;

        if (! $path) {
            return '';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset($path);
    }
}
