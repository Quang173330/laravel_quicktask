<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTask extends FormRequest
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
            'name' => 'required|unique:tasks',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('message.task_namerequired'),
            'name.unique' => trans('message.task_nameunique'),
            'description.required' => trans('message.task_desrequired'),
        ];
    }
}
