<?php

namespace App\Repositories\Contracts;

interface SettingsRepositoryInterface
{
    public function all(): array;
    public function get(string $key): ?string;
    public function put(string $key, string $value): void;
}
