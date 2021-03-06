<?php

namespace App\Services;

use App\Models\Products;
use Illuminate\Http\Request;
use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\Requests\DirectPayment\CreditCard;
use PagSeguro\Library;

class PaymentService
{
    protected $areaCode;
    protected $phone;
    protected $installments;
    protected $installmentValue;
    protected $cpf;

    const CURRENCY = 'BRL';
    const MODE = 'DEFAULT';

    public function __construct()
    {
        Library::initialize();
        Library::cmsVersion()->setName("Gateway de Pagamento")->setRelease("1.0.0");
        Library::moduleVersion()->setName("Gateway de Pagamento")->setRelease("1.0.0");

        Configure::setCharset('UTF-8');
        Configure::setAccountCredentials(config('app.pagseguro.email'), config('app.pagseguro.token'));
        Configure::setEnvironment(config('app.pagseguro.environment'));
        Configure::setLog(true, storage_path('logs/pagseguro-'. date('Y-m-d') .'.txt'));
    }

    public function payWithCreditCard(Request $request, array $session)
    {
        $product = Products::find($session['carrinho']['item']);
        $installments = explode(',', $request->installments);
        $phone = trim(preg_replace("/(?<=\d)\s+(?=\d)/", "", $session['cliente']['phone']));

        $this->areaCode = substr($phone, 0, 2);
        $this->phone = substr($phone, 2, strlen($phone));
        $this->installments = (int) $installments[0];
        $this->installmentValue = (float) $installments[1];
        // dd($this->installments, $this->installmentValue);
        $this->cpf = str_replace(['.', '-'], '', $session['cliente']['document']);

        $payment = new CreditCard();
        $payment->setCurrency($this::CURRENCY);
        $payment->setMode($this::MODE);
        $payment->setReference($product->id);
        $payment->addItems()->withParameters(
            $product->id,
            $product->name,
            1,
            $product->price
        );

        // Informações do cliente:
        $payment->setSender()->setHash($session['cartao_cliente']['hash']);
        $payment->setSender()->setName($session['cliente']['name']);
        $payment->setSender()->setEmail($session['cliente']['email']);
        $payment->setSender()->setPhone()->withParameters(
            $this->areaCode,
            $this->phone
        );
        $payment->setSender()->setDocument()->withParameters(
            'CPF',
            $this->cpf
        );

        // Cartão do cliente tokenizado:
        $payment->setToken($session['cartao_cliente']['token']);

        // Quantidade de parcelas e valor da compra do cliente:
        $payment->setInstallment()->withParameters($this->installments, $this->installmentValue);

        // Dados do titular do cartão:
        $payment->setHolder()->setBirthdate($request->birth_date);
        $payment->setHolder()->setName($session['cliente']['name']); // Equals in Credit Card
        $payment->setHolder()->setPhone()->withParameters(
            $this->areaCode,
            $this->phone
        );
        $payment->setHolder()->setDocument()->withParameters(
            'CPF',
            $this->cpf
        );

        $payment->setShipping()->setAddressRequired()->withParameters(false);
        if ($request->endereco_entrega_igual_endereco_fatura === 'S') {

            // $payment->setShipping()->setAddress()->withParameters(
            //     $session['cliente']['street_customer'],
            //     $session['cliente']['number_customer'],
            //     $session['cliente']['district_customer'],
            //     $session['cliente']['cep_customer'],
            //     $session['cliente']['city_customer'],
            //     $session['cliente']['state_customer'],
            //     $session['cliente']['country_customer'],
            //     $session['cliente']['complement_customer']
            // );

            $payment->setBilling()->setAddress()->withParameters(
                $session['cliente']['street_customer'],
                $session['cliente']['number_customer'],
                $session['cliente']['district_customer'],
                $session['cliente']['cep_customer'],
                $session['cliente']['city_customer'],
                $session['cliente']['state_customer'],
                $session['cliente']['country_customer'],
                $session['cliente']['complement_customer']
            );

        } else {



            $payment->setBilling()->setAddress()->withParameters(
                $request->address,
                $request->number,
                $request->district,
                $request->cep,
                $request->city,
                $request->state,
                $request->country,
                $request->complement
            );

        }


        try {
            $result = $payment->register(
                Configure::getAccountCredentials()
            );

            dd($result);

        } catch (\Exception $e) {
            echo '<pre>';
            die($e->getMessage());

        }

    }

}
