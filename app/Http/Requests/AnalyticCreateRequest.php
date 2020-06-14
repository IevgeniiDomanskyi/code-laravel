<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AnalyticCreateRequest extends ApiRequest
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
            'analytic_type_id' => 'required|numeric|exists:analytic_types,id',
            'value' => 'required|string',
        ];
    }
}
