<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'string | required',
            'content' => 'string | required',
            'preview_image' => 'nullable | file',
            'main_image' => 'nullable | file',
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
            'content.required' => 'Це поле повинно відповідати строковому типу даних',
            'content.string' => 'Це поле повинно відповідати строковому типу даних',
            'preview_image.required' => 'Це поле не може бути пустим, вставте файл заображення',
            'preview_image.file' => 'Це поле не може бути пустим, вставте файл заображення',
            'main_image.required' => 'Це поле не може бути пустим, вставте файл заображення',
            'main_image.file' => 'Це поле не може бути пустим, вставте файл заображення',
            'category_id.required' => 'Це поле не може бути пустим, виберіть відповідну категорію',
            'category_id.exists' => 'ID категорії повинен бути в базі даних, перевірте введені дані',
            'tags_ids.array' => 'Необхідно вказати хоча б одну відповідну категорію',
        ];
    }
}
