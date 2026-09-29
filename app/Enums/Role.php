<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'Admin';
    case MANAGER = 'Manajer Gudang';
    case STAFF = 'Staff Gudang';
}