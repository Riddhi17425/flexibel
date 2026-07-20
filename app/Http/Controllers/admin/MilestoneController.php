<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Milestone::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.milestone.milestonelisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.milestone.addmilestone');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        // Validation rules...
        $validatedData = $request->validate([
            'year' => 'required',
            
        ], [
            'year.required' => 'Please enter the milestone name.',
           
        ]);

        // Create a new milestone instance
        $post = new milestone;

        $post->title = $request->get('title');
        $post->year = $request->get('year');
        $post->description = $request->get('description');
        $post->alt_tag = $request->get('alt_tag');
        
        // Handle detail image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/milestone_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();

        // Redirect with success message
        return redirect('/admin/milestone')->with('success', 'milestone Added Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Milestone::find($id);
        return view('admin.milestone.editmilestone', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation rules
       
        $post = Milestone::find($id);
        $post->title = $request->get('title');
        $post->year = $request->get('year');
        $post->description = $request->get('description');
        $post->alt_tag = $request->get('alt_tag');

        
        // Handle detail image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/milestone_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/milestone')->with('success', 'milestone Updated Successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Milestone::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Milestone Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Milestone not found!');
    }
}