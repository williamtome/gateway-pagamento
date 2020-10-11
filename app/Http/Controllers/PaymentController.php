<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
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

    public function getCredentials()
    {
        return 'OK';
        // try {
        //     $sessionCode  = '';
        // } catch (\Throwable $th) {
        //     return $th->getMessage();
        // }
    }
}
