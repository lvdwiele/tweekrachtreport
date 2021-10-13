<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\Traits\RedirectsUsers;
use App\Http\Requests\UserActivateRequest;
use App\Models\User;
use App\Tweekracht\Html\Alert;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

final class UserVerifyController extends Controller
{
    use RedirectsUsers;

    public function show(int $id, string $hash): View|RedirectResponse
    {
        /** @var User $user */
        $user = User::query()->find($id);

        if ($user->hasVerifiedEmail()) {
            return $this->redirector->route('home');
        }

        return $this->view->make('user.verify.show', compact('id', 'hash'));
    }

    /**
     * @throws AuthorizationException
     */
    public function store(UserActivateRequest $request, int $id, string $hash, Dispatcher $dispatcher): Response|RedirectResponse
    {
        try {
            /** @var User $user */
            $user = User::query()->findOrFail($id);
        } catch (ModelNotFoundException) {
            return $this->redirector->route('home')
                ->with(Alert::DANGER, __('error.something_went_wrong'));
        }

        if (!hash_equals($hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new Response('', 204)
                : $this->redirector->route('home');
        }

        if ($user->markEmailAsVerified()) {
            $user->update([
                'password' => bcrypt($request->validated()['password'])
            ]);
            $dispatcher->dispatch(new Verified($user));
        }

        auth()->loginUsingId($user->id);

        return $request->wantsJson()
            ? new Response('', 204)
            : $this->redirector->route('home')
                ->with('verified', true);
    }
}
