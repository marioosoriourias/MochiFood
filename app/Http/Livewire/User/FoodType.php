<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\City;
use App\Models\Company;
use App\Models\Category;
use App\Models\Food_type;
use Livewire\WithPagination;

class FoodType extends Component
{

    use WithPagination;
    public $search;

    public $categories;
    public $food_type = 1;
    public $category_name = "Comidas";

    public $city_id;

    protected $listeners = ['changeId'];

    
    public function tipo_comida(Food_type $tipo)
    {
            $this->food_type = $tipo->id;
            $this->category_name = $tipo->name;
    }

    public function mount()
    {
        $this->city_id = $_COOKIE["city_id"];
        $this->categories = Category::all();
    }

    public function render()
    {

        $food_types = Food_type::all();
        $companies = Company::where('food_type_id', $this->food_type)
                            ->whereIn('id', function($q){
                                $q->select('company_id') 
                                ->from('addresses')
                                ->where('city_id', $this->city_id);
                                })->paginate(9);

        $cities = City::all();
        return view('livewire.user.food-type', compact('companies', 'cities', 'food_types'))->layout('layouts.user');
    }

    public function changeId($id)
    {
        $this->city_id = $id;
        setcookie('city_id', $this->city_id, time()+3600,'/'); 
    }

    public function limpiar_page(){
        $this->reset('page');
    }

}
