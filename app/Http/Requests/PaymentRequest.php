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
            'endereco_entrega_igual_endereco_fatura' => 'required',
            'cep' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
            'address' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
            'number' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
            'complement' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
            'district' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
            'city' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
            'state' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
            'country' => 'required_if:endereco_entrega_igual_endereco_fatura,N',
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
