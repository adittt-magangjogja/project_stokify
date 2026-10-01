<?php

namespace App\Services;

use App\Repositories\Contracts\SettingsRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SettingsService
{
    public function __construct(private SettingsRepositoryInterface $settings) {}

    public function current(): array
    {
        $settings = $this->settings->all();
        return ['appName' => $settings['app_name'] ?? 'Stockify', 'appLogo' => $settings['app_logo'] ?? null];
    }

    public function update(string $appName, ?UploadedFile $logo = null): void
    {
        $this->settings->put('app_name', $appName);
        if (!$logo) return;

        $oldLogo = $this->settings->get('app_logo');
        $path = $logo->store('settings', 'public');
        $this->settings->put('app_logo', $path);
        if ($oldLogo) Storage::disk('public')->delete($oldLogo);
    }
}
