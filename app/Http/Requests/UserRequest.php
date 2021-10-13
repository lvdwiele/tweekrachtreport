<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
{
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => __('user.request_messages.name.required'),
            'email.required' => __('user.request_messages.email.required'),
            'email.email' => __('user.request_messages.email.email'),
            'role_id.required' => __('user.request_messages.role_id.required'),
            'password.required' => __('user.request_messages.password.required'),
            'password.confirmed' => __('user.request_messages.password.confirm'),
        ];
    }
}
