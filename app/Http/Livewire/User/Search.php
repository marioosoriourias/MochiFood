<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\Company;
use Livewire\Component;

class Search extends Component
{
    protected $listeners = ['busqueda'];

    public function render()
    {

        //$companies = Company::with('category_company','category')->get();
        
        if (isset($_COOKIE['search'])) {
            $palabras = explode(" ", $_COOKIE["search"]);
        }else{
            $palabras = [""];
        }

        $city_id = $_COOKIE['city_id'];


        $companies = Company::join('category_company' ,'category_company.company_id', '=', 'companies.id')
        ->join('addresses', 'addresses.company_id', '=', 'companies.id')
        ->join('categories', 'category_company.category_id', '=', 'categories.id')
        ->select('companies.name','companies.id')
        ->distinct()
        ->whereIn('categories.name', $palabras)
        ->where('addresses.city_id', $city_id)
        ->get();

        // $companies = Company::with('categories')
        //             ->whereIn(['pizza', 'gg'])
        //             ->orderBy('name', 'asc')
        //             ->get();
        // $cities = Category->companies()::where('name', 'LIKE', '%' .$search . '%')->get();
        return view('livewire.user.search', compact('companies', 'palabras'))->layout('layouts.user');
    }

    public function busqueda($palabra)
    {
        $this->search = $palabra;
    }
}
