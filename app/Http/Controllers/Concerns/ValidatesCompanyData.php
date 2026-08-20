<?php

declare(strict_types=1);

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ValidatesCompanyData
{
    /**
     * @return array<string, mixed>
     */
    private function validatedCompanyData(Request $request, bool $logoRequired): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => [$logoRequired ? 'required' : 'nullable', 'image', 'max:4096'],
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $data['logo_path'] = $path === false ? null : $path;
        }
        unset($data['logo']);

        return $data;
    }
}
