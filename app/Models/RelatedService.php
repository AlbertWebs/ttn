<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedService extends Model
{
    protected $fillable = ['title', 'url', 'sort_order', 'is_visible'];

    protected function casts(): array
    {
        return ['is_visible' => 'boolean'];
    }
}
