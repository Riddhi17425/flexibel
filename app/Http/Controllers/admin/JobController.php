<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $data = Job::orderBy('created_at', 'desc')->wherenull('deleted_at')->paginate(15);
        return view('admin.job.joblisting', compact('data'));
    }

    public function create()
    {   
        $jobcategories = JobCategory::wherenull('deleted_at')->get();
        return view('admin.job.addjob', compact('jobcategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please Enter the job name.',
        ]);

        $post = new Job;
        $post->jobcategory_id = $request->get('jobcategory_id');
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->details = $request->get('details');
        $post->description = $request->get('description');
        $post->url = $request->get('url'); 
        $post->meta_title = $request->get('meta_title'); 
        $post->meta_description = $request->get('meta_description'); 
        $post->save();

        return redirect('/admin/job')->with('success', 'job Added Successfully');
    }

    public function edit($id)
    {
        $data = Job::find($id);
        $jobcategories = JobCategory::wherenull('deleted_at')->get();
        return view('admin.job.editjob', compact('data','jobcategories'));
    }

    public function update(Request $request, $id)
    {
        $post = Job::find($id);
        $post->jobcategory_id = $request->get('jobcategory_id');
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->details = $request->get('details');
        $post->description = $request->get('description');
        $post->url = $request->get('url');
        $post->meta_title = $request->get('meta_title'); 
        $post->meta_description = $request->get('meta_description'); 

        $post->save();
        return redirect('/admin/job')->with('success', 'job Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Job::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Job Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Job not found!');
    }
}