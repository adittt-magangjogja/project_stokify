<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $service) {}

    public function index() { return view('pages.pengguna.index', ['users' => $this->service->list()]); }

    public function create() { return view('pages.pengguna.create', ['roles' => Role::cases()]); }

    public function store(UserRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('pengguna.index')->with('success', 'User ditambahkan.');
    }

    public function edit(User $user) { return view('pages.pengguna.edit', ['user' => $user, 'roles' => Role::cases()]); }

    public function update(UserRequest $request, User $user)
    {
        $this->service->update($user, $request->validated());
        return redirect()->route('pengguna.index')->with('success', 'User diperbarui.');
    }

    public function destroy(User $user)
    {
        abort_if($user->id === auth()->id(), 403, 'Tidak bisa menghapus akun sendiri.');
        $this->service->delete($user);
        return redirect()->route('pengguna.index')->with('success', 'User dihapus.');
    }
}
