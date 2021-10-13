<?php

declare(strict_types=1);

namespace App\Http\Requests;

/**
 * Class ActivateUserRequest
 * @package App\Http\Requests
 */
final class UserActivateRequest extends UserRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'password' => 'required|confirmed'
        ];
    }
}
