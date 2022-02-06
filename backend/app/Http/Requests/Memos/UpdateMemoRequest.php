<?php

namespace App\Http\Requests\Memos;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: 条件分岐しなてく良いのか検討
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'memo' => 'required|max:255',
            'img' => 'nullable',
        ];
    }
}
