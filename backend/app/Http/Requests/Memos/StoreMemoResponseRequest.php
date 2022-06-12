<?php

namespace App\Http\Requests\Memos;

use App\Models\MemoResponse;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemoResponseRequest extends FormRequest
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
            MemoResponse::MEMO_RESPONSE_MESSAGE => 'string|max:255',
        ];
    }
}
