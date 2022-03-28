<?php

namespace App\Http\Livewire\Admin\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyAddresses extends Component
{

    use WithPagination;
    public $search;
    public $company;


    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function render()
    {
        $addresses = Company::find($this->company->id)->addresses()->where('address', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.admin.company.company-addresses', compact('addresses'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }

}
