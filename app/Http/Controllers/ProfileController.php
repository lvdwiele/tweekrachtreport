<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

final class ProfileController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();

        return $this->view->make('profile.show', compact('user'));
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $user->update([
            'name' => $request->validated()['name'],
            'email' => $request->validated()['email'],
            'phone_number' => $request->validated()['phone_number'] ?? '',
            'password' => bcrypt($request->validated()['password']),
        ]);

        return $this->redirector->route('profile');
    }
}
