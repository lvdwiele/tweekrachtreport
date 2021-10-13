<?php

namespace App\Http\Middleware;

use App;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Auth\Access\Response;

class CheckForAdminAccess
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        if ($user->role->id === Role::ROLE_ADMIN) {
            return $next($request);
        }

        return Response::deny(__('user.messages.not_allowed'));
    }
}
