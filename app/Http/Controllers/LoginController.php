<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web.login');
    }


    /**
     * Try to Auth Attempt by given credentials.
     */
    public function loginAttempt(Request $request)
    {
        $this->validate($request,[
            "email"=> 'required|email',
            "password"=> 'required|min:6',
        ]);

        if(User::where('email',$request->email)->exists()){
            $credentials = [
                'email' => $request['email'],
                'password' => $request['password'],
            ];

            if(Auth::attempt($credentials)){
                return redirect()->route('home');
            }else{
                return redirect()->back()->with('error','Invalid Credentials');
            }
        }else{
            throw ValidationException::withMessages(['email' => 'User Does not exist']);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.index');
    }
}
