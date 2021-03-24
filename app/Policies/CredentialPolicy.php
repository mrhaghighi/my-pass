<?php

namespace App\Policies;

use App\Models\Credential;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CredentialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Credential  $credential
     * @return mixed
     */
    public function view(User $user, Credential $credential)
    {
        return $user->id == $credential->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Credential  $credential
     * @return mixed
     */
    public function update(User $user, Credential $credential)
    {
        return $user->id == $credential->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Credential  $credential
     * @return mixed
     */
    public function delete(User $user, Credential $credential)
    {
        return $user->id == $credential->user_id;
    }
}
