<?php

use App\Http\Controllers\user\searchController;
use App\Http\Livewire\User\AddressShow;
use App\Http\Livewire\User\CategoryShow;
use App\Http\Livewire\User\CompanyShow;
use App\Http\Livewire\User\Home;
use App\Http\Livewire\User\Search;


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

Route::get('/', Home::class)->name('home');

Route::get('category/{category}', CategoryShow::class)->name('category');

Route::get('company/{company}', CompanyShow::class)->name('company-show');

Route::get('address/{address}', AddressShow::class)->name('address-show');

Route::get('search', Search::class)->name('search');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
