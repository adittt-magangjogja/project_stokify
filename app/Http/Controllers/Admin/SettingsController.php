<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    public function __construct(private SettingsService $service) {}

    public function edit()
    {
        return view('pages.pengaturan', $this->service->current());
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'app_name' => 'required|string|max:100',
            'app_logo' => 'nullable|image|max:2048',
        ]);
        $this->service->update($data['app_name'], $request->file('app_logo'));
        return redirect()->route('pengaturan')->with('success', 'Pengaturan disimpan.');
    }
}
