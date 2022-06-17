<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSourceRequest extends FormRequest
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
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['nullable', 'string', 'min:3'],
            'text' => ['nullable', 'string', 'min:5'],
            'url' => ['nullable', 'url'],
            'active' => ['nullable', 'in:0,1']
        ];
    }
}
