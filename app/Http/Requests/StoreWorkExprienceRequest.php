<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkExprienceRequest extends FormRequest
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
            'name_work_exprience' => 'required',
            'statut_work_exprience' => 'required',
            'description_work_exprience' => 'required',
            'start_work_exprience' =>'required_if:end_work_exprience,nullable',
            'end_work_exprience' => 'required_if:start_work_exprience,nullable'
        ];
    }
}
