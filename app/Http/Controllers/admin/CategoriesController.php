<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DatasheetCategory;

class CategoriesController extends Controller
{
   
    public function index()
    {
        $categories = DatasheetCategory::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.datasheet-category.categorylisting', compact('categories'));
    }

    public function create()
    {
        return view('admin.datasheet-category.addcategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'nullable|string',
        ]);
        DatasheetCategory::create([
            'title' => $request->input('category_name'),
        ]);
        return redirect('/admin/datasheet-category')->with('success', 'product Added Successfully');
    }

    public function edit($id)
    {
        $data = DatasheetCategory::find($id);
        return view('admin.datasheet-category.editcategory', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'nullable|string',
        ]);
        $category = DatasheetCategory::findOrFail($id);
        $category->update([
            'title' => $request->input('category_name'),
        ]);
        return redirect('/admin/datasheet-category')->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $data = DatasheetCategory::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Milestone Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Milestone not found!');
    }
}
