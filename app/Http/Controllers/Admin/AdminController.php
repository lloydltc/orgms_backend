<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\IsTable;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminController extends Controller
{
   
    //
    public function index() {
        return view("admin.index");
    }
    public function deleteMember(String $id) {
        $member = User::find($id);
        if ($member) {
            $member->delete();
        }

    }
    public function viewMemberContributions(String $id) {

        return view("admin.member-contribution",compact("id"));
    }
}
