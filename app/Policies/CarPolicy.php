<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the car can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the car can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Car  $model
     * @return mixed
     */
    public function view(User $user, Car $model)
    {
        return true;
    }

    /**
     * Determine whether the car can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the car can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Car  $model
     * @return mixed
     */
    public function update(User $user, Car $model)
    {
        return true;
    }

    /**
     * Determine whether the car can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Car  $model
     * @return mixed
     */
    public function delete(User $user, Car $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Car  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the car can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Car  $model
     * @return mixed
     */
    public function restore(User $user, Car $model)
    {
        return false;
    }

    /**
     * Determine whether the car can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Car  $model
     * @return mixed
     */
    public function forceDelete(User $user, Car $model)
    {
        return false;
    }
}
