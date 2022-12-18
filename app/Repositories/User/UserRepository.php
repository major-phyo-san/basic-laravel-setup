<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Collection;

use App\Models\User;

/**
* user repository
*
*/
class UserRepository implements UserRepositoryInterface
{
    /**
     * gets all users from database
     *
     * @return Collection   Eloquent collection of all users
     */
    public function list() : Collection
    {
        return User::all();
    }

    /**
     * gets a user from database
     *
     * @return User   Eloquent model of a user
     */
    public function detail(User $user) : User
    {
        return $user;
    }

    /**
     * creates a new user in database
     * @param Array $data   new user data
     *
     * @return User   Eloquent model of created user
     */
    public function create(array $data) : User
    {
        $user = User::create($data);

        return $user;
    }

    /**
     * updates an existing user in database
     * @param Array $data   updated user data
     * @param User $user   specific user to be updated
     *
     * @return User   Eloquent model of updated user
     */
    public function update(array $data, User $user) : User
    {
        $user->update($data);
        $user->save();

        return $user;
    }

    /**
     * deletes an existing user in database
     * @param User $user   specific user to be deleted
     *
     * @return Bool   user deleted or not?
     */
    public function delete(User $user) : bool
    {
        $user->tokens()->delete();
        return (bool) $user->delete();
    }
}
