<?php

namespace App\Http\Requests;

use App\Rules\NomeCompleto;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => ['required', new NomeCompleto()],
            'cpf' => 'required|cpf',
            'email' => 'required|email',
            'phone' => 'required|max:13'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigtório.',
            'cpf.required' => 'O campo CPF é obrigtório.',
            'cpf.cpf' => 'O CPF está inválido. Favor digite corretamente.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado está incorreto.',
            'phone.required' => 'O campo telefone é obrigatório.',
        ];
    }
}
