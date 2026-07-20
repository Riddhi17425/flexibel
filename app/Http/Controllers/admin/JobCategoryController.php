<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
  
    public function index()
    {
        $data = JobCategory::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.jobcategory.jobcategorylisting', compact('data'));
    }

        public function create()
    { 
        return view('admin.jobcategory.addjobcategory');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please enter the jobcategory name.',
        ]);

        $post = new JobCategory;
        $post->name = $request->get('name');
        $post->description = $request->get('description');
        $post->save();

        return redirect('/admin/jobcategory')->with('success', 'jobcategory Added Successfully');
    }

    public function edit($id)
    {
        $data = JobCategory::find($id);
        return view('admin.jobcategory.editjobcategory', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = JobCategory::find($id);
        $post->name = $request->get('name');
        $post->description = $request->get('description');
        $post->save();
        return redirect('/admin/jobcategory')->with('success', 'jobcategory Updated Successfully');
    }

    public function destroy($id)
    {
        $data = JobCategory::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your jobcategory Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'jobcategory not found!');
    }

   }