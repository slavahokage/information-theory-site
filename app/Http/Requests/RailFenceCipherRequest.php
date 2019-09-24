<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RailFenceCipherRequest extends FormRequest
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
            'key' => 'required|filled|integer|min:2|max:100',
            'file' => 'required|filled|mimes:txt',
        ];
    }
}
