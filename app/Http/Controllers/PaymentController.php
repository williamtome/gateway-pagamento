<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
        \PagSeguro\Configuration\Configure::setEnvironment('sandbox');//production or sandbox
        \PagSeguro\Configuration\Configure::setAccountCredentials(
            config('app.pagseguro.email'),
            config('app.pagseguro.token')
        );
        \PagSeguro\Configuration\Configure::setCharset('UTF-8');// UTF-8 or ISO-8859-1
        \PagSeguro\Configuration\Configure::setLog(true, storage_path('/logs/pagseguro-'.date('Y-m-d').'.log'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Products::find(session()->get('carrinho.item'));
        return view('payment.create', ['product' => $product]);
    }

    /**
     * Get the credentials of PagSeguro API
     *
     * @return string $hashCode
     * @throws Throwable
     **/
    public function getCredentials()
    {
        try {

            $sessionCode  = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            return $sessionCode->getResult();

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return type
     * @throws conditon
     **/
    public function store(PaymentRequest $request)
    {
        dd($request->all(), session()->all());
    }

    public function saveTokenHashCard(Request $request)
    {
        $cartaoCliente = [
            'token' => $request->token,
            'hash' => $request->hash
        ];

        session()->put('cartao_cliente', $cartaoCliente);

        if ($request->token && $request->hash)
            return response()->json(['success' => true], 200);

        return response()->json(['success' => false]);
    }
}
