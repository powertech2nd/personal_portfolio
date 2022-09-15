<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
        $name= $this->input('name');
        $workplace_id= $this->input('workplace_id');

        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('projects')->where(function ($query) use($name, $workplace_id){
                    return $query
                            ->where('name', $name)
                            ->where('workplace_id', $workplace_id);
                }),
            ],
            'description' => 'nullable',
            'order' => 'required|integer',
            'date_start' => 'required|date',
            'date_finish' => 'nullable|date',
            'workplace_id' => 'required|exists:workplaces,id',
        ];
    }
}
