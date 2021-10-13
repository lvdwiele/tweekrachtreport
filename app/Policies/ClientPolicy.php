<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

/**
 * Class ClientPolicy
 * @package App\Policies
 */
class ClientPolicy
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
     * @param Client $client
     * @return Response
     */
    public function view(User $user, Client $client): Response
    {
        return $client->user->id === $user->id || $this->viewAny($user)
            ? Response::allow()
            : Response::deny(__('client.messages.not_allowed'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Client $client
     * @return Response
     */
    public function update(User $user, Client $client): Response
    {
        return $client->user->id === $user->id || $this->viewAny($user)
            ? Response::allow()
            : Response::deny(__('client.messages.not_allowed'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Client $client
     * @return Response
     */
    public function delete(User $user, Client $client): Response
    {
        return $client->user->id === $user->id || $this->viewAny($user)
            ? Response::allow()
            : Response::deny(__('client.not_allowed'));
    }
}
