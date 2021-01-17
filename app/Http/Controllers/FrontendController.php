<?php

namespace App\Http\Controllers;

use App\About;
use App\Banner;
use App\Contact;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use Hash;


use App\User;
use App\Order_detail;
use Auth;
use App\Http\Controllers\QueryBuilder;



class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
          'active_categories'=>Category::all(),
          'active_products'=>Product::latest()->limit(12)->get(),
          'active_banners' => Banner::all(),
        ]);
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function aboutview()
    {
        return view('frontend.about',[
          'abouts'=>About::all(),
        ]);
    }
      function contactinsert(Request $request)
  {  
      $request->validate([
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_subject' => 'required',
            'contact_message' => 'required',

        ]);
    $contact_id = Contact::insertGetId($request->except('_token') + [
      'created_at' => Carbon::now()
      ]);
      if ($request->hasFile('contact_attachement')) {
        $uploaded_path=$request->file('contact_attachement')->store('contact_uploads');
     
      $path = $request->file('contact_attachement')->storeAs(
        'contact_uploads',
        $contact_id . "." . $request->file('contact_attachement')->getClientOriginalExtension()
      );
      Contact::find($contact_id)->update([
        'contact_attachement' => $path
      ]);
    }
    return back()->with('success_status', 'we received your message!');
  }
      public function bannerdetails ()
    {
        return view('frontend.about',[
          'abouts'=>About::all(),
        ]);
    }
  function productdetails($slug)
  {
    $product_info =Product::where('slug', $slug)->firstOrFail();
    $related_products = Product::where('category_id', $product_info->category_id)->where('id', '!=', $product_info->id)->limit(4)->get();

    return view('frontend.productdetails',[
      'product_info'=>$product_info,
      'related_products' => $related_products,
    ]);

  }
  public function shop(Request $request)
  {
    if($request->category_id != null){
      return view('frontend.shop', [
        'products' => Product::all(),
        'categories' => Category::all(),
        'category_id' => $request->category_id,
        //'category_contains' => Category::find($active_category_id)->where('active_category_id','id'),
      ]);
    }else{
      return view('frontend.shop', [
        'products' => Product::all(),
        'categories' => Category::all(),
        //'category_contains' => Category::find($active_category_id)->where('active_category_id','id'),
      ]);

    }
    
   
  }

  public function shopWithId($category_id){

  }


  // public function reviewpost(Request $request)
  // {
  //   print_r($request->all());
  //   Order_detail::find($request->order_details_id)->update([
  //     'stars' => $request->stars,
  //     'review' => $request->review
  //   ]);
  //   return back();
  // }
  // function search()
  // {
  //   $users = QueryBuilder::for(User::class)
  //     ->allowedFilters(['name', 'email'])
  //     ->get();
  // }
}
