<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WebsiteHeader;
use Illuminate\Auth\Access\Response;

class WebsiteHeaderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->can('Website Header.Lihat Website Header')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WebsiteHeader $websiteHeader): bool
    {
        if($user->can('Website Header.Lihat Website Header')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->can('Website Header.Kelola Website Header')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WebsiteHeader $websiteHeader): bool
    {
        if($user->can('Website Header.Kelola Website Header')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WebsiteHeader $websiteHeader): bool
    {
       if($user->can('Website Header.Kelola Website Header')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WebsiteHeader $websiteHeader): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WebsiteHeader $websiteHeader): bool
    {
        return false;
    }
}
