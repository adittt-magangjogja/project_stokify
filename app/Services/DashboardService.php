<?php

namespace App\Services;

use App\Repositories\Contracts\DashboardRepositoryInterface;

class DashboardService
{
    public function __construct(private DashboardRepositoryInterface $dashboard) {}

    public function admin(): array
    {
        return $this->dashboard->adminData(now()->subDays(30));
    }

    public function manager(): array
    {
        return $this->dashboard->managerData(today());
    }

    public function staff(): array
    {
        return $this->dashboard->staffData();
    }
}
