<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;

class CategoryController extends Controller
{
    public function addcategory()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
            'deleted_categories' => Category::onlyTrashed()->get()
        ]);
    }

    public function addcategorypost(CategoryForm $request)
    {   $slug_link= Str::slug($request->category_name."-".Str::random(5));
        $category_id=Category::insertGetId([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'user_id' => Auth::id(),
            'slug'=>$slug_link,
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('category_photo')) {
        $request->validate([
            'category_photo'=>'required|image'
        ]);

        $uploaded_photo=$request->file('category_photo');
        $new_photo_name = $category_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_photo_location='public/uploads/category_photos/'.$new_photo_name;
        Image::make($uploaded_photo)->save(base_path($new_photo_location),40);
        Category::find($category_id)->update([
            'category_photo'=>$new_photo_name
        ]);
  return back()->with('success_status', 'Category added successfully');
    }
    else {
        return back()->with('error_status', 'Please provide a category photo');
    }
    }
    public function deletecategory($category_id)
    {
        Category::find($category_id)->delete();
        return back()->with('delete_status', 'Category deleted successfully');
    }
    //if need to delete product as with as category
//     function deletecategory($category_id){
//     //category delete
//     Category::find($category_id)->delete();
// // product delete
//     Product::where('category_id',$category_id)->delete();

//     return back()->with('delete_status','Your category deleted successfully!');
//     }
    public function editcategory($category_id)
    {
        return view('admin\category\edit', [
            'category_info' => Category::find($category_id)
        ]);
    }
    public function editcategorypost(Request $request)
    {
            // $request->validate([
            // 'category_name'=>'unique:categories,category_name',$request->category_id,'required',
            // 'category_description'=>'unique:categories,category_description',$request->category_id,'required',
            // ]);
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description
        ]);
        if($request->hasFile('category_photo')) {
            if(Category::find($request->category_id)->category_photo != 'default.png') {
              $old_photo_location='public/uploads/category_photos/' . Category::find($request->category_id)->category_photo;
              unlink(base_path($old_photo_location));
            }
            $uploaded_photo=$request->file('category_photo');
            $new_photo_name=$request->category_id.".".$uploaded_photo->getClientOriginalExtension();
            $new_photo_location='public/uploads/category_photos/'.$new_photo_name;
            Image::make($uploaded_photo)->resize(150,150)->save(base_path($new_photo_location),40);
            Category::find($request->category_id)->update([
            'category_photo'=>$new_photo_name]);
            }
        return redirect('add/category')->with('edit_status', 'Category edited successfully');
    }
    public function restorecategory($category_id)
    {
        Category::withTrashed()->find($category_id)->restore();
        return back()->with('restore_status', 'Category restored successfully');
    }
    public function forcedeletecategory($category_id)
    {
        Category::withTrashed()->find($category_id)->forceDelete();
        return back()->with('forcedelete_status', 'Category force deleted successfully');
    }
    public function markdelete(Request $request)
    {
        foreach ($request->category_id as $cat_id) {
            Category::find($cat_id)->delete();
        }
        return back()->with('delete_status', 'Category deleted successfully');
    }
}
