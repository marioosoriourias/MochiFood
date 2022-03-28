<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FoodTypeController;
use App\Http\Controllers\Admin\AddressImageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\PayMentTypeController;
use App\Http\Controllers\admin\prueba;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Livewire\Admin\Address\AddressImages;
use App\Http\Livewire\Admin\Company\CompanyAddresses;



Route::get('/', HomeController::class)->name('home');

Route::resource('cities', CityController::class)->names('cities');


Route::resource('categories', CategoryController::class)->names('categories');


Route::resource('foodtypes', FoodTypeController::class)->names('foodtypes');

//nuevas
Route::resource('type_payment', PayMentTypeController::class)->names('payments');
Route::resource('services', ServiceController::class)->names('services');

Route::resource('companies', CompanyController::class)->names('companies');

Route::get('company-addresses/{company}', CompanyAddresses::class)->name('company-addresses');



Route::resource('companies/{company}/address', AddressController::class)->names('addresses');

//Route::get('addresses/{company}/create', [AddressController::class, 'create'])->name('addresses.create');

//Route::get('companies/{company}/address/create', [AddressController::class, 'create'])->name('addresses.create');


Route::get('address/{address}/images', AddressImages::class)->name('addresses.images');




Route::resource('address-images', AddressImageController::class, ['except' => ['create']])->names('address-images');

Route::get('address/{address}/createImage', [AddressImageController::class, 'create'])->name('address-images.create');
