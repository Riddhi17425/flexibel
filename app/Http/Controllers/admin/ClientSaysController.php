<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClientSays;
use Illuminate\Http\Request;

class ClientSaysController extends Controller
{
    public function index()
    {
        $data = ClientSays::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.clientsays.clientsayslisting', compact('data'));
    }

    public function create()
    {
        return view('admin.clientsays.addclientsays');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please enter the clientsays name.',
        ]);

        $post = new ClientSays;
        $post->title = $request->get('title');
        $post->designation = $request->get('designation');
        $post->description = $request->get('description');

        if ($request->hasFile('client_logo')) {
            $file = $request->file('client_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/clientsays_client_logo');
            $file->move($path, $filename);
            $post->client_logo = $filename;
        }
        if ($request->hasFile('main_images')) {
            $file = $request->file('main_images');
            $filename = $file->getClientOriginalName();
            $path = public_path('/clientsays_main_images');
            $file->move($path, $filename);
            $post->main_images = $filename;
        }
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/clientsays_company_logo');
            $file->move($path, $filename);
            $post->company_logo = $filename;
        }

        $post->save();

        return redirect('/admin/clientsays')->with('success', 'clientsays Added Successfully');
    }

    public function edit($id)
    {
        $data = ClientSays::find($id);
        return view('admin.clientsays.editclientsays', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = ClientSays::find($id);
        $post->title = $request->get('title');
        $post->designation = $request->get('designation');
        $post->description = $request->get('description');

        if ($request->hasFile('client_logo')) {
            $file = $request->file('client_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/clientsays_client_logo');
            $file->move($path, $filename);
            $post->client_logo = $filename;
        }
        if ($request->hasFile('main_images')) {
            $file = $request->file('main_images');
            $filename = $file->getClientOriginalName();
            $path = public_path('/clientsays_main_images');
            $file->move($path, $filename);
            $post->main_images = $filename;
        }
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName();
            $path = public_path('/clientsays_company_logo');
            $file->move($path, $filename);
            $post->company_logo = $filename;
        }

        $post->save();
        return redirect('/admin/clientsays')->with('success', 'clientsays Updated Successfully');
    }

    public function destroy($id)
    {
        $data = ClientSays::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your clientsays Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'clientsays not found!');
    }
}