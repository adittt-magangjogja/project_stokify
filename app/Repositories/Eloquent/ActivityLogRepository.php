<?php

namespace App\Repositories\Eloquent;

use App\Models\ActivityLog;
use App\Repositories\Contracts\ActivityLogRepositoryInterface;

class ActivityLogRepository implements ActivityLogRepositoryInterface
{
    public function record(string $action, string $description): void
    {
        ActivityLog::create(['user_id' => auth()->id(), 'action' => $action, 'description' => $description, 'created_at' => now()]);
    }
}
