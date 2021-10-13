<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

final class ProfileRequest extends UserRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = $this->user();

        return [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user),
                'email'
            ],
            'password' => 'nullable|confirmed|min:5'
        ];
    }
}
