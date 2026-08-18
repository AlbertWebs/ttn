<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use StoresUploads;

    public function edit(string $group)
    {
        $groups = config('cms.setting_groups');
        abort_unless(isset($groups[$group]), 404);

        return view('admin.settings.edit', [
            'groupKey' => $group,
            'group' => $groups[$group],
            'groups' => $groups,
        ]);
    }

    public function update(Request $request, string $group)
    {
        $groups = config('cms.setting_groups');
        abort_unless(isset($groups[$group]), 404);

        foreach ($groups[$group]['fields'] as $field) {
            $key = $field['key'];
            if (($field['type'] ?? 'text') === 'image') {
                $file = $request->file($key);
                if ($file) {
                    Setting::putValue($key, $this->storeUpload($file, setting($key)));
                }
                continue;
            }

            Setting::putValue($key, $request->input($key));
        }

        return back()->with('status', 'Settings saved.');
    }
}
