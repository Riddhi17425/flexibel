<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.blog.bloglisting', compact('data'));
    }

    public function create()
    {
        return view('admin.blog.addblog');
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'title' => 'required',
            'status' => 'required|in:Active,InActive',
        ], [
            'title.required' => 'Please Enter the Blog name.',
            'status.required' => 'Please select the blog status.',
            'status.in' => 'Please select a valid blog status.',
        ]);
        
        $faqTitles = $request->faq_title ?? [];
        $faqDescriptions = $request->faq_description ?? [];
    
        $title_description = [];
        foreach ($faqTitles as $index => $title) {
            if (empty(trim(strip_tags($title))) || empty(trim(strip_tags($faqDescriptions[$index] ?? '')))) {
        continue;
    }
            $title_description[] = [
                'faq_title' => $title,
                'faq_description' => $faqDescriptions[$index],
            ];
        }

        $post = new Blog;
        $post->category = $request->get('category');
        $post->status = $request->get('status');
        $post->title = $request->get('title');
        $post->short_description = $request->get('short_description');
        $post->description = $request->get('description');
        $post->detail_description = $request->get('detail_description');
        $post->url = $request->get('url');
        $post->conclusion = $request->get('conclusion');
        // $post->slider_top_title = $request->get('slider_top_title');
        // $post->slider_description = $request->get('slider_description');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->front_alt_tag = $request->get('front_alt_tag');
        $post->detail_alt_tag = $request->get('detail_alt_tag');
        $post->banner_alt_tag = $request->get('banner_alt_tag');
        $post->title_description = $title_description;
 
        if($request->hasFile('detail_image')) {
            $file = $request->file('detail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/detail_image');
            $file->move($path, $filename);
            $post->detail_image = $filename;
        }
        if($request->hasFile('top_banner_desktop')) {
            $file = $request->file('top_banner_desktop');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/top_banner_desktop');
            $file->move($path, $filename);
            $post->top_banner_desktop = $filename;
        }
        if($request->hasFile('top_banner_mobile')) {
            $file = $request->file('top_banner_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/top_banner_mobile');
            $file->move($path, $filename);
            $post->top_banner_mobile = $filename;
        } 
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }  
        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/banner_image');
            $file->move($path, $filename);
            $post->banner_image = $filename;
        }

        // $ctaData = [];
        // if ($request->hasFile('cta_image')) {
        //     foreach ($request->file('cta_image') as $index => $file) {
        //         $filename = time() . '_' . $file->getClientOriginalName();
        //         $file->move(public_path('blogs/cta'), $filename);
    
        //         $ctaData[] = [
        //             'image' => $filename,
        //             'alt'=> $request->cta_alt[$index] ?? '',
        //             'title' => $request->cta_title[$index] ?? '',
        //             'description' => $request->cta_description[$index] ?? '',
        //         ];
        //     }
        // }
    
        // // Ensure CTA data is stored as a JSON-encoded string
        // $post->cta = json_encode($ctaData);
        $post->save();

        return redirect('/admin/blog')->with('success', 'Blog Added Successfully');
    }

    public function edit($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.editblog', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:Active,InActive',
        ], [
            'title.required' => 'Please Enter the Blog name.',
            'status.required' => 'Please select the blog status.',
            'status.in' => 'Please select a valid blog status.',
        ]);

        $post = Blog::find($id);
        $faqTitles = $request->faq_title ?? [];
            $faqDescriptions = $request->faq_description ?? [];
        
            $title_description = [];
            foreach ($faqTitles as $index => $title) {
                if (empty(trim(strip_tags($title))) || empty(trim(strip_tags($faqDescriptions[$index] ?? '')))) {
        continue;
    }
                $title_description[] = [
                    'faq_title' => $title,
                    'faq_description' => $faqDescriptions[$index],
                ];
            }
        $post->category = $request->get('category');
        $post->status = $request->get('status');
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->short_description = $request->get('short_description');
        $post->detail_description = $request->get('detail_description');
        $post->url = $request->get('url');
        $post->conclusion = $request->get('conclusion');    
        // $post->slider_top_title = $request->get('slider_top_title');
        // $post->slider_description = $request->get('slider_description');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->front_alt_tag = $request->get('front_alt_tag');
        $post->detail_alt_tag = $request->get('detail_alt_tag');
        $post->banner_alt_tag = $request->get('banner_alt_tag');
        $post->title_description = $title_description;
       
        if($request->hasFile('detail_image')) {
            $file = $request->file('detail_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/detail_image');
            $file->move($path, $filename);
            $post->detail_image = $filename;
        }
        if($request->hasFile('top_banner_desktop')) {
            $file = $request->file('top_banner_desktop');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/top_banner_desktop');
            $file->move($path, $filename);
            $post->top_banner_desktop = $filename;
        }
        if($request->hasFile('top_banner_mobile')) {
            $file = $request->file('top_banner_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/top_banner_mobile');
            $file->move($path, $filename);
            $post->top_banner_mobile = $filename;
        }
        if($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }  
        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('blogs/banner_image');
            $file->move($path, $filename);
            $post->banner_image = $filename;
        }

        // $mergedCtas = [];
        // $existingImages = $request->existing_cta_image ?? [];

        // foreach ($request->cta_title as $index => $title) {
        //     $image = $existingImages[$index] ?? null;
        //     if ($request->hasFile('cta_image') && isset($request->file('cta_image')[$index])) {
        //         $file = $request->file('cta_image')[$index];
        //         $filename = time() . '_' . $file->getClientOriginalName();
        //         $file->move(public_path('blogs/cta'), $filename);
        //         $image = $filename;
        //     }

        //     if ($image) {
        //         $mergedCtas[] = [
        //             'image' => $image,
        //             'alt' => $request->cta_alt[$index] ?? '',
        //             'title' => $title,
        //             'description' => $request->cta_description[$index] ?? '',
        //         ];
        //     }
        // }
        // $post->cta = json_encode($mergedCtas);
        $post->save();
        return redirect('/admin/blog')->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $data = Blog::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Blog Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Blog not found!');
    }
}