<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Hash;
use Auth;
use Carbon\Carbon;

class GithubController extends Controller
{
//   public function redirectToProvider($website)
// {
//     return Socialite::driver($website)->redirect();
// }

// public function handleProviderCallback($website)
// {
//     $user = Socialite::driver($website)->user();

//       if (!User::where('email',$user->getEmail())->exists()) {
//       User::insert([
//         'name'=>$user->getNickname(),
//           'email'=>$user->getEmail(),
//           'password'=>Hash::make('ds123'),
//           'created_at'=>Carbon::now()
//         ]);
//          // code...
//       }
//     if (Auth::attempt(['email'=>$user->getEmail(),'password'=>'ds123'])) {
//       return redirect('/home');
//     }
}

















}
