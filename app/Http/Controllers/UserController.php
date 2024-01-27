<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // profile page
    public function showAdminProfile(){
        return view('backend.profile');
    }

    // update admin profile
    public function updateAdminProfile(Request $request){
        $new_password = null;
        $validate = validator($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate);
        }
        if($request->npassword){
            if(Hash::check($request->cpassword, Auth::user()->password)){
                if($request->npassword == $request->cnpassword){
                    $new_password = Hash::make($request->npassword);
                }else{
                    return back()->withErrors('Password does not match');
                }
            }else{
                return back()->withErrors("Current Password doesn't match");
            }

        }
        $admin = User::find(Auth::user()->id);
        if($admin){
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $new_password,
            ]);
            return redirect()->back()->with('val', 'Success!'); // key --> value
        }else{
            return view('errors.404Page');
        }
    }
}
