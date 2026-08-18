<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait StoresUploads
{
    protected function storeUpload(?UploadedFile $file, ?string $current = null): ?string
    {
        if (! $file) {
            return $current;
        }

        $directory = public_path('uploads/cms');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'-'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($directory, $name);

        return 'uploads/cms/'.$name;
    }
}
