<?php

namespace UHack\Pronto\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use UHack\Pronto\Observers\ProductCreateObserver;
use UHack\Pronto\Product;
use UHack\Pronto\Repositories\UnionBankAPI;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(ProductCreateObserver::class);
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UnionBankAPI::class, function() {
            $config = config('unionbank');
            return new UnionBankAPI($config);
        });

        $this->app->alias(UnionBankAPI::class, 'union-bank');
    }
}
