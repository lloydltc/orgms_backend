<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    //
    public function index() {
        
        return view("admin.finance");
    }
    public function decline(String $id) {
        $contribution = Contribution::findOrFail($id);
        $contribution->update([
            "status"=> Contribution::CONTRIBUTION_STATUS_DECLINED,
        ]); 

        return redirect()->route("admin.finance")->with("success","Declined");


    }
    public function approve(String $id) {
        $contribution = Contribution::findOrFail($id);
        $contribution->update([
            "status"=> Contribution::CONTRIBUTION_STATUS_APPROVED,
        ]);

        return redirect()->route("admin.finance")->with("success","Approved");

    }
}
