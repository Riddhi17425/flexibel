<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.video.videolisting', compact('data'));
    }

    public function create()
    {
        return view('admin.video.addvideo');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'file_type' => 'required|in:videolink,videoupload',
            
        ], [
            'title.required' => 'Please Enter the name.',
          
        ]);
    
        $post = new Video;
        $post->title = $request->get('title');
        $post->file_type = $request->get('file_type');
        if ($request->input('file_type') == 'videolink') {
            $post->video_link = $request->get('video_link');
        }
        
        if ($request->input('file_type') == 'videoupload' && $request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $path = public_path('/Video_uploads'); 
            $file->move($path, $filename);
            $post->video_link = $filename;
        }
    
        if($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Video_image');
            $file->move($path, $filename);
            $post->thumbnail_image = $filename;
        }  
        
        $post->save(); // Save to database
    
        return redirect('/admin/video')->with('success', 'Video Added Successfully');
    }
    

    public function edit($id)
    {
        $data = Video::find($id);
        return view('admin.video.editvideo', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Video::find($id);
        $post->title = $request->get('title');
        $post->file_type = $request->get('file_type');
        if ($request->input('file_type') == 'videolink') {
            $post->video_link = $request->get('video_link'); 
        }
        if ($request->input('file_type') == 'videoupload' && $request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = public_path('/Video_uploads');
            $file->move($path, $filename); 
            $post->video_link = $filename; 
        }
     
        if($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Video_image');
            $file->move($path, $filename);
            $post->thumbnail_image = $filename;
        }

        $post->save();
        return redirect('/admin/video')->with('success', 'Video Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Video::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Video Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'video not found!');
    }
}