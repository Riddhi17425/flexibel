<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{

   public function index()
    {
        $data = ProductCategory::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.product-category.categorylisting', compact('data'));
    }

        public function create()
    { 
        return view('admin.product-category.addcategory');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ], [
            'name.required' => 'Please enter the Category name.',
            'url.required' => 'Please enter the Category url.',
            'meta_title.required' => 'Please enter the meta title.',
            'meta_description.required' => 'Please enter the meta description.',
        ]);

        $post = new ProductCategory;
        $post->name = $request->get('name');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        $post->save();

        return redirect('/admin/product-category')->with('success', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $data = ProductCategory::find($id);
        return view('admin.product-category.editcategory', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = ProductCategory::find($id);
        $post->name = $request->get('name');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');

        $post->save();
        return redirect('/admin/product-category')->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $data = ProductCategory::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Category Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Category not found!');
    }
}
