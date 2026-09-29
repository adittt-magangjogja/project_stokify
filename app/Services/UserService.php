<?php

namespace App\Services;

use App\Models\{ActivityLog, User};
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function list() { return User::latest()->paginate(10); }

    public function store(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        ActivityLog::record('create_user', "Menambah user {$user->name}");
        return $user;
    }

    public function update(User $user, array $data)
    {
        if (filled($data['password'] ?? null)) $data['password'] = Hash::make($data['password']);
        else unset($data['password']);

        $user->update($data);
        ActivityLog::record('update_user', "Mengubah user {$user->name}");
        return $user;
    }

    public function delete(User $user): void
    {
        ActivityLog::record('delete_user', "Menghapus user {$user->name}");
        $user->delete();
    }
}