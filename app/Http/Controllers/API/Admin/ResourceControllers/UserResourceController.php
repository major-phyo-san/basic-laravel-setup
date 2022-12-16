<?php

namespace App\Http\Controllers\API\Admin\ResourceControllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;

use App\Models\User;

use App\Repositories\User\UserRepositoryInterface;

class UserResourceController extends Controller
{
    private UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->userRepo = $repo;
    }

    //
    public function list()
    {
        $users = $this->userRepo->list();
        $data = ['users' => $users];

        ResponseData($data);
    }

    public function detail(User $user)
    {
        $user = $this->userRepo->detail($user);

        ResponseData($user);
    }

    public function create(UserCreateRequest $request)
    {
        $data = $request->all();
        $user = $this->userRepo->create($data);

        ResponseCreatedData($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->all();
        $user = $this->userRepo->update($data, $user);

        ResponseData($user);
    }

    public function delete(User $user)
    {
        $this->userRepo->delete($user);

        ResponseMessage('Delete OK');
    }
}
