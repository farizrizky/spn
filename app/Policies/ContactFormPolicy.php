<?php

namespace App\Policies;

use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactFormPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->can('Form Kontak.Lihat Form Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ContactForm $contactForm): bool
    {
        if($user->can('Form Kontak.Lihat Form Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->can('Form Kontak.Kelola Form Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ContactForm $contactForm): bool
    {
       if($user->can('Form Kontak.Kelola Form Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ContactForm $contactForm): bool
    {
        if($user->can('Form Kontak.Kelola Form Kontak')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ContactForm $contactForm): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ContactForm $contactForm): bool
    {
        return false;
    }
}
