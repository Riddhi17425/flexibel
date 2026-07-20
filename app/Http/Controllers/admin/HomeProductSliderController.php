<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeProductSlider;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class HomeProductSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HomeProductSlider::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.home_product_slider.listing', compact('data'));
    }

    public function create()
    {
        $productCategories = ProductCategory::select('id', 'name')->get();
        return view('admin.home_product_slider.add', compact('productCategories'));
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
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Please enter the industry name.',
        ]);
    
        // Create a new Industry instance
        $post = new HomeProductSlider();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->detail_description = $request->input('detail_description');
        $post->desktop_alt_tag = $request->input('desktop_alt_tag');
        $post->mobile_alt_tag = $request->input('mobile_alt_tag');
        $post->url = $request->input('url');
        $post->category_id = $request->category_id ?? null;

        if ($request->hasFile('image_desktop')) {
            $file = $request->file('image_desktop');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_product_slider/desktop');
            $file->move($path, $filename);
            $post->image_desktop = $filename;
        }

        if ($request->hasFile('image_mobile')) {
            $file = $request->file('image_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_product_slider/mobile');
            $file->move($path, $filename);
            $post->image_mobile = $filename;
        }
        $post->save();
    
        return redirect('/admin/home-product-slider')->with('success', 'Product Slider added successfully.');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = HomeProductSlider::find($id);
        $productCategories = ProductCategory::select('id', 'name')->get();
        
        return view('admin.home_product_slider.edit', compact('data', 'productCategories'));
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
        // Validation rules
       
        $post = HomeProductSlider::find($id);
         $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->detail_description = $request->input('detail_description');
        $post->desktop_alt_tag = $request->input('desktop_alt_tag');
        $post->mobile_alt_tag = $request->input('mobile_alt_tag');
        $post->url = $request->input('url');
        $post->category_id = $request->category_id ?? null;
        if ($request->hasFile('image_desktop')) {
            $file = $request->file('image_desktop');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_product_slider/desktop');
            $file->move($path, $filename);
            $post->image_desktop = $filename;
        }

        if ($request->hasFile('image_mobile')) {
            $file = $request->file('image_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('/home_product_slider/mobile');
            $file->move($path, $filename);
            $post->image_mobile = $filename;
        }
        

        // $existingImages = $request->get('existing_desktop_images', []);
        // $newDesktopImages = [];
        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $file) {
        //         if ($file && $file->isValid()) {
        //             $filename = time() . '_' . $file->getClientOriginalName();
        //             $file->move(public_path('home_product_slider/desktop'), $filename);
        //             $newDesktopImages[] = $filename;
        //         }
        //     }
        // }
        // // Delete any images that were removed
        // $previousImages = $post->image_desktop ?? [];
        // $imagesToDelete = array_diff($previousImages, $existingImages);
        // foreach ($imagesToDelete as $img) {
        //     $path = public_path('home_product_slider/desktop/' . $img);
        //     if (file_exists($path)) {
        //         unlink($path);
        //     }
        // }
        // $post->image_desktop = array_merge($existingImages, $newDesktopImages);

        // // Mobile Images Logic
        // $existingMobileImages = $request->get('existing_mobile_images', []);
        // $newMobileImages = [];

        // if ($request->hasFile('mobile_image')) {
        //     foreach ($request->file('mobile_image') as $index => $mobileImage) {
        //         if ($mobileImage->isValid()) {
        //             $imageName = time() . "_mobile_{$index}." . $mobileImage->getClientOriginalExtension();
        //             $mobileImage->move(public_path('home_product_slider/mobile'), $imageName);
        //             $newMobileImages[] = $imageName;
        //         }
        //     }
        // }
        // $previousMobileImages = $post->image_mobile ?? [];
        // $mobileImagesToDelete = array_diff($previousMobileImages, $existingMobileImages);
        // foreach ($mobileImagesToDelete as $img) {
        //     $path = public_path('home_product_slider/mobile/' . $img);
        //     if (file_exists($path)) {
        //         unlink($path);
        //     }
        // }
        // $post->image_mobile = array_merge($existingMobileImages, $newMobileImages);
        $post->save();
        return redirect('/admin/home-product-slider')->with('success', 'Product Slider Updated Successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = HomeProductSlider::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Product Slider Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Product Slider not found!');
    }
}