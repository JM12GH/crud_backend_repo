<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $studentId = is_object($this->route('student')) ? $this->route('student')->id : $this->route('student');

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'year' => 'required|numeric',
            'email' => 'required|email|unique:students,email,' . $studentId,
            'is_approved' => 'required|boolean',
            'branch_id' => 'required|exists:branches,id',
            'student_category_id' => 'required|exists:student_categories,id',
            'books' => 'array|exists:books,id',
        ];
    }
}

