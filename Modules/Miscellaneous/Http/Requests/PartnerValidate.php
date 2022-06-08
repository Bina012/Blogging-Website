<?php

namespace Modules\Miscellaneous\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerValidate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'company_name',
        'address',
        'phone_number|numeric|min:10|max:10',
        'status',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
