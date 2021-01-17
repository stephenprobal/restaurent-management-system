<?php

namespace App\Http\Controllers;

use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
        function contactview()
    {
        return view('admin\contact\index',[
            'contacts'=>Contact::all()
        ]);
    }
       public function deletecontact($contact_id)
    {
        Contact::find($contact_id)->delete();
        return back()->with('delete_status', 'Contact deleted successfully');
    }
    public function contactuploaddownload ($contact_id){
        return Storage::download(Contact::findOrFail($contact_id)->contact_attachement);
      }
}
