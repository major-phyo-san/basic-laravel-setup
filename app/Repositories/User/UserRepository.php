<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function list()
    {
        return User::all();
    }

    public function detail(User $user)
    {
        return $user;
    }

    public function create($data)
    {
        $user = User::create($data);

        return $user;
    }

    public function update($data, User $user)
    {
        $user->update($data);
        $user->save();

        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}
