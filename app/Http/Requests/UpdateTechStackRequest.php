<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTechStackRequest extends FormRequest
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
        $id = $this->route('techStack')->id;
        return [
            'name' => 'required|unique:tech_stacks,name,'.$id.'|max:255',
            'tech_stack_type_id' => 'required|integer|exists:tech_stack_types,id',
        ];
    }
}
