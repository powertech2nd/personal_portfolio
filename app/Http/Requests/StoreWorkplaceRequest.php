<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreWorkplaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'instance_name' => 'required|unique:workplaces|max:255',
            'city' => 'required|max:255',
            'position' => 'required|max:255',
            'description' => 'max:2000|nullable',
            'date_join' => 'required|date_format:d/m/Y',
            'date_leave' => 'nullable|date_format:d/m/Y|prohibited_if:is_current_workplace,true',
            'is_current_workplace' => 'boolean',
            'order' => 'required|integer',
            'logo' => 'nullable|image|max:5120' // 5 MB
        ];
    }
}
