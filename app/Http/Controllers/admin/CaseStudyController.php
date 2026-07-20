<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function index()
    {
        $data = CaseStudy::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.casestudy.casestudylisting', compact('data'));
    }

    public function create()
    {
        return view('admin.casestudy.addcasestudy');
    }

    public function store(Request $request)
    {
        

        $caseStudy = new CaseStudy;
        $caseStudy->name = $request->get('name');
        $caseStudy->industry = $request->get('industry');
        $caseStudy->region = $request->get('region');
        $caseStudy->application = $request->get('application');
        $caseStudy->date = $request->get('date');
        $caseStudy->company_name = $request->get('company_name');
        $caseStudy->short_description = $request->get('short_description');
        $caseStudy->company_des = $request->get('company_des');
        $caseStudy->casestudy_url = $request->get('casestudy_url');
        $caseStudy->top_title = $request->get('top_title');
        $caseStudy->section1_title = $request->get('section1_title');
        $caseStudy->section1_description = $request->get('section1_description');
        $caseStudy->section2_title = $request->get('section2_title');
        $caseStudy->section2_description = $request->get('section2_description');
        $caseStudy->section3_title = $request->get('section3_title');
        $caseStudy->section3_description = $request->get('section3_description');
        $caseStudy->main_title = $request->get('main_title');
        $caseStudy->description = $request->get('description');
        $caseStudy->meta_title = $request->get('meta_title');
        $caseStudy->meta_description = $request->get('meta_description');

        
        
        if($request->hasFile('top_banner_desktop')) {
            $file = $request->file('top_banner_desktop');
            $filename = $file->getClientOriginalName();
            $path = public_path('case_studies/banner/desktop');
            $file->move($path, $filename);
            $caseStudy->top_banner_desktop = $filename;
        }
        if($request->hasFile('top_banner_mobile')) {
            $file = $request->file('top_banner_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('case_studies/banner/mobile');
            $file->move($path, $filename);
            $caseStudy->top_banner_mobile = $filename;
        }
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('case_studies/front_images');
            $file->move($path, $filename);
            $caseStudy->front_image = $filename;
        }
        if($request->hasFile('detail_img')) {
            $file = $request->file('detail_img');
            $filename = $file->getClientOriginalName();
            $path = public_path('case_studies/detail_imgs');
            $file->move($path, $filename);
            $caseStudy->detail_img = $filename;
        }
        if ($request->hasFile('slider_image')) {
            $detailImageFilenames = [];
            $sliderAlts = $request->get('slider_alt', []);
            
            // Handle new uploaded images
           foreach ($request->file('slider_image') as $index => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('case_studies/slider/desktop'), $filename);
                 $alt = $sliderAlts[$index] ?? '';
                $detailImageFilenames[] = ['image' => $filename, 'alt' => $alt];

            }
        
            // Merge existing + new images
            $existing = $request->get('existing_slider_images', []);
            $allImages = array_merge($existing, $detailImageFilenames);
        
            $caseStudy->slider_image = json_encode($allImages);
        }
        if ($request->hasFile('mobile_slider')) {
            $detailImageFilenames = [];
            $mobileAlts = $request->get('mobile_alt', []);
            // Handle new uploaded images
            foreach ($request->file('mobile_slider') as $index => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('case_studies/slider/mobile'), $filename);
                $alt = $mobileAlts[$index] ?? '';
                 $detailImageFilenames[] = ['image' => $filename, 'alt' => $alt];
                
            }
        
            // Merge existing + new images
            $existing = $request->get('existing_mobile_sliders', []);
            $allImages = array_merge($existing, $detailImageFilenames);
        
            $caseStudy->mobile_sliders = json_encode($allImages);
        }
        $caseStudy->save();

        return redirect('/admin/casestudy')->with('success', 'Case Study Added Successfully');
    }

    public function edit($id)
    {
        $data = CaseStudy::find($id);
        return view('admin.casestudy.editcasestudy', compact('data'));
    }

