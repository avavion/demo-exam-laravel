<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => ['required', 'min:6', 'max:255'],
            'short_content' => ['required', 'min:6', 'max:255'],
            'content' => ['required'],
            'image_file' => ['required', 'file', 'mimes:jpg,png,jpeg']
        ];
    }
}
