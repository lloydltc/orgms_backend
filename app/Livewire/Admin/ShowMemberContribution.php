<?php

namespace App\Livewire\Admin;

use App\Http\Traits\IsTable;
use App\Models\Contribution;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMemberContribution extends Component
{
    use WithPagination,IsTable;
        public $member_id;
    public function mount( $id){

        $this->member_id = $id;

    }
    public function render()
    {
        return view('livewire.admin.show-member-contribution',['contributions'=>Contribution::where('user_id',$this->member_id)->whereLike(['status','description', 'amount'],$this->search )
        ->paginate($this->paginationCount)
        ]);
    }
}
