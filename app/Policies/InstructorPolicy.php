<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Instructor;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstructorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the instructor can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the instructor can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Instructor  $model
     * @return mixed
     */
    public function view(User $user, Instructor $model)
    {
        return true;
    }

    /**
     * Determine whether the instructor can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the instructor can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Instructor  $model
     * @return mixed
     */
    public function update(User $user, Instructor $model)
    {
        return true;
    }

    /**
     * Determine whether the instructor can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Instructor  $model
     * @return mixed
     */
    public function delete(User $user, Instructor $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Instructor  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the instructor can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Instructor  $model
     * @return mixed
     */
    public function restore(User $user, Instructor $model)
    {
        return false;
    }

    /**
     * Determine whether the instructor can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Instructor  $model
     * @return mixed
     */
    public function forceDelete(User $user, Instructor $model)
    {
        return false;
    }
}
