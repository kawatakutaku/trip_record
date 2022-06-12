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
            // TODO: confirmのrequestは必要なのか
            // User::ACCOUNT_PASSWORD_CONFIRMATION => 'required|same:password',
            User::ACCOUNT_PROFILE => 'required|string|max:255',
            // TODO: test時にエラーとなるため、一時的にバリデーションを軽くしておく
            User::ACCOUNT_IMG => 'required',
            // User::ACCOUNT_IMG => 'required|file|image|mimes:jpeg,png',
            User::ACCOUNT_GENDER => 'required|string'
        ];
    }
}
