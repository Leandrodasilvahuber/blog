<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $resumePath = Setting::get('resume_pdf_path');

        return view('welcome', [
            'resumeUrl' => $resumePath ? Storage::disk('public')->url($resumePath) : null,
            'companies' => Company::orderBy('name')->get(),
        ]);
    }
}
