<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $all = static::map();

        return array_key_exists($key, $all) ? $all[$key] : $default;
    }

    public static function map(): array
    {
        return Cache::rememberForever('cms.settings', function () {
            return static::query()->pluck('value', 'key')->all();
        });
    }

    public static function putValue(string $key, mixed $value): void
    {
        static::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget('cms.settings');
    }

    public static function forgetCache(): void
    {
        Cache::forget('cms.settings');
    }
}
