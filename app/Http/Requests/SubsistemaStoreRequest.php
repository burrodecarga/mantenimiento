<?php

namespace App\Http\Requests;

use App\Subsistema;
use Illuminate\Foundation\Http\FormRequest;

class SubsistemaStoreRequest extends FormRequest
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

        //dd($_POST);
        return [
            'name' => 'required|max:255',
            'sistema_id'=>'required|Integer',
        ];
    }
}
