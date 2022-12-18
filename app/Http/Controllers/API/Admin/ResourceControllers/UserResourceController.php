<?php

namespace App\Http\Controllers\API\Admin\ResourceControllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;

use App\Models\User;

use App\Repositories\User\UserRepositoryInterface;

/**
* user resource CRUD api controller
*
*/
class UserResourceController extends Controller
{
    private UserRepositoryInterface $userRepo;

    /**
     * constructor
     *
     * @param UserRepositoryInterface $repo   contract of UserRepository
     *
     * @return UserResourceController   instance of UserResourceController
     */
    public function __construct(UserRepositoryInterface $repo)
    {
        $this->userRepo = $repo;
    }

    /**
     * lists all users
     *
     * @return Response   json array of all users
     */
    public function list()
    {
        $users = $this->userRepo->list();
        $data = ['users' => $users];

        ResponseData($data);
    }

    /**
     * detail of a specific user
     * @param User $user   specific user
     *
     * @return Response   json data of a user
     */
    public function detail(User $user)
    {
        $user = $this->userRepo->detail($user);

        ResponseData($user);
    }

    /**
     * creates a new user
     * @param UserCreateRequest $request   new user data
     *
     * @return Response   json data of created user
     */
    public function create(UserCreateRequest $request)
    {
        $data = $request->all();
        $user = $this->userRepo->create($data);

        ResponseCreatedData($user);
    }

    /**
     * updates an existing user
     * @param UserUpdateRequest $request   updated user data
     * @param User $user   specific user to be updated
     *
     * @return Response   json data of updated user
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->all();
        $user = $this->userRepo->update($data, $user);

        ResponseData($user);
    }

    /**
     * deletes an existing user
     * @param User $user   specific user to be deleted
     *
     * @return Response   json message
     */
    public function delete(User $user)
    {
        if($this->userRepo->delete($user)){
            ResponseMessage('Delete OK');
        }

        else{
            ResponseMessage('Delete not OK');
        }

    }
}
