<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'trip_name' => 'required|string|max:50',
            'start_day' => 'required|date',
            'end_day' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'trip_name' => '旅行タイトル',
            'start_day' => '出発日',
            'end_day' => '帰宅日',
        ];
    }
}
