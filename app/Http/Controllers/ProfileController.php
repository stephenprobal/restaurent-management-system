<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Image;
use App\Mail\ChangePasswordMail;
use Mail;



class ProfileController extends Controller
{
    function profile()
    {
        return view('admin\profile\index');
    }
    function editprofilepost(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        User::find(Auth::id())->update([
            'name' => $request->name,
        ]);
        return back()->with('name_change_status', 'Your name has been chaged successfully');
    }
    function editpasswordpost(Request $request)
    {
        $request->validate([
            'password' => 'confirmed'
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            if ($request->old_password == $request->password) {
                return back()->with('password_error', 'Your have inserted your previous password');
            } else {
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->password)
                ]);
                //send a password notification mail
                Mail::to(Auth::user()->email)->send(new ChangePasswordMail(Auth::user()->name));
                //send a password notification mail
            }
        } else {

            return back()->with('password_error', 'Your password does not match');
        }
        return back()->with('password_changed', 'Your password has been changed');
    }

    function changeprofilephoto (Request $request)
    {
        if ($request->hasFile('profile_photo')) {
            $request->validate([
                'profile_photo'=>'required|image'
            ]);
            if (Auth::user()->profile_photo!='default.png') {
                $old_photo_location='public/uploads/profile_photo/'.Auth::user()->profile_photo;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo=$request->file('profile_photo');
            $new_photo_name = Auth::id().".".$uploaded_photo->getClientOriginalExtension();
            $new_photo_location='public/uploads/profile_photo/'.$new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location),40);
            User::find(Auth::id())->update([
                'profile_photo'=>$new_photo_name
            ]);
            return back()->with('profile_photo_change_status', 'Your profile photo has been chaged successfully');
        }
        else {
            return back()->with('error_status', 'Please provide a profile photo');
        }
    }
}
