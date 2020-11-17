<?php

use App\Models\Products;
use Illuminate\Http\Request;
use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\Requests\DirectPayment\CreditCard;
use PagSeguro\Library;

class PaymentService
{
    protected $areaCode;
    protected $phone;

    protected const CURRENCY = 'BRL';
    protected const MODE = 'DEFAULT';

    public function __construct()
    {
        Library::initialize();
        Library::cmsVersion()->setName("Click Telemedicina")->setRelease("0.0.1");
        Library::moduleVersion()->setName("Click Telemedicina")->setRelease("0.0.1");

        Configure::setCharset('UTF-8');
        Configure::setAccountCredentials(config('app.pagseguro.email'), config('app.pagseguro.token'));
        Configure::setEnvironment(config('app.pagseguro.environment'));
        Configure::setLog(true, storage_path('logs/pagseguro-'. date('Y-m-d') .'.txt'));
    }

    public function payWithCreditCard(Request $request)
    {
        $product = Products::find(session()->get('carrinho.item'));
        $this->areaCode = substr(session()->get('cliente.phone'), 0, 2);
        $this->phone = substr(session()->get('cliente.phone'), 2, strlen(session()->get('cliente.phone')));

        $payment = new CreditCard();
        $payment->setCurrency($this->CURRENCY);
        $payment->setMode($this->MODE);
        $payment->setReference($product->id);
        $payment->addItems()->withParameters(
            $product->id,
            $product->name,
            1,
            $product->price
        );
        $payment->setSender()->setHash('');

    }

}
