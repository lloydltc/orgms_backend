<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    //
    public function index(){
        return view("member.finance");

    }
    public function create(){
        return view("member.create-contribution");
    }

    public function store(Request $request){
        $request->validate(
            [
                'amount' => ['required', 'numeric'],
                'description' => ['required', 'min:3'],
            ]
        );
        $contribute = Contribution::create([
            'amount'=> request('amount'),
            'description'=> request('description'),
            'user_id'=> Auth::user()->id,
            'status'=> Contribution::CONTRIBUTION_STATUS_PENDING,
        ]);

        if($contribute){
            return redirect()->route('dashboard')->with('success', 'Submitted Successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed!');
        }
    }
public function edit(String $id){
    $contribution = Contribution::findOrFail($id);
    return view('member.edit-contribution', compact('contribution'));
}
public function update(Request $request, String $id){
    $request->validate([
        'amount'=> ['required','numeric'],
        'description'=> ['required','min:3'],
    ]);

    $contribute = Contribution::findOrFail($id);

    $contribute->update([
        'amount'=> request('amount'),
        'description'=> request('description'),
    ]) ;
    if($contribute){
        return redirect()->route('dashboard')->with('success', 'Submitted Successfully!');
    }else{
        return redirect()->back()->with('error', 'Failed!');
    }
}
public function cancel(String $id){
    $contribute = Contribution::findOrFail($id);
    $contribute->update(
        [
            'status' => Contribution::CONTRIBUTION_STATUS_CANCELLED,
        ]
    );
    if($contribute){
        return redirect()->route('dashboard')->with('success', 'Submitted Successfully!');
    }else{
        return redirect()->back()->with('error', 'Failed!');
    }
}

}
