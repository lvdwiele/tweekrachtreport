<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth\Traits;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait ConfirmsPasswords
{
    use RedirectsUsers;

    /**
     * Display the password confirmation view.
     *
     * @return View
     */
    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    /**
     * Confirm the given user's password.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function confirm(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $this->resetPasswordConfirmationTimeout($request);

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->intended($this->redirectPath());
    }

    /**
     * Reset the password confirmation timeout.
     *
     * @param Request $request
     * @return void
     */
    protected function resetPasswordConfirmationTimeout(Request $request)
    {
        $request->session()->put('auth.password_confirmed_at', time());
    }

    /**
     * Get the password confirmation validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'password' => 'required|password',
        ];
    }

    /**
     * Get the password confirmation validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }
}
