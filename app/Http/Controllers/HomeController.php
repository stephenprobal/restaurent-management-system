<?php

namespace App\Http\Controllers;
use Auth;
use Mail;
use App\User;
use App\Mail\NewsLetter;
use App\Newsleetter;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'users' => User::latest()->simplePaginate(10),
            'total_users' => User::count()
        ]);
    }
    public function sendnewsletter ()
    {
        // $name=User::pluck('name') 
        
        foreach (User::pluck('email') as $email) {
            Mail::to($email)->send(new NewsLetter(User::where('email', $email)->first(
            //     [
            //     'newsleetters'=>$request->all()
            //    'newsleetters'=>Newsleetter::all()
            // ]
        )));
        }
        return back();
    }
//     function sendnewsletter()
//     {
//      echo User::pluck('email');
//      foreach (User::pluck('email') as $email) {
//          // echo $email;
//          Mail::to($email)->queue(new NewsLetter());
//      }
//      return back()->with('good_status','mail send!');
//      // $email=User::find(24)->email;
//      //  Mail::to($email)->send(new NewsLetter());
//      //  echo "send";
//  }









        public function markeddelete(Request $request)
    {
    
        foreach ($request->user_id as $user_id) {
            User::find($user_id)->delete();
        }
        return back()->with('delete_status', ' deleted successfully');
    }
}
