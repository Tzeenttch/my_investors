<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Boolean;

class UserController extends Controller
{
    
    
    public function create()
    {
        return view('user.signUp', ['title' => 'Sign Up']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //Validate the request
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        // dd($validated);


        User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('user.login')->with('Success', 'User created');
    }

    //Show the login form
    public function login(){
        return view('user.login', ['title' => 'Sign In']);
    }


    //Make the login in the application 
    public function authenticate(Request $request): RedirectResponse{

        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

         $remember = $request->has('remember') ? true : false; 
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('incomes.index'));
        }

        return back()->withErrors([
            'Login' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    //Log out
    public function logout(Request $request):RedirectResponse{
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

}
