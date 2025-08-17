<?php

namespace App\Policies;

use App\Models\ContactData;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactDataPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
       if($user->can('Data Kontak.Lihat Data Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ContactData $contactData): bool
    {
        if($user->can('Data Kontak.Lihat Data Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->can('Data Kontak.Kelola Data Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ContactData $contactData): bool
    {
        if($user->can('Data Kontak.Kelola Data Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ContactData $contactData): bool
    {
        if($user->can('Data Kontak.Kelola Data Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ContactData $contactData): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ContactData $contactData): bool
    {
        return false;
    }
}
