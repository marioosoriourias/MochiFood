<?php

namespace App\Http\Livewire\Admin\City;

use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class CityIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $cities = City::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(8);
        return view('livewire.admin.city.city-index', compact('cities'));
    }


    public function limpiar_page(){
        $this->reset('page');
    }
}
