<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
        ];

    }

    public function attributes()
    {
        return [
            'permission' => 'الصلاحيات',
            'name' => 'الاسم'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'الحقل مطلوب',
            'array' => 'حقل الصلاحيات يجب ان يكون مصفوفة'
        ];
    }
}
