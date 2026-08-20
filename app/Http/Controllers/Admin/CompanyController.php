<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\ValidatesCompanyData;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    use ValidatesCompanyData;

    public function create(): View
    {
        return view('admin.companies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Company::create($this->validatedCompanyData($request, logoRequired: true));

        return redirect()->route('admin.settings.edit')->with('status', 'Empresa adicionada.');
    }

    public function edit(Company $company): View
    {
        return view('admin.companies.edit', ['company' => $company]);
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $data = $this->validatedCompanyData($request, logoRequired: false);
        $logoAnterior = $company->logo_path;

        $company->update($data);

        if (isset($data['logo_path']) && $logoAnterior && $logoAnterior !== $company->logo_path) {
            Storage::disk('public')->delete($logoAnterior);
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Empresa atualizada.');
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->route('admin.settings.edit')->with('status', 'Empresa removida.');
    }
}
