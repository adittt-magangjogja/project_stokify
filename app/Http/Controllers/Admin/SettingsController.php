<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function edit()
    {
        $settings = DB::table('settings')->pluck('value', 'key');
        return view('pages.pengaturan', [
            'appName' => $settings['app_name'] ?? 'Stockify',
            'appLogo' => $settings['app_logo'] ?? null,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'app_name' => 'required|string|max:100',
            'app_logo' => 'nullable|image|max:2048',
        ]);
        DB::table('settings')->updateOrInsert(['key' => 'app_name'], ['value' => $data['app_name']]);
        if ($request->hasFile('app_logo')) {
            $oldLogo = DB::table('settings')->where('key', 'app_logo')->value('value');
            $path = $request->file('app_logo')->store('settings', 'public');
            DB::table('settings')->updateOrInsert(['key' => 'app_logo'], ['value' => $path]);
            if ($oldLogo) Storage::disk('public')->delete($oldLogo);
        }
        return redirect()->route('pengaturan')->with('success', 'Pengaturan disimpan.');
    }
}
