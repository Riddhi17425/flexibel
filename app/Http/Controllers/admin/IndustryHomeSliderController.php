<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryHomeSlider;

class IndustryHomeSliderController extends Controller
{
    public function index()
    {
        $data = IndustryHomeSlider::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.industry_home_slider.listing', compact('data'));
    }

    public function create()
    {
        return view('admin.industry_home_slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        $post = new IndustryHomeSlider();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
    
        // ----- Desktop Images with Alt -----
        $imageData = [];
        if ($request->hasFile('image')) {
            $altTexts = $request->input('alt', []);
            foreach ($request->file('image') as $index => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('Industry_Home_Slider/desktop'), $filename);
    
                $alt = $altTexts[$index];
                $imageData[] = [
                    'filename' => $filename,
                    'alt' => $alt
                ];
            }
        }
        $post->image = json_encode($imageData); // Save as JSON
    
        // ----- Mobile Images (filenames only) -----
        $mobileImages = [];
        if ($request->hasFile('mobile_image')) {
            foreach ($request->file('mobile_image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('Industry_Home_Slider/mobile'), $filename);
                $mobileImages[] = $filename;
            }
        }
        $post->mobile_image = json_encode($mobileImages);
    
        $post->save();
    
        return redirect('/admin/industry-home-slider')->with('success', 'IndustryHomeSlider added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = IndustryHomeSlider::find($id);
        return view('admin.industry_home_slider.edit', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = IndustryHomeSlider::findOrFail($id);
    
        $post->title = $request->get('title');
        $post->description = $request->get('description');
    
        // === DESKTOP IMAGES WITH ALT TAG ===
        $existingImages = $request->get('existing_desktop_images', []);
        $existingAlts = $request->get('existing_desktop_alts', []);
        $finalDesktopImages = [];
    
        // Keep existing images with their alt tags
        foreach ($existingImages as $i => $img) {
            $finalDesktopImages[] = [
                'filename' => $img,
                'alt' => $existingAlts[$i] ?? ''
            ];
        }
    
        // Handle new uploads
        if ($request->hasFile('image')) {
            $newAlts = $request->input('alt', []);
            foreach ($request->file('image') as $index => $file) {
                if ($file && $file->isValid()) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('Industry_Home_Slider/desktop'), $filename);
    
                    $alt = $newAlts[$index];
                    $finalDesktopImages[] = [
                        'filename' => $filename,
                        'alt' => $alt
                    ];
                }
            }
        }
    
        // Delete removed images from filesystem
        $oldImages = is_array($post->image) ? $post->image : json_decode($post->image, true) ?? [];
        $oldFilenames = array_column($oldImages, 'filename');
        $currentFilenames = array_column($finalDesktopImages, 'filename');
        $imagesToDelete = array_diff($oldFilenames, $currentFilenames);
        foreach ($imagesToDelete as $img) {
            $path = public_path('Industry_Home_Slider/desktop/' . $img);
            if (file_exists($path)) unlink($path);
        }
    
        $post->image = json_encode($finalDesktopImages);
    
        // === MOBILE IMAGES ===
        $existingMobileImages = $request->get('existing_mobile_images', []);
        $newMobileImages = [];
    
        if ($request->hasFile('mobile_image')) {
            foreach ($request->file('mobile_image') as $index => $mobileImage) {
                if ($mobileImage->isValid()) {
                    $imageName = time() . "_mobile_{$index}." . $mobileImage->getClientOriginalExtension();
                    $mobileImage->move(public_path('Industry_Home_Slider/mobile'), $imageName);
                    $newMobileImages[] = $imageName;
                }
            }
        }
    
        // Delete removed mobile images
        $oldMobileImages = is_array($post->mobile_image) ? $post->mobile_image : json_decode($post->mobile_image, true) ?? [];
        $finalMobileImages = array_merge($existingMobileImages, $newMobileImages);
        $toDeleteMobile = array_diff($oldMobileImages, $finalMobileImages);
        foreach ($toDeleteMobile as $img) {
            $path = public_path('Industry_Home_Slider/mobile/' . $img);
            if (file_exists($path)) unlink($path);
        }
    
        $post->mobile_image = json_encode($finalMobileImages);
    
        $post->save();
    
        return redirect('/admin/industry-home-slider')->with('success', 'IndustryHomeSlider Updated Successfully');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = IndustryHomeSlider::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your IndustryHomeSlider Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'IndustryHomeSlider not found!');
    }
}
