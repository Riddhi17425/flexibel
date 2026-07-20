<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use Illuminate\Http\Request;

class ImageSliderController extends Controller
{
    public function index()
    {
        $data = ImageSlider::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.imageslider.imagesliderlisting', compact('data'));
    }

    public function create()
    {
        return view('admin.imageslider.addimageslider');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please Enter the name.',
        ]);

        $post = new ImageSlider;
        $post->title = $request->get('title');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/imageslider_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }  
        $post->save();

        return redirect('/admin/imageslider')->with('success', 'ImageSlider Added Successfully');
    }

    public function edit($id)
    {
        $data = ImageSlider::find($id);
        return view('admin.imageslider.editimageslider', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = ImageSlider::find($id);
        $post->title = $request->get('title');
     
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/imageslider_image');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/imageslider')->with('success', 'ImageSlider Updated Successfully');
    }

    public function destroy($id)
    {
        $data = ImageSlider::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your ImageSlider Has Been Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'ImageSlider not found!');
    }
}