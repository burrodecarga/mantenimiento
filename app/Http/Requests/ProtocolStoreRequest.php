<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProtocolStoreRequest extends FormRequest
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
        'name'=>'required|unique:protocols',
        'type'=>'required',
        'tp'=>'required',
        'frequency'=>'required|Integer|min:1',
        'duration'=>'required|Integer|min:1',
        'authorization'=>'required'
    ];
    }
}
