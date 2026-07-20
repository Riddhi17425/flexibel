<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Industry::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.industry.industrylisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.industry.addindustry');
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
            'industry_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'industry_name.required' => 'Please enter the industry name.',
 
        ]);

        // Create a new industry instance
        $post = new Industry;

        $post->industry_name = $request->get('industry_name');
        $post->description = $request->get('description');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->alt_tag = $request->get('alt_tag');
        
        // Handle detail image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industry_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        // dd($post);
        $post->save();

        // Redirect with success message
        return redirect('/admin/industry')->with('success', 'industry Added Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Industry::find($id);
        return view('admin.industry.editindustry', compact('data'));
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
       
        $post = Industry::find($id);
        $post->industry_name = $request->get('industry_name');
        $post->description = $request->get('description');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->alt_tag = $request->get('alt_tag');

        
        // Handle detail image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/industry_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/industry')->with('success', 'industry Updated Successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Industry::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your industry Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'industry not found!');
    }
}