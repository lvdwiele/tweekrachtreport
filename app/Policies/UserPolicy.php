<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @return Response
     */
    public function view(User $user): Response
    {
        return $user->role->id === Role::ROLE_ADMIN
            ? Response::allow()
            : Response::deny(__('user.messages.not_allowed'));
    }
}
