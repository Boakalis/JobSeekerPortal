<?php

namespace App\Http\Controllers;

use App\Jobs\RegisterMail;
use App\Models\Location;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations  = Location::get();
        return view('web.register',compact('locations'));
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

        $this->validate($request,[
            'name'=>'required|min:3|max:255',
            "email"=> 'required|email|unique:users',
            "phone"=> 'required|digits_between:10,12|integer',
            "exp"=> 'required|integer',
            "location"=> 'required|integer',
            "notice_period"=> 'required|integer',
            "skills"=> 'required|max:255',
            "password"=> 'required|min:6',
            "cpassword"=> 'required|same:password',
            'resume'=>'required|file',
            'photo'=>'required|image|max:2048'
        ],[
            'phone.digits_between'=>'Please enter valid mobile number',
            'phone.integer'=>'Please enter valid mobile number',
            'phone.required'=>'Mobile number is required',
            'exp.integer'=>'Please enter valid experience',
            'exp.required'=>'Experience is required',
            'cpassword.required'=>'Confirm Password is required',
            'cpassword.same'=>'Password and Confirm Password mismatch'
        ]);
        $data =[
            'name' =>$request->name,
            'exp' =>$request->exp,
            'notice_period' =>$request->notice_period,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'skills' =>$request->skills,
            'location_id' =>$request->location,
            'password'=>Hash::make($request->password)
        ];
        if($request->has('photo')){
            $path = $request->file('photo')->store('photo');
            $data['photo'] = $path;
        }
        if($request->has('photo')){
            $path = $request->file('photo')->store('photo');
            $data['photo'] = $path;
        }

        $userData = User::create($data);
        /* Required Code for Mail and Job Queue was written in code.Kindly Please check */
        // RegisterMail::dispatch($userData);
        if($request->has('resume')){
            $path = $request->file('resume')->store('resume');
            Resume::create([
                'user_id'=>$userData->id,
                'resume'=>$path
            ]);
        }

        Auth::login($userData);
        return redirect()->route('home');
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
}
