<?php

namespace App\Services;

use App\Repositories\Contracts\ActivityLogRepositoryInterface;

class ActivityLogService
{
    public function __construct(private ActivityLogRepositoryInterface $logs) {}
    public function record(string $action, string $description): void { $this->logs->record($action, $description); }
}
