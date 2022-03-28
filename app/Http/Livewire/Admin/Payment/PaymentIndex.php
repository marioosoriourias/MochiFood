<?php

namespace App\Http\Livewire\Admin\Payment;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $payments = Payment::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(8);
        return view('livewire.admin.payment.payment-index', compact('payments'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
