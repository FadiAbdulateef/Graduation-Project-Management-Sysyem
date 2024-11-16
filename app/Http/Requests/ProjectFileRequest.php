<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectFileRequest extends FormRequest
{

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
           'project_id'=>'required|numeric|exists:projects,id',
           'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,png,jpeg,zip,rar|max:100000',
        ];
    }

    public function attributes()
    {
        return [
            'file' => 'الملف',
        ];
    }

}
