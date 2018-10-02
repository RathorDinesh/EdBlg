<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => array(
                    'required',
                    'regex:/(^([a-zA-Z]+)(\d+)?$)/u'
                ),
            'email' => 'required|email',
            'is_active' => 'required',
            'role_id' => 'required'
        ];
    }
}
