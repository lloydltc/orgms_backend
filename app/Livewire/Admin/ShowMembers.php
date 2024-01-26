<?php

namespace App\Livewire\Admin;

use App\Http\Traits\IsTable;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMembers extends Component
{
    use WithPagination, IsTable;
    public function render()
    {
        return view('livewire.admin.show-members',['members'=>User::where('role', User::ROLE_MEMBER)->whereLike(['first_name','last_name', 'email'],$this->search )
        ->paginate($this->paginationCount)
        ]);
    }
}
