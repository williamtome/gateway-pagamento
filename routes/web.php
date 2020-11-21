<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'ProductsController@index');

Route::resources([
    'produto' => 'ProductsController',
    'carrinho' => 'CartController',
    'cliente' => 'CustomerController',
    'pagamento' => 'PaymentController'
]);

Route::get('/pagamento/pagseguro/credenciais', 'PaymentController@getCredentials')
    ->name('pagamento.pagseguro.credenciais');
Route::post('/pagamento/salvar-token-hash', 'PaymentController@saveTokenHashCard')
    ->name('salvar-token-hash');
