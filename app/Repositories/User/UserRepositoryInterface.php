<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function list();

    public function detail(User $user);

    public function create($data);

    public function update($data, User $user);

    public function delete(User $user);
}
