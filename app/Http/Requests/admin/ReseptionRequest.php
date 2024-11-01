<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReseptionRequest extends FormRequest
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
     * @return array<string, mixed>d
     */
    public function rules()
    {
        return [
            // 'user_id' => ['required', 'exists:users,id'],
            'user_id' => ['required'],
            'reception_data' => ['required'],

        ];
    }
}