public function update(Request $request, $id)
{
    $caseStudy = CaseStudy::find($id);

    // Basic fields
    $caseStudy->name = $request->get('name');
    $caseStudy->industry = $request->get('industry');
    $caseStudy->region = $request->get('region');
    $caseStudy->application = $request->get('application');
    $caseStudy->date = $request->get('date');
    $caseStudy->company_name = $request->get('company_name');
    $caseStudy->short_description = $request->get('short_description');
    $caseStudy->company_des = $request->get('company_des');
    $caseStudy->casestudy_url = $request->get('casestudy_url');
    $caseStudy->top_title = $request->get('top_title');
    $caseStudy->main_title = $request->get('main_title');
    $caseStudy->description = $request->get('description');
    $caseStudy->section1_title = $request->get('section1_title');
    $caseStudy->section1_description = $request->get('section1_description');
    $caseStudy->section2_title = $request->get('section2_title');
    $caseStudy->section2_description = $request->get('section2_description');
    $caseStudy->section3_title = $request->get('section3_title');
    $caseStudy->section3_description = $request->get('section3_description');
    $caseStudy->meta_title = $request->get('meta_title');
    $caseStudy->meta_description = $request->get('meta_description');

    // Upload single images
    if ($request->hasFile('top_banner_desktop')) {
        $file = $request->file('top_banner_desktop');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('case_studies/banner/desktop'), $filename);
        $caseStudy->top_banner_desktop = $filename;
    }
    if ($request->hasFile('top_banner_mobile')) {
        $file = $request->file('top_banner_mobile');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('case_studies/banner/mobile'), $filename);
        $caseStudy->top_banner_mobile = $filename;
    }
    if ($request->hasFile('front_image')) {
        $file = $request->file('front_image');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('case_studies/front_images'), $filename);
        $caseStudy->front_image = $filename;
    }
    if ($request->hasFile('detail_img')) {
        $file = $request->file('detail_img');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('case_studies/detail_imgs'), $filename);
        $caseStudy->detail_img = $filename;
    }

    // Desktop slider
    $existingDesktopImages = $request->get('existing_slider_images', []);
    $desktopAlts = $request->get('slider_alt', []);
    $newDesktopImages = $request->file('slider_image', []);
    $finalDesktopImages = [];

    foreach ($existingDesktopImages as $index => $existing) {
        $existing = is_array($existing) ? $existing : json_decode($existing, true);
        if (isset($newDesktopImages[$index])) {
            if (!empty($existing['image']) && file_exists(public_path('case_studies/slider/desktop/' . $existing['image']))) {
                unlink(public_path('case_studies/slider/desktop/' . $existing['image']));
            }
            $file = $newDesktopImages[$index];
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('case_studies/slider/desktop'), $filename);
            $alt = $desktopAlts[$index] ?? '';
            $finalDesktopImages[] = ['image' => $filename, 'alt' => $alt];
        } else {
            $finalDesktopImages[] = [
                'image' => $existing['image'] ?? '',
                'alt' => $existing['alt'] ?? ''
            ];
        }
    }

    if ($request->hasFile('slider_image')) {
        foreach ($request->file('slider_image') as $key => $file) {
            if (!isset($existingDesktopImages[$key])) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('case_studies/slider/desktop'), $filename);
                $alt = $desktopAlts[$key] ?? '';
                $finalDesktopImages[] = ['image' => $filename, 'alt' => $alt];
            }
        }
    }

    $caseStudy->slider_image = json_encode($finalDesktopImages);

    // Mobile slider
    $existingMobileImages = $request->get('existing_mobile_sliders', []);
    $mobileAlts = $request->get('mobile_alt', []);
    $newMobileImages = $request->file('mobile_slider', []);
    $finalMobileImages = [];

    foreach ($existingMobileImages as $index => $existing) {
        $existing = is_array($existing) ? $existing : json_decode($existing, true);
        if (isset($newMobileImages[$index])) {
            if (!empty($existing['image']) && file_exists(public_path('case_studies/slider/mobile/' . $existing['image']))) {
                unlink(public_path('case_studies/slider/mobile/' . $existing['image']));
            }
            $file = $newMobileImages[$index];
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('case_studies/slider/mobile'), $filename);
            $alt = $mobileAlts[$index] ?? '';
            $finalMobileImages[] = ['image' => $filename, 'alt' => $alt];
        } else {
            $finalMobileImages[] = [
                'image' => $existing['image'] ?? '',
                'alt' => $existing['alt'] ?? ''
            ];
        }
    }

    if ($request->hasFile('mobile_slider')) {
        foreach ($request->file('mobile_slider') as $key => $file) {
            if (!isset($existingMobileImages[$key])) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('case_studies/slider/mobile'), $filename);
                $alt = $mobileAlts[$key] ?? '';
                $finalMobileImages[] = ['image' => $filename, 'alt' => $alt];
            }
        }
    }

    $caseStudy->mobile_sliders = json_encode($finalMobileImages);

    $caseStudy->save();

    return redirect('/admin/casestudy')->with('success', 'Case Study Updated Successfully');
}


    public function destroy($id)
    {
        $caseStudy = CaseStudy::find($id);
    
        if ($caseStudy) {
            $caseStudy->delete(); 
            return redirect()->back()->with('success', 'Case Study Has Been Deleted Successfully');
        }
    
        return redirect()->back()->with('error', 'Case Study not found!');
    }

}