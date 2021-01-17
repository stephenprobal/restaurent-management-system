<?php

namespace App\Http\Controllers;

use Image;
use App\Banner;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;





class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.banner.index',[
        'banners'=>Banner::all(),
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
            'banner_name'=>'required',
            'banner_short_description'=>'required',
              ]);

        $slug_link= Str::slug($request->banner_name."-".Str::random(5));
        $banner_id=Banner::insertGetId($request->except('_token','banner_photo')+[
            'slug'=>$slug_link,
          'created_at'=>Carbon::now()
        ]);

        if ($request->hasFile('banner_photo')) {
            //upload photo of category start
        $uploaded_photo=$request->file('banner_photo');
        $new_photo_name=$banner_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_photo_location='public/uploads/banner_photos/'.$new_photo_name;
        Image::make($uploaded_photo)->resize(1423,622)->save(base_path($new_photo_location));
        Banner::find($banner_id)->update([
        'banner_photo'=>$new_photo_name]);
        //upload photo of banner end
    }
    return back()->with('banner_status', 'Banner added successfully');
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
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',[
        'banner_info'=>$banner
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
    public function update(Request $request, Banner $banner)
    {

        $banner->update($request->except('_token','_method'));
        return redirect('banner')->with('banner_status','Your banner edited successfully!');
        //   return back()->with('product_status','Your product edited successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back();
    }
}
