<?php

namespace App\Repositories\Contracts;

interface DashboardRepositoryInterface
{
    public function adminData($from): array;
    public function managerData($today): array;
    public function staffData(): array;
}
