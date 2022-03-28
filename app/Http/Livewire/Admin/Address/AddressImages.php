<?php

namespace App\Http\Livewire\Admin\Address;

use App\Models\Address;
use Livewire\Component;
use Livewire\WithPagination;

class AddressImages extends Component
{

    use WithPagination;
    public $search;
    public $address;


    public function mount(Address $address)
    {
        $this->address = $address;
    }

    public function render()
    {
        $images = Address::find($this->address->id)->images()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.admin.address.address-images', compact('images'));
    }


    public function limpiar_page(){
        $this->reset('page');
    }
}
