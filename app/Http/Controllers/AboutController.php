<?php

namespace App\Http\Controllers;

use Image;
use App\About;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;




class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.about.index',[
        'abouts'=>About::all(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'about_name'=>'required',
            'about_long_description'=>'required',
              ]);

        $slug_link= Str::slug($request->about_name."-".Str::random(5));
        $about_id=About::insertGetId($request->except('_token','about_photo')+[
            'slug'=>$slug_link,
          'created_at'=>Carbon::now()
        ]);

        if ($request->hasFile('about_photo')) {
            //upload photo of category start
        $uploaded_photo=$request->file('about_photo');
        $new_photo_name=$about_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_photo_location='public/uploads/about_photos/'.$new_photo_name;
        Image::make($uploaded_photo)->resize(1423,622)->save(base_path($new_photo_location));
        About::find($about_id)->update([
        'about_photo'=>$new_photo_name]);
        //upload photo of banner end
    }
    return back()->with('about_status', 'About added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit',[
        'about_info'=>$about
    ]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {

        $about->update($request->except('_token','_method'));
        return redirect('about')->with('about_status','Your about edited successfully!');
        //   return back()->with('product_status','Your product edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();
        return back();
    }
}
