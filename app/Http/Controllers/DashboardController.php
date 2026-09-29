<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function __invoke(DashboardService $service)
    {
        return match (auth()->user()->role) {
            Role::ADMIN => view('pages.dashboard-admin', $service->admin()),
            Role::MANAGER => view('pages.dashboard-manager', $service->manager()),
            Role::STAFF => view('pages.dashboard-staff', $service->staff()),
        };
    }
}
