<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
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
        // BankPaymentGateway class bind to function witch return same class but with currency param defined.
        // BankPaymentGateway class use sinlgeton
        /* $this->app->singleton(BankPaymentGateway::class, function ($app){
            return new BankPaymentGateway('eur');
        }); */

        // PaymentGateway interface binding
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {

            // Set the correct payment gateway checking if request has a credit key (http://127.0.0.1:8000/pay?credit=true)
            if (request()->has('credit')) {
                return new CreditPaymentGateway('eur');
            }

            return new BankPaymentGateway('eur');

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
