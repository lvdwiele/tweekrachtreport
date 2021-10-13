<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Role;
use App\Models\User;

/**
 * Class StoreUserRequest
 * @package App\Http\Requests
 */
final class UserStoreRequest extends UserRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        /** @var User $user */
        $user = auth()->user();
        return $user->role_id === Role::ROLE_ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required'
        ];
    }
}
