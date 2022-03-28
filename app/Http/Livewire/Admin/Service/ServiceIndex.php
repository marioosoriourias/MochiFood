<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $services = Service::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(8);
        return view('livewire.admin.service.service-index', compact('services'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
