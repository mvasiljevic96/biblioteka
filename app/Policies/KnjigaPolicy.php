<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Knjiga;
use Illuminate\Auth\Access\HandlesAuthorization;

class KnjigaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the knjiga can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the knjiga can view the model.
     */
    public function view(User $user, Knjiga $model): bool
    {
        return true;
    }

    /**
     * Determine whether the knjiga can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the knjiga can update the model.
     */
    public function update(User $user, Knjiga $model): bool
    {
        return true;
    }

    /**
     * Determine whether the knjiga can delete the model.
     */
    public function delete(User $user, Knjiga $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the knjiga can restore the model.
     */
    public function restore(User $user, Knjiga $model): bool
    {
        return false;
    }

    /**
     * Determine whether the knjiga can permanently delete the model.
     */
    public function forceDelete(User $user, Knjiga $model): bool
    {
        return false;
    }
}
