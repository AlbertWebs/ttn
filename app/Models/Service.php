<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'card_style', 'link_label', 'anchor', 'items', 'sort_order', 'is_visible'];

    protected function casts(): array
    {
        return ['is_visible' => 'boolean'];
    }

    public function itemList(): array
    {
        return array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", (string) $this->items) ?: [])));
    }
}
