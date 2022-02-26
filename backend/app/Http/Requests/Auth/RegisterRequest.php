<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            User::ACCOUNT_NAME => 'required|string|max:255',
            User::ACCOUNT_EMAIL => 'required|string|email|max:255|unique:users',
            User::ACCOUNT_PASSWORD => 'required|string|min:8|confirmed',
            User::ACCOUNT_PROFILE => 'required|string|max:255',
            User::ACCOUNT_IMG => 'required|string',
            User::ACCOUNT_SEX => 'required|string'
        ];
    }
}
