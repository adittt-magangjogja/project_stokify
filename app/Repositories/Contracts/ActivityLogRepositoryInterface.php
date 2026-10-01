<?php

namespace App\Repositories\Contracts;

interface ActivityLogRepositoryInterface
{
    public function record(string $action, string $description): void;
}
