<?php

namespace AllBlacks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
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
            'name' => 'required',
            'document' => 'required|unique:clients',
            'postcode' => 'required',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'unique:clients',
        ];
    }
}
