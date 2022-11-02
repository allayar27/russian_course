<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponseRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }


    public function rules()
    {
        return [
            'file'=>'required|max:90000|mimes:xlsx,doc,docx,ppt,pptx,pdf,ods,odt,odp',
            'title' => 'required|string|max:255',
            'assignment_id' => 'required|numeric|exists:App\Models\Assignment,id',
            'user_id' => 'required|numeric|exists:App\Models\User,id'
        ];
    }
}
