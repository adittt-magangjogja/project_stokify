<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class SidebarDashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $settings = DB::table('settings')->pluck('value', 'key');

        return view('components.sidebar-dashboard', [
            'appName' => $settings['app_name'] ?? 'Stockify',
            'appLogo' => $settings['app_logo'] ?? null,
        ]);
    }
}
