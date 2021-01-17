<?php

namespace App\Http\Controllers;


use App\Newsleetter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsleetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.newsleetter.index',[
            'newsleetters'=>Newsleetter::all(),
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
            'newsleetter_name'=>'required',
            'newsleetter_long_description'=>'required',
            ]);
        $newsleetter_id=Newsleetter::insertGetId($request->except('_token')+[
          'created_at'=>Carbon::now()
        ]);
        Newsleetter::find($newsleetter_id)->update();
        return back()->with('newsleetter_status', 'Newsleetter added successfully');
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
    public function edit(Newsleetter $newsleetter)
    {
        return view('admin.newsleetter.edit',[
            'newsleetter_info'=>$newsleetter
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
    public function update(Request $request, Newsleetter $newsleetter)
    {
        $newsleetter->update($request->except('_token','_method'));
        return redirect('newsleetter')->with('newsleetter_status','Your newsleetter edited successfully!');
        //   return back()->with('product_status','Your product edited successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsleetter $newsleetter)
    {
        $newsleetter->delete();
        return back();
    }
}
