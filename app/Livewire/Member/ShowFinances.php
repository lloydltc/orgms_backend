<?php

namespace App\Livewire\Member;

use App\Http\Traits\IsTable;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowFinances extends Component
{
    use WithPagination, IsTable;
    public function render()
    {
        return view('livewire.member.show-finances',['contributions'=>Contribution::where('user_id',Auth::user()->id)->whereLike(['status','description', 'amount'],$this->search )
        ->paginate($this->paginationCount)
        ]);
    }
}
