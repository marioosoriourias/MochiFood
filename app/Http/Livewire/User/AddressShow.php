<?php

namespace App\Http\Livewire\User;

use App\Models\Address;
use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class AddressShow extends Component
{

    use WithPagination;
    public $search;
    public $address_id;
    public $city_id;
   
    public function mount($address)
    {
        if (!isset($_COOKIE['city_id'])) {
            setcookie('city_id', 1, time()+3600,'/'); 
            $this->city_id = 1;
        }
        else{
            $this->city_id = $_COOKIE["city_id"];
        }
        
        $this->address_id = $address;
    }

    public function render()
    {
        $address = Address::find($this->address_id);
        $images = Address::find($this->address_id)->images()->get();
        $cities = City::all();

        return view('livewire.user.address-show', compact('address', 'images', 'cities'))->layout('layouts.user');
    }

    public function change()
    {
        setcookie('city_id', $this->city_id, time()+3600,'/'); 
    }

    public function limpiar_page(){
        $this->reset('page');
    }

}
