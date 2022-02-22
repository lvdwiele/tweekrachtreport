<?php

namespace App\Policies;

use App\Models\Report;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->role->id === Role::ROLE_ADMIN;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Report $report
     * @return Response
     */
    public function view(User $user, Report $report): Response
    {
        return $report->client->user_id === $user->id || $this->viewAny($user)
            ? Response::allow()
            : Response::deny(__('client.messages.not_allowed'));
    }
}
