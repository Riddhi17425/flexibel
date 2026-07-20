<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeCertificate;
use Illuminate\Http\Request;

class HomeCertificateController extends Controller
{
  
    public function index()
    {
        $data = HomeCertificate::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.home_certificate.certificatelisting', compact('data'));
    }

    public function create()
    { 
        return view('admin.home_certificate.addcertificate');
    }

    public function store(Request $request)
    {
        $post = new HomeCertificate;
        
        $post->alt_tag = $request->input('alt_tag');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_certificate');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect('/admin/home-certificate')->with('success', 'certificate Added Successfully');
    }

    public function edit($id)
    {
        $data = HomeCertificate::find($id);
        return view('admin.home_certificate.editcertificate', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = HomeCertificate::find($id);
        
        $post->alt_tag = $request->input('alt_tag');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_certificate');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('/admin/home-certificate')->with('success', 'certificate Updated Successfully');
    }

    public function destroy($id)
    {
        $data = HomeCertificate::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your certificate Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'certificate not found!');
    }
}