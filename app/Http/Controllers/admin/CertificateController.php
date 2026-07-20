<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
  
    public function index()
    {
        $data = Certificate::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.certificate.certificatelisting', compact('data'));
    }

    public function create()
    { 
        return view('admin.certificate.addcertificate');
    }

    public function store(Request $request)
    {
        
        $post = new Certificate;
        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');
        $post->alt_tag = $request->get('alt_tag');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/certificate_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }

        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFilename = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfPath = public_path('/certificate_pdfs');
            $pdfFile->move($pdfPath, $pdfFilename);
            $post->pdf = $pdfFilename;
        }

        $post->save();

        return redirect('/admin/certificate')->with('success', 'certificate Added Successfully');
    }

    public function edit($id)
    {
        $data = Certificate::find($id);
        return view('admin.certificate.editcertificate', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Certificate::find($id);
        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');
        $post->alt_tag = $request->get('alt_tag');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path('/certificate_images');
            $file->move($path, $filename);
            $post->image = $filename;
        }
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFilename = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfPath = public_path('/certificate_pdfs');
            $pdfFile->move($pdfPath, $pdfFilename);
            $post->pdf = $pdfFilename;
        }

        $post->save();
        return redirect('/admin/certificate')->with('success', 'certificate Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Certificate::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your certificate Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'certificate not found!');
    }
}