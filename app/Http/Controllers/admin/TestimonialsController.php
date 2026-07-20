<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Testimonial::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.testimonial.index', compact('data'));
    }

    public function create()
    {
        return view('admin.testimonial.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
            // 'title' => 'required',
            'description' => 'required',
        ], [
            'company_name.required' => 'Please enter company name.',
            // 'title.required' => 'Please enter the title',
            'description.required' => 'Please enter the Testimonial description.',
        ]);

        $post = new Testimonial;
        $post->company_name = $request->get('company_name');
        // $post->title = $request->get('title');
        $post->description = $request->get('description');

        $post->save();

        return redirect('/admin/testimonials')->with('success', 'Testimonial Added Successfully');
    }

    public function edit($id)
    {
        $data = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = Testimonial::find($id);
        $post->company_name = $request->get('company_name');
        // $post->title = $request->get('title');
        $post->description = $request->get('description');

        $post->save();
        return redirect('/admin/testimonials')->with('success', 'Testimonial Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Testimonial::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Testimonial Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Testimonial not found!');
    }
}
