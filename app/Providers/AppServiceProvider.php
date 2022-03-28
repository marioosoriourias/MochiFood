<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\address_image;
use App\Models\Company;
use App\Observers\AddressImageObserver;
use App\Observers\AddressObserver;
use App\Observers\CompanyObserver;
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
        Address::observe(AddressObserver::class);
        Company::observe(CompanyObserver::class);
        address_image::observe(AddressImageObserver::class);
    }
}
