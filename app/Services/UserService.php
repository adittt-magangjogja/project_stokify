<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(private UserRepositoryInterface $users, private ActivityLogService $activity) {}

    public function list() { return $this->users->paginate(); }

    public function store(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->users->create($data);
        $this->activity->record('create_user', "Menambah user {$user->name}");
        return $user;
    }

    public function update(User $user, array $data)
    {
        if (filled($data['password'] ?? null)) $data['password'] = Hash::make($data['password']);
        else unset($data['password']);

        $this->users->update($user, $data);
        $this->activity->record('update_user', "Mengubah user {$user->name}");
        return $user;
    }

    public function delete(User $user): void
    {
        $this->activity->record('delete_user', "Menghapus user {$user->name}");
        $this->users->delete($user);
    }
}
