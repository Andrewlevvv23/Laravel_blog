<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required | string',
            'content' => 'required | string',
            'preview_image' => 'required | file',
            'main_image' => 'required | file',
            'category_id' => 'required | exists:categories,id',
            'tag_ids' => 'nullable | array',
            'tag_ids.*' => 'nullable | exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле необхідно заповнити',
            'title.string' => 'Це поле повинно відповідати строковому типу даних',
            'content.required' => 'Це поле повинно не повинне бути пустим, напишіть пост',
            'content.string' => 'Це поле повинно відповідати строковому типу даних',
            'preview_image.required' => 'Це поле не може бути пустим, вставте файл зображення',
            'preview_image.file' => 'Це поле не може бути пустим, вставте файл зображення',
            'main_image.required' => 'Це поле не може бути пустим, вставте файл зображення',
            'main_image.file' => 'Це поле не може бути пустим, вставте файл зображення',
            'category_id.required' => 'Це поле не може бути пустим, виберіть відповідну категорію',
            'category_id.exists' => 'ID категорії повинен бути в базі даних, перевірте введені дані',
            'tag_ids.array' => 'Необхідно вказати хоча б одну відповідну категорію',
        ];
    }


}


