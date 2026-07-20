<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lifeimage;
use Illuminate\Http\Request;

class LifeimageController extends Controller
{
    public function index()
    {
        $data = Lifeimage::orderBy('created_at', 'desc')->wherenull('deleted_at')->paginate(15);
        return view('admin.lifeimage.lifeimagelisting', compact('data'));
    }

    public function create()
    {
        return view('admin.lifeimage.addlifeimage');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Please enter the lifeimage name.',
        ]);
    
        $post = new Lifeimage;
        $post->title = $request->get('title');
    
        $imageData = []; // To hold image and alt pairs
    
        if ($request->hasFile('lifeimage')) {
            $altTexts = $request->input('lifeimage_alt', []);
    
            foreach ($request->file('lifeimage') as $index => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('lifeat_image'), $filename);
    
                $imageData[] = [
                    'image' => $filename,
                    'alt' => $altTexts[$index] ?? '', // use index-matching alt text
                ];
            }
        }
    
        $post->lifeimage = json_encode($imageData);
        $post->save();
    
        return redirect('/admin/lifeimage')->with('success', 'Lifeimage Added Successfully');
    }
    public function edit($id)
    {
        $data = Lifeimage::find($id);
        return view('admin.lifeimage.editlifeimage', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $post = Lifeimage::findOrFail($id);
        $post->title = $request->get('title');
    
        // Prepare arrays
        $existingImages = $request->get('existing_lifeat_image', []); // filenames
        $existingAlts = $request->get('existing_lifeimage_alt', []);  // alt texts for existing
        $newAlts = $request->get('lifeimage_alt', []);                // alt texts for new uploads
        $uploadedFiles = $request->file('lifeimage', []);             // uploaded files (may be null)
    
        // Ensure everything is an array
        if (!is_array($existingImages)) $existingImages = [];
        if (!is_array($existingAlts)) $existingAlts = [];
        if (!is_array($newAlts)) $newAlts = [];
        if (!is_array($uploadedFiles)) $uploadedFiles = [$uploadedFiles];
    
        $allImages = [];
    
        // Combine existing images and alts
        foreach ($existingImages as $index => $filename) {
            $alt = $existingAlts[$index] ?? '';
            $allImages[] = ['image' => $filename, 'alt' => $alt];
        }
    
        // Handle new uploads and alts
        foreach ($uploadedFiles as $index => $file) {
            if ($file && $file->isValid()) {
                $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('lifeat_image'), $filename);
    
                $alt = $newAlts[$index] ?? '';
                $allImages[] = ['image' => $filename, 'alt' => $alt];
            }
        }
    
        // Save JSON data
        $post->lifeimage = json_encode($allImages);
        $post->save();
    
        return redirect('/admin/lifeimage')->with('success', 'Lifeimage Updated Successfully');
    }



    
    public function destroy($id)
    {
        $data = Lifeimage::find($id);
    
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Your Lifeimage Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Lifeimage not found!');
    }
}