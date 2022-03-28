<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $cities = Category::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(8);
        return view('livewire.admin.category.category-index', compact('cities'));
    }


    public function limpiar_page(){
        $this->reset('page');
    }
}
