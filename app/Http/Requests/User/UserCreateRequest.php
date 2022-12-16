<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => ['bail','required', 'max:255'],
            'email' => ['sometimes', 'email:rfc', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required']
        ];
    }
}
