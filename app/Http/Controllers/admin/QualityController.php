<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quality;

class QualityController extends Controller
{
    public function index()
    {
        $data = Quality::orderBy('created_at', 'desc')->wherenull('deleted_at')->paginate(15);
        return view('admin.quality.listing', compact('data'));
    }

    public function create()
    {
        return view('admin.quality.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stages' => 'required',
            'title' => 'required',
        ], [
            'stages.required' => 'Please enter the Quality Stage name.',
            'title.required' => 'Please enter the title.',
        ]);

        $post = new Quality;
        $post->text = $request->get('title');
        $post->stages = $request->get('stages');
        $post->alt_tag = $request->get('alt_tag');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/quality_stages');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect('/admin/quality')->with('success', 'Quality Stages Added Successfully');
    }

    public function edit($id)
    {
        $data = Quality::find($id);
        return view('admin.quality.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please enter the Quality Stages text.',
            'stages.required' => 'Please enter the quality stages.',
        ]);
    
        $post = Quality::findOrFail($id);
        $post->stages = $request->get('stages');
        $post->text = $request->get('title');
        $post->alt_tag = $request->get('alt_tag');
    
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/quality_stages');
            $file->move($path, $filename);
            $post->image = $filename;
        }
        
        $post->save();
    
        return redirect('/admin/quality')->with('success', 'Quality Stages Updated Successfully');
    }
    
    public function destroy($id)
    {
        $data = Quality::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Quality Stages Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Quality not found!');
    }
}
