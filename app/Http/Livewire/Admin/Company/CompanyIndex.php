<?php

namespace App\Http\Livewire\Admin\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $companies = Company::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(8);
        return view('livewire.admin.company.company-index', compact('companies'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
