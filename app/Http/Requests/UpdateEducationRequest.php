<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'name_education' => 'required',
            'statut_education' => 'required',
            'description_education' => 'required',
            'end_education' =>'required_if:end_education,nullable',
            'end_education' => 'required'
        ];
    }
}
