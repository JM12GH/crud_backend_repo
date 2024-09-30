<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'shelf_number' => 'required|string|max:255',
            'preview_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'total_nr_of_copies' => 'required|integer',
            'book_category_id' => 'nullable|integer|exists:book_categories,id',
            'authors' => 'nullable|array',
            'authors.*' => 'integer|exists:authors,id',
        ];
    }


}
