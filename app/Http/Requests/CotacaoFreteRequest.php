<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class CotacaoFreteRequest extends FormRequest
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
            'percentual_cotacao' => 'required|numeric',
            'valor_extra' => 'required|numeric',
            'transportadora_id' => 'required',
            'uf' =>  [
                'required',
                'max:2', 
                 Rule::unique('cotacao_frete')
                       ->where('uf', $this->uf)
                       ->where('transportadora_id', $this->transportadora_id)
               ]

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}