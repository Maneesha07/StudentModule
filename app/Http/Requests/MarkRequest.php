<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            'student_id' => 'required',
            'mark_in_maths'=> 'numeric',
            'mark_in_science'=> 'numeric',
            'mark_in_history'=> 'numeric',
            'terms' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'student_id.required' => 'The name of the student field is required',
            'mark_in_maths.required' => 'The marks in maths field should be numeric',
            'mark_in_science.required' => 'The marks in science field should be numeric',
            'mark_in_history.required' => 'The marks in history field should be numeric',
            'terms.required' => 'The terms field is required',
        ];
    }
}
