<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['name', 'email', 'message', 'status', 'mail_sent', 'mail_error'];

    protected function casts(): array
    {
        return ['mail_sent' => 'boolean'];
    }
}
