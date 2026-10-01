<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\SettingsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SettingsRepository implements SettingsRepositoryInterface
{
    public function all(): array { return DB::table('settings')->pluck('value', 'key')->all(); }
    public function get(string $key): ?string { return DB::table('settings')->where('key', $key)->value('value'); }
    public function put(string $key, string $value): void
    {
        DB::table('settings')->updateOrInsert(['key' => $key], ['value' => $value]);
    }
}
