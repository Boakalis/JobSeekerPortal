<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public function loginAttempt(Request $request)
    {
        $this->validate($request,[
            "email"=> 'required|email',
            "password"=> 'required|min:6',
        ]);

        if(Admin::where('email',$request->email)->exists()){
            $credentials = [
                'email' => $request['email'],
                'password' => $request['password'],
            ];

            if(Auth::guard('admin')->attempt($credentials)){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->with('error','Invalid Credentials');
            }
        }else{
            return redirect()->back()->with('error','Authorization Restricted');
        }

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.index');
    }

    public function getResume($id)
    {
        $path = Resume::where('user_id', $id)->first()->resume;
        return Storage::download($path);
    }


}
