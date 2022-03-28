<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryShow extends Component
{

    use WithPagination;
    public $search;

    public $category_id;

    public $city_id;
   
    public function mount($category)
    {
        if (!isset($_COOKIE['city_id'])) {
            setcookie('city_id', 1, time()+3600,'/'); 
            $this->city_id = 1;
        }
        else{
            $this->city_id = $_COOKIE["city_id"];
        }
        
        $this->category_id = $category;
    }

    public function render()
    {
        $category = Category::find($this->category_id);
        $companies = Category::find($this->category_id)->companies()
        ->whereIn('company_id', function($q){
            $q->select('company_id') 
            ->from('addresses')
            ->where('city_id', $this->city_id);
            })->paginate(9);

        $cities = City::all();

        return view('livewire.user.category-show', compact('companies', 'category', 'cities'))->layout('layouts.user');
    }

    public function change()
    {
        setcookie('city_id', $this->city_id, time()+3600,'/'); 
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
