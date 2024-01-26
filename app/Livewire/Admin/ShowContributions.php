<?php

namespace App\Livewire\Admin;

use App\Http\Traits\IsTable;
use App\Models\Contribution;
use Livewire\Component;
use Livewire\WithPagination;

class ShowContributions extends Component
{
    use WithPagination, IsTable;
    public function render()
    {
        return view('livewire.admin.show-contributions',['contributions'=>Contribution::whereLike(['status','description', 'amount'],$this->search )
        ->paginate($this->paginationCount)
        ]);
    }
}
