<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | string',
            'email' => 'required | string | email | unique:users',
            'password' => 'required | string',
            'role' => 'required | integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Дане поле не може бути пустим, введіть своє імʼя',
            'name.string' => 'Ви ввели некорректні дані, спробуйте ще раз',
            'email.unique' => 'Ця еmail-адреса вже зайнята, введіть іншу',
            'email.required' => 'Дане поле не може бути пустим, введіть ваш емейл',
            'password.required' => 'Дане поле не може бути пустим, придумайте пароль',
            'password.string' => 'Ви ввели некорректні дані, спробуйте ще раз',
        ];
    }
}
