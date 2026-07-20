<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $data = Faq::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.faq.faqlisting', compact('data'));
    }

    public function create()
    {
        return view('admin.faq.addfaq');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title.*' => 'required',
        ], [
            'title.*.required' => 'Please enter the title.',
        ]);

        $post = new faq;
        $post->faq_name = $request->get('faq_name');

        $titles = $request->get('title');
        $descriptions = $request->get('description');
        $title_description = [];
        foreach ($titles as $index => $title) {
            $title_description[] = [
                'title' => $title,
                'description' => $descriptions[$index],
            ];
        }
        $post->title_description = json_encode($title_description);
        
        $post->save();

        return redirect('/admin/faq')->with('success', 'Faq Added Successfully');
    }

    public function edit($id)
    {
        $data = Faq::findOrFail($id);
        $names = Faq::select('faq_name')->distinct()->get();
        // dd($names);
        return view('admin.faq.editfaq', compact('data','names'));
    }

    public function update(Request $request, $id)
    {
        $post = Faq::find($id);
        $post->faq_name = $request->get('faq_name');

        $titles = $request->get('title');
        $descriptions = $request->get('description');
        $title_description = [];
        foreach ($titles as $index => $title) {
            $title_description[] = [
                'title' => $title,
                'description' => $descriptions[$index],
            ];
        }
        $post->title_description = json_encode($title_description);
        $post->save();
        return redirect('/admin/faq')->with('success', 'Faq Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Faq::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Faq Has Been Deleted Successfully!');
            }
            return redirect()->back()->with('error', 'Faq not found!');
    }
}