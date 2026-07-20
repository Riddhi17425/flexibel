<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductSubCategoryController extends Controller
{
    public function index()
    {
        $data = ProductSubCategory::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.product-subcategory.subcategorylisting', compact('data'));
    }

        public function create()
    { 
        $categories = ProductCategory::wherenull('deleted_at')->get();
        return view('admin.product-subcategory.addsubcategory',compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:product_subcategory,name,',
        ], [
            'name.required' => 'Please enter the Category name.',
        ]);

        $post = new ProductSubCategory;
        $post->category_id = $request->get('category_id');
        $post->name = $request->get('name');
        $post->short_description = $request->get('short_description');
        $post->long_description = $request->get('long_description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('product_subcategory/image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect('/admin/product-subcategory')->with('success', 'Sub Category Added Successfully');
    }

    public function edit($id)
    {
        $data = ProductSubCategory::find($id);
        $categories = ProductCategory::wherenull('deleted_at')->get();
        return view('admin.product-subcategory.editsubcategory', compact('data','categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please enter the Category name.',
        ]);

        $post = ProductSubCategory::find($id);
        $post->category_id = $request->get('category_id');
        $post->name = $request->get('name');
        $post->short_description = $request->get('short_description');
        $post->long_description = $request->get('long_description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('product_subcategory/image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        
        return redirect('/admin/product-subcategory')->with('success', 'Sub Category Updated Successfully');
    }

    public function destroy($id)
    {
        $data = ProductSubCategory::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Sub Category Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Sub Category not found!');
    }
}
