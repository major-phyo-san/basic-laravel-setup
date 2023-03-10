<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $id = request()->route('user')->id;
        return [
            //
            'name' => ['sometimes'],
            'email' => ['email:rfc', 'sometimes', 'unique:users,id,'.$id],
            'phone' => ['sometimes', 'unique:users,id,'.$id],
            'password' => ['sometimes']
        ];
    }
}
