<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function profile()
    {
        $locations = Location::get();
        return view('web.profile', compact('locations'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            "phone" => 'required|digits_between:10,12|integer',
            "exp" => 'required|integer',
            "location" => 'required|integer',
            "notice_period" => 'required|integer',
            "skills" => 'required|max:255',
        ], [
            'phone.digits_between' => 'Please enter valid mobile number',
            'phone.integer' => 'Please enter valid mobile number',
            'phone.required' => 'Mobile number is required',
            'exp.integer' => 'Please enter valid experience',
            'exp.required' => 'Experience is required',
        ]);
        $data = [];
        if ($request->has('photo')) {
            $this->validate($request, [
                'photo' => 'image|max:2048'
            ]);
            Storage::delete(Auth::user()->photo);
            $path = $request->file('photo')->store('photo');
            $data['photo'] = $path;
        }


        if ($request->has('resume')) {
            $this->validate($request, [
                'resume' => 'file',
            ]);
            Storage::delete(Resume::where('user_id', Auth::user()->id)->first()->resume);
            $path = $request->file('resume')->store('resume');
            Resume::where('user_id', Auth::user()->id)->update([
                'resume' => $path
            ]);
        }

        $data['name'] =  $request->name;
        $data['exp'] =  $request->exp;
        $data['notice_period'] =  $request->notice_period;
        $data['phone'] =  $request->phone;
        $data['skills'] =  $request->skills;
        $data['location_id'] =  $request->location;

        User::where('id',Auth::user()->id)->update($data);
        return redirect()->route('profile');
    }

    public function getResume()
    {
        $path = Resume::where('user_id', Auth::user()->id)->first()->resume;
        return Storage::download($path);
    }

    public function changePassword(Request $request){

        $this->validate($request,[
            'oldpassword'=>"required|min:6",
            "password"=> 'required|min:6',
            "cpassword"=> 'required|same:password',

        ],[
            'cpassword.required'=>'Confirm Password is required',
            'cpassword.same'=>'Password and Confirm Password mismatch'
        ]);

        if( Hash::check($request->oldpassword,Auth::user()->password)){
            User::where('id',Auth::user()->id)->update([
                'password' => bcrypt($request->password)
            ]);
        }else{
            throw ValidationException::withMessages(['oldpassword' => 'Old Password is not correct']);
        }

        return redirect()->route('profile')->with('success','Password updated successfully');
    }
}
