<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display the register form of the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::find(session()->get('carrinho.item'));
        return view('register.index', ['product' => $product]);
    }
}
