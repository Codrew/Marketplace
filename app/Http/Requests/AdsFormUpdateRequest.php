<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsFormUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:60',
            'description' => 'required|min:3',
            'category_id' => 'required',
            'country_id' => 'required',
            'price' => 'required',
            'price_status' => 'required',
            'price_condition' => 'required',
            'phone_number' => 'numeric',
        ];
    }
}
