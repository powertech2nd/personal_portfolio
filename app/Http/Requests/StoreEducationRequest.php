<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::check();
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
            'instance_name' => 'required|unique:educations|max:255',
            'major' => 'max:255|nullable',
            'city' => 'required|max:255',
            'date_start' => 'required|date_format:d/m/Y',
            'date_end' => 'nullable|date_format:d/m/Y|prohibited_if:is_currently_studying,true',
            'is_currently_studying' => 'boolean',
        ];
    }
}
