<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    use StoresUploads;

    public function index(string $resource)
    {
        $config = $this->config($resource);
        $model = $config['model'];
        $items = $model::query()->orderBy($config['order'] ?? 'id')->get();

        return view('admin.resources.index', compact('resource', 'config', 'items'));
    }

    public function create(string $resource)
    {
        $config = $this->config($resource);

        return view('admin.resources.form', [
            'resource' => $resource,
            'config' => $config,
            'item' => new $config['model'],
        ]);
    }

    public function store(Request $request, string $resource)
    {
        $config = $this->config($resource);
        $data = $this->validated($request, $config);
        $config['model']::query()->create($data);

        return redirect()->route('admin.resources.index', $resource)->with('status', Str::ucfirst($config['singular']).' created.');
    }

    public function edit(string $resource, int $id)
    {
        $config = $this->config($resource);
        $item = $config['model']::query()->findOrFail($id);

        return view('admin.resources.form', compact('resource', 'config', 'item'));
    }

    public function update(Request $request, string $resource, int $id)
    {
        $config = $this->config($resource);
        $item = $config['model']::query()->findOrFail($id);
        $data = $this->validated($request, $config, $item);
        $item->update($data);

        return redirect()->route('admin.resources.index', $resource)->with('status', Str::ucfirst($config['singular']).' updated.');
    }

    public function destroy(string $resource, int $id)
    {
        $config = $this->config($resource);
        $config['model']::query()->findOrFail($id)->delete();

        return redirect()->route('admin.resources.index', $resource)->with('status', Str::ucfirst($config['singular']).' deleted.');
    }

    protected function config(string $resource): array
    {
        $config = config("cms.resources.{$resource}");
        abort_unless($config, 404);

        return $config;
    }

    protected function validated(Request $request, array $config, $item = null): array
    {
        $rules = [];
        foreach ($config['fields'] as $field) {
            if (($field['type'] ?? 'text') === 'image') {
                $rules[$field['name']] = ['nullable', 'image', 'max:4096'];
                continue;
            }
            if (($field['type'] ?? '') === 'checkbox') {
                $rules[$field['name']] = ['nullable'];
                continue;
            }
            $rules[$field['name']] = ! empty($field['required']) ? ['required'] : ['nullable'];
        }

        $data = $request->validate($rules);

        foreach ($config['fields'] as $field) {
            $name = $field['name'];
            if (($field['type'] ?? '') === 'checkbox') {
                $data[$name] = $request->boolean($name);
            }
            if (($field['type'] ?? '') === 'image') {
                $data[$name] = $this->storeUpload($request->file($name), $item?->{$name});
            }
        }

        return $data;
    }
}
