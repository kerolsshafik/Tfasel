<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_ar' => 'required|string|max:255',
            'content_ar' => 'required|string',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string|max:255',
            'description_en' => 'required|string|max:255',
            'content_en' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|array|max:5',
            'videos' => 'nullable|max:1',
            'images.*' => 'file|mimes:jpg,jpeg,png,gif|max:10240', // Images up to 10MB
            'videos.*' => 'mimes:mp4,avi,mkv|max:20480', // Max 20 MB for each video
        ];
    }
}
