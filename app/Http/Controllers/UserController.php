<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Tweekracht\Html\Alert;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class UserController extends Controller
{
    public function index(): View
    {
        $users = User::with(['reports'])
            ->paginate(25);

        return $this->view->make('user.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::all();

        return $this->view->make('user.create', compact('roles'));
    }

    public function show(User $user): View
    {
        $roles = Role::all();

        return $this->view->make('user.show', compact('user', 'roles'));
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = User::query()->create($request->validated());

        return $this->redirector->route('users.show', [$user->id])
            ->with(Alert::SUCCESS, __('user.create.messages.success', ['User' => $user->name]));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return $this->redirector->route('users.show', [$user->id])
            ->with(Alert::SUCCESS, __('user.update.messages.success', ['User' => $user->name]));
    }
}
