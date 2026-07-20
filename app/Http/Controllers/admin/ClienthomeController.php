<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Clienthome;
use Illuminate\Http\Request;

class ClienthomeController extends Controller
{
    public function index()
    {
        $data = Clienthome::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.clienthome.clienthomelisting', compact('data'));
    }

    public function create()
    {
        return view('admin.clienthome.addclienthome');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please enter the clienthome name.',
        ]);

        $post = new Clienthome;
        $post->title = $request->get('title');
        $post->alt_tag = $request->get('alt_tag');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Addonclient_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect('/admin/clienthome')->with('success', 'clienthome Added Successfully');
    }

    public function edit($id)
    {
        $data = Clienthome::find($id);
        return view('admin.clienthome.editclienthome', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Clienthome::find($id);
        $post->title = $request->get('title');
        $post->alt_tag = $request->get('alt_tag');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/Addonclient_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/clienthome')->with('success', 'clienthome Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Clienthome::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Faq Has Been Deleted Successfully!');
            }
            return redirect()->back()->with('error', 'Faq not found!');
    }
}