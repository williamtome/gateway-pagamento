<?php

namespace App\Providers;

use Code\Validator\Cnpj;
use Code\Validator\Cpf;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('cpf', function ($attibute, $value, $parameters, $validator) {
            return (new Cpf())->isValid($value); //Para validar CPF.
        });

        \Validator::extend('cnpj', function ($attibute, $value, $parameters, $validator) {
            return (new Cnpj())->isValid($value); //Para validar CNPJ.
        });
    }
}
