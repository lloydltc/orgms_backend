<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    //
    public function index(): View
    {
//
        $user = User::where('email', Auth::user()->email)->first();
        return view('member.profile', compact('user'));
    }

    public function  changePassword(Request $request): RedirectResponse
    {
        $request->validate(
            [

                'old_password' => ['required', 'string'],
                'password' => ['required', 'string','confirmed'],
            ],

        );
//        dd('ds');
        $user = User::where('email', Auth::user()->email)->first();

        if (Hash::check($request['old_password'], $user->password)) {
//            Auth::login($user);

            $user->password = Hash::make($request['password']);
            $user->save();
            return redirect()->route('profile')->with(['success' => 'Password Changed']);
        }
        return back()->with('error', 'Wrong credentials.');
    }

    public function updateUserDetails(Request $request){
        $request->validate(
            [
                'first_name' => ['required','min:3','max:25'],
                'last_name' => ['required','min:3','max:25'],
                'email' => ['required', 'email', 'unique:users,email,'. Auth::user()->id],
                'phone' => ['nullable'],
              

            ]
        );
        $user = User::where('id', Auth::user()->id)->first();
        $user->update([
            'first_name' => request('first_name'),
            'last_name'=>request('last_name'),
            'email' => request('email'),
            'phone' => request('phone'),
           
        ]);

        return back()->with(['success' => 'User Updated']);
    }
}
