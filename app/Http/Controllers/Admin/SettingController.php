<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $resumePath = Setting::get('resume_pdf_path');

        return view('admin.settings.edit', [
            'resumeUrl' => $resumePath ? Storage::disk('public')->url($resumePath) : null,
            'companies' => Company::orderBy('name')->get(),
        ]);
    }

    public function updateResume(Request $request): RedirectResponse
    {
        $request->validate([
            'resume_pdf' => ['required', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        $caminhoAnterior = Setting::get('resume_pdf_path');

        $path = $request->file('resume_pdf')->store('resume', 'public');
        Setting::set('resume_pdf_path', $path === false ? null : $path);

        if ($caminhoAnterior) {
            Storage::disk('public')->delete($caminhoAnterior);
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Currículo atualizado.');
    }
}
