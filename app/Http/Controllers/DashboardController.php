<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function __invoke(DashboardService $service)
    {
        return match (auth()->user()->role) {
            Role::ADMIN => view('dashboard.admin', $service->admin()),
            Role::MANAGER => view('dashboard.manager', $service->manager()),
            Role::STAFF => view('dashboard.staff', $service->staff()),
        };
    }
}