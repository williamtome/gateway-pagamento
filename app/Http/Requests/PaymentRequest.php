<?php

namespace App\Http\Requests;

use App\Rules\NomeCompleto;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'card_number' => 'required|digits_between:0,16',
            'card_name' => ['required', 'max:50', new NomeCompleto],
            'card_validate' => 'required|date_format:m/Y',
            'birth_date' => 'required|date_format:d/m/Y',
            'card_cvv' => 'required|integer|digits_between:0,3',
            'installments' => 'required',
            'cep' => 'required|formato_cep',
            'address' => 'required|max:80',
            'number' => 'required',
            'complement' => 'required|max:40',
            'district' => 'required|max:60',
            'city' => 'required|min:2|max:60',
            'state' => 'required',
            'country' => 'required',
        ];
    }

    /**
     * Name of the attributes correspondent to fields.
     *
     * @return array
     **/
    public function attributes()
    {
        return [
            'card_number' => 'Número do Cartão',
            'card_name' => 'Nome do Dono do Cartão',
            'card_validate' => 'Data de Validade do Cartão',
            'card_cvv' => 'Código de segurança',
            'installments' => 'Parcelas',
            'cep' => 'CEP',
            'address' => 'Endereço',
            'complement' => 'Complemento',
            'district' => 'Bairro',
            'city' => 'Cidade',
            'state' => 'Estado',
            'country' => 'País',
        ];
    }
}
