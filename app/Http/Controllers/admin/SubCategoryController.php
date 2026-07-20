<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DatasheetCategory;
use App\Models\DatasheetSubCategory;

class SubCategoryController extends Controller
{
   
    public function index()
    {
        $subcategories = DatasheetSubCategory::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.datasheet-subcategory.subcategorylisting', compact('subcategories'));
    }

    public function create()
    {
        $categories = DatasheetCategory::whereNull('deleted_at')->get();
        return view('admin.datasheet-subcategory.addsubcategory',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|string'
        ]);

        $data = [
            'title' => $request->input('subcategory_name'),
            'category_id' => $request->input('category_id'),
            'image' => $request->input('image'),
            'alt_tag'=> $request->input('alt_tag'),
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '_image.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('datasheets'), $imageName);
            $data['image'] = $imageName;
        }

        DatasheetSubCategory::create($data);

        return redirect('/admin/datasheet-subcategory')->with('success', 'SubCategory created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required|string',
        ]);
        $subcategory = DatasheetSubCategory::findOrFail($id);
        $data = [
            'title' => $request->input('subcategory_name'),
            'category_id' => $request->input('category_id'),
            'alt_tag'=> $request->input('alt_tag'),
        ];
        if ($request->hasFile('image')) {
            // Optional: delete the old image
            if ($subcategory->image && file_exists(public_path('subcategories/' . $subcategory->image))) {
                unlink(public_path('datasheets/' . $subcategory->image));
            }
            $imageName = time() . '_image.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('datasheets'), $imageName);
            $data['image'] = $imageName;
        }
        $subcategory->update($data);
        return redirect('/admin/datasheet-subcategory')->with('success', 'SubCategory updated successfully.');
    }    

    public function edit($id)
    {
        $data = DatasheetSubCategory::find($id);
        $categories = DatasheetCategory::whereNull('deleted_at')->get();
        return view('admin.datasheet-subcategory.editsubcategory', compact('data','categories'));
    }

    public function destroy($id)
    {
        $data = DatasheetSubCategory::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Subcategory Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Subcategory not found!');
    }
}
