<?php

namespace App\Http\Livewire\User;

use App\Models\City;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyShow extends Component
{
    use WithPagination;
    public $search;
    public $company_id;
    public $city_id;

    protected $listeners = ['changeId'];
   
    public function mount($company)
    {
        if (!isset($_COOKIE['city_id'])) {
            setcookie('city_id', 1, time()+3600,'/'); 
            $this->city_id = 1;
        }
        else{
            $this->city_id = $_COOKIE["city_id"];
        }
        
        $this->company_id = $company;
    }

    
    public function render()
    {
        $company = company::find($this->company_id);
        $addresses = Company::find($this->company_id)->addresses()
                     ->where('city_id', $this->city_id)->get();

        $cities = City::all();
        return view('livewire.user.company-show', compact('cities', 'addresses', 'company'))->layout('layouts.user');
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
