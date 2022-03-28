<?php

namespace App\Http\Livewire\User;

use App\Models\City;
use Livewire\Component;

class NavigationMenu extends Component
{ 
    public $search;
    public $city_id;
    public $select_city;
   
    public function mount($select_city)
    {

        $this->select_city =$select_city;
        
        if (!isset($_COOKIE['city_id'])) {
            setcookie('city_id', 1, time()+3600,'/'); 
            $this->city_id = 1;
            $_COOKIE["city_id"] = $this->city_id;
        }
        else{
            $this->city_id = $_COOKIE["city_id"];
        }
    
    }

    public function render()
    {
        $cities = City::all();
        return view('livewire.user.navigation-menu', compact('cities'))->layout('layouts.user');
    }

    public function change()
    {
        $this->emit('changeId', $this->city_id);
    }

    public function ruta()
    {
        setcookie('search', $this->search, time()+3600,'/'); 
        $_COOKIE["search"] = $this->search;

        $this->emit('busqueda', $this->search);
        return redirect()->route('search');
    }

}


