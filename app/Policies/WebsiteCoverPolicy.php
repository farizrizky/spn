<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WebsiteCover;
use Illuminate\Auth\Access\Response;

class WebsiteCoverPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         if($user->can('Website Cover.Lihat Website Cover')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WebsiteCover $websiteCover): bool
    {
        if($user->can('Website Cover.Lihat Website Cover')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->can('Website Cover.Kelola Website Cover')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WebsiteCover $websiteCover): bool
    {
         if($user->can('Website Cover.Kelola Website Cover')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WebsiteCover $websiteCover): bool
    {
         if($user->can('Website Cover.Kelola Website Cover')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WebsiteCover $websiteCover): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WebsiteCover $websiteCover): bool
    {
        return false;
    }
}
