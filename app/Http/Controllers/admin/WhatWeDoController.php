<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WhatWeDo;
class WhatWeDoController extends Controller
{
    public function index()
    {
        $data = WhatWeDo::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.what_we_do.listing', compact('data'));
    }

    public function create()
    {
        return view('admin.what_we_do.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ], [
            'title.required' => 'Please enter the title name.',

        ]);
    
        // Create a new WhatWeDo instance
        $post = new WhatWeDo();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->desktop_alt_tag = $request->input('desktop_alt_tag');
        $post->mobile_alt_tag = $request->input('mobile_alt_tag');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/WhatWeDo/desktop');
            $file->move($path, $filename);
            $post->image = $filename;
        }
        if ($request->hasFile('mobile_image')) {
            $file = $request->file('mobile_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/WhatWeDo/mobile');
            $file->move($path, $filename);
            $post->mobile_image = $filename;
        }
    
        $post->save();
    
        return redirect('/admin/what-we-do')->with('success', 'WhatWeDo added successfully.');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = WhatWeDo::find($id);
        return view('admin.what_we_do.edit', compact('data'));
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
        // Optionally add validation here
        // $request->validate([...]);
    
        $post = WhatWeDo::findOrFail($id);
    
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->desktop_alt_tag = $request->input('desktop_alt_tag');
        $post->mobile_alt_tag = $request->input('mobile_alt_tag');
    
        // Desktop image handling
        if ($request->hasFile('image')) {
            if ($post->image && file_exists(public_path('WhatWeDo/desktop/' . $post->image))) {
                unlink(public_path('WhatWeDo/desktop/' . $post->image));
            }
    
            $desktopImageName = time() . '_desktop.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('WhatWeDo/desktop'), $desktopImageName);
            $post->image = $desktopImageName;
        }
    
        // Mobile image handling
        if ($request->hasFile('mobile_image')) {
            if ($post->mobile_image && file_exists(public_path('WhatWeDo/mobile/' . $post->mobile_image))) {
                unlink(public_path('WhatWeDo/mobile/' . $post->mobile_image));
            }
    
            $mobileImageName = time() . '_mobile.' . $request->file('mobile_image')->getClientOriginalExtension();
            $request->file('mobile_image')->move(public_path('WhatWeDo/mobile/'), $mobileImageName);
            $post->mobile_image = $mobileImageName;
        }
    
        $post->save();
    
        return redirect('/admin/what-we-do')->with('success', 'WhatWeDo Updated Successfully');
    }
    



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = WhatWeDo::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your WhatWeDo Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'WhatWeDo not found!');
    }
}
