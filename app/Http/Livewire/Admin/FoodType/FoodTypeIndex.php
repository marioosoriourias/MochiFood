<?php

namespace App\Http\Livewire\Admin\FoodType;

use App\Models\Food_type;
use Livewire\Component;
use Livewire\WithPagination;

class FoodTypeIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $foodtypes = Food_type::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(8);
        return view('livewire.admin.food-type.food-type-index', compact('foodtypes'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
