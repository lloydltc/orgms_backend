<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function login(Request $request): View | RedirectResponse
    {
        switch ($request->method()) {
            case 'GET':
                return view('auth.login');
            case 'POST':
                $request->validate(
                    [
                        'email' => ['required', 'email'],
                        'password' => ['required','min:6','max:25']
                    ]
                );

                $user = User::where('email', $request['email'])->first();
                if (is_object($user) && Hash::check($request['password'], $user->password)) {
                   
                        Auth::login($user);
                        if($user->type == User::ROLE_MEMBER){
                            return redirect()->route('dashboard');
                        }else{
                            return redirect()->route('admin.dashboard');
                        }

                }

                return back()->with('error', 'Wrong credentials. Please check your email or password');
            default:
                return redirect('/');
        }
    }





    public function register(Request $request): View | RedirectResponse
    {
        switch ($request->method()) {
            case 'GET':
                return view('auth.registration');
            case 'POST':
                $request->validate(
                    [
                        'first_name' => ['required','min:3','max:25'],
                        'last_name' => ['required','min:3','max:25'],
                        'email' => ['required', 'email', 'unique:users,email'],
                        'password' => ['required','min:6','max:25'],
                        'phone' => ['nullable'],
                     
                    ]
                );

                $user = User::create([
                    'first_name' => request('first_name'),
                    'last_name' => request('last_name'),
                    'email' => request('email'),
                    'password' => Hash::make(request('password')),
                    'phone' => request('phone'),
                    'role' => User::ROLE_MEMBER,
            
                ]);



                if (is_object($user) && Hash::check(request('password'), $user->password)) {
                    Auth::login($user);

                    return redirect()->route('dashboard');
                }
                return back()->with('error', 'Wrong credentials.');
            default:
                return redirect('/');
        }
    }

    public function forgot(Request $request): View | RedirectResponse
    {
        switch ($request->method()) {
            case 'GET':
                return view('auth.forgot');
            case 'POST':
                $request->validate(
                    [
                        'email' => ['required', 'email', 'exists:users,email']
                    ],
                    [
                        'email.exists' => 'Account not found'
                    ]
                );

                $user = User::where('email', $request['email'])->first();



                if (is_object($user) ) {
                    $password = Str::random(8);
                    $user->password = Hash::make($password);
                    $user->save();
                    Mail::to(request('email'))->send(new ForgotPassword($user, $password));
                    return redirect()->route('reset');
                }
                return back()->with('error', 'Wrong credentials.');
            default:
                return redirect('/');
        }
    }



    public function reset(Request $request): View | RedirectResponse
    {
        switch ($request->method()) {
            case 'GET':
                return view('auth.reset');
            case 'POST':
                $request->validate(
                    [
                        'email' => ['required', 'email', 'exists:users,email'],
                        'old_password' => ['required', 'string'],
                        'new_password' => ['required', 'string'],
                    ],
                    [
                        'email.exists' => 'Account not found'
                    ]
                );

                $user = User::where('email', $request['email'])->first();

                if (Hash::check($request['old_password'], $user->password)) {
                    Auth::login($user);
                    $user->password = Hash::make($request['new_password']);
                    $user->save();
                    return redirect()->route('dashboard');
                }
                return back()->with('error', 'Wrong credentials. Please check your email or password');
            default:
                return redirect('/');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->flush();
        $request->session()->regenerate();
        Auth::logout();
        return redirect()->route('login');
    }
}
