<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->whereNull('deleted_at')->paginate(15);
        return view('admin.product.productlisting', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::wherenull('deleted_at')->get();
        $subcategories = ProductSubCategory::wherenull('deleted_at')->get();
        return view('admin.product.addproduct',compact('categories','subcategories'));
    }
   
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'short_description' => 'required|string',
        // ]);

        $post = new Product;
        $post->category_id = $request->get('category_id');
        $post->subcategory_id = $request->get('subcategory_id');
        $post->title = $request->get('title');
        $post->name = $request->get('name');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('product_url');
        //***** image section *****//
        $post->product_title = $request->input('product_title');
        $post->product_description = $request->input('product_description');
        $post->product_detail_desc = $request->input('product_detail_desc');
       //***** image section end *****//
        $post->features = $request->get('features');
        $post->feature_heading = $request->get('feature_heading');
        $post->application = $request->get('application');
        $post->app_heading = $request->get('app_heading');
        $post->item_description = $request->get('item_description');
        $post->item_desc_heading = $request->get('item_desc_heading');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->adv_heading = $request->get('adv_heading');
        $post->adv_description = $request->get('adv_description');
        $post->req_heading = $request->get('req_heading');
        $post->req_description = $request->get('req_description');
        $post->movements_table = $request->get('movements');
        $post->pressure_thurst_heading = $request->get('pressure_thurst_heading');
        $post->pressure_thurst_table = $request->get('pressure_thurst_table');
        $post->torsional_rotation_heading = $request->get('torsional_rotation_heading');
        $post->torsional_rotation_table = $request->get('torsional_rotation_table');
        $post->menu_description = $request->get('menu_description');

        if ($request->hasFile('top_banner')) {
            $file = $request->file('top_banner');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/banner/desktop');
            $file->move($path, $filename);
            $post->top_banner = $filename;
        }
        if ($request->hasFile('side_menu_image')) {
            $file = $request->file('side_menu_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/sidemenu');
            $file->move($path, $filename);
            $post->side_menu_image = $filename;
        }
        if ($request->hasFile('top_banner_mobile')) {
            $file = $request->file('top_banner_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/banner/mobile');
            $file->move($path, $filename);
            $post->top_banner_mobile = $filename;
        }
        if ($request->hasFile('menu_banner')) {
            $file = $request->file('menu_banner');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/menu/banner');
            $file->move($path, $filename);
            $post->menu_banner = $filename;
        }
        if ($request->hasFile('menu_image')) {
            $file = $request->file('menu_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/menu/image');
            $file->move($path, $filename);
            $post->menu_image = $filename;
        }
        if ($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }
        if ($request->hasFile('adv_image')) {
            $file = $request->file('adv_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/adv_image');
            $file->move($path, $filename);
            $post->adv_image = $filename;
        }
        if ($request->hasFile('image_desktop')) {
            $file = $request->file('image_desktop');
            $filename = $file->getClientOriginalName();
            $path = public_path('/products/desktop');
            $file->move($path, $filename);
            $post->product_img_desktop = $filename;
        }

        if ($request->hasFile('image_mobile')) {
            $file = $request->file('image_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('/products/mobile');
            $file->move($path, $filename);
            $post->product_img_mobile = $filename;
        }
        if ($request->hasFile('image_3d')) {
            $file = $request->file('image_3d');
            $filename = $file->getClientOriginalName();
            $path = public_path('/products/3d_images');
            $file->move($path, $filename);
            $post->image_3d = $filename;
        }
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFilename = $pdfFile->getClientOriginalName();
            $pdfPath = public_path('/products/pdfs');
            $pdfFile->move($pdfPath, $pdfFilename);
            $post->pdf = $pdfFilename;
        }

        // Create the product
        $post->save();

        return redirect('/admin/product')->with('success', 'Product Added Successfully');
    }
   
    public function edit($id)
    {
        $data = Product::find($id);
        $categories = ProductCategory::wherenull('deleted_at')->get();
        $subcategories = ProductSubCategory::wherenull('deleted_at')->get();
        return view('admin.product.editproduct', compact('data','categories','subcategories'));
    }

    public function update(Request $request, $id)
    {
        $post = Product::findOrFail($id);
        $post->category_id = $request->get('category_id');
        $post->subcategory_id = $request->get('subcategory_id');
        $post->title = $request->get('title');
        $post->name = $request->get('name');
        $post->short_description = $request->get('short_description');
        $post->url = $request->get('product_url');
        //***** image section *****//
        $post->product_title = $request->input('product_title');
        $post->product_description = $request->input('product_description');
        $post->product_detail_desc = $request->input('product_detail_desc');
        //***** image section end *****//
        $post->features = $request->get('features');
        $post->feature_heading = $request->get('feature_heading');
        $post->application = $request->get('application');
        $post->app_heading = $request->get('app_heading');
        $post->item_description = $request->get('item_description');
        $post->item_desc_heading = $request->get('item_desc_heading');
        $post->meta_title = $request->get('meta_title');
        $post->meta_description = $request->get('meta_description');
        $post->adv_heading = $request->get('adv_heading');
        $post->adv_description = $request->get('adv_description');
        $post->req_heading = $request->get('req_heading');
        $post->req_description = $request->get('req_description');
        $post->movements_table = $request->get('movements');
        $post->pressure_thurst_heading = $request->get('pressure_thurst_heading');
        $post->pressure_thurst_table = $request->get('pressure_thurst_table');
        $post->torsional_rotation_heading = $request->get('torsional_rotation_heading');
        $post->torsional_rotation_table = $request->get('torsional_rotation_table');
        $post->menu_description = $request->get('menu_description');


        // $product = Product::findOrFail($id);
        // $data = $request->all();
        if ($request->hasFile('top_banner')) {
            $file = $request->file('top_banner');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/banner/desktop');
            $file->move($path, $filename);
            $post->top_banner = $filename;
        }
        if ($request->hasFile('side_menu_image')) {
            $file = $request->file('side_menu_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/sidemenu');
            $file->move($path, $filename);
            $post->side_menu_image = $filename;
        }
        if ($request->hasFile('top_banner_mobile')) {
            $file = $request->file('top_banner_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/banner/mobile');
            $file->move($path, $filename);
            $post->top_banner_mobile = $filename;
        }
        if ($request->hasFile('menu_banner')) {
            $file = $request->file('menu_banner');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/menu/banner');
            $file->move($path, $filename);
            $post->menu_banner = $filename;
        }
        if ($request->hasFile('menu_image')) {
            $file = $request->file('menu_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/menu/image');
            $file->move($path, $filename);
            $post->menu_image = $filename;
        }
        if ($request->hasFile('front_image')) {
            $file = $request->file('front_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/front_image');
            $file->move($path, $filename);
            $post->front_image = $filename;
        }
        if ($request->hasFile('adv_image')) {
            $file = $request->file('adv_image');
            $filename = $file->getClientOriginalName();
            $path = public_path('products/adv_image');
            $file->move($path, $filename);
            $post->adv_image = $filename;
        }
        if ($request->hasFile('image_desktop')) {
            $file = $request->file('image_desktop');
            $filename = $file->getClientOriginalName();
            $path = public_path('/products/desktop');
            $file->move($path, $filename);
            $post->product_img_desktop = $filename;
        }

        if ($request->hasFile('image_mobile')) {
            $file = $request->file('image_mobile');
            $filename = $file->getClientOriginalName();
            $path = public_path('/products/mobile');
            $file->move($path, $filename);
            $post->product_img_mobile = $filename;
        }
        if ($request->hasFile('image_3d')) {
            $file = $request->file('image_3d');
            $filename = $file->getClientOriginalName();
            $path = public_path('/products/3d_images');
            $file->move($path, $filename);
            $post->image_3d  = $filename;
        }
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfFilename = $pdfFile->getClientOriginalName();
            $pdfPath = public_path('/products/pdfs');
            $pdfFile->move($pdfPath, $pdfFilename);
            $post->pdf = $pdfFilename;
        }

        $post->save();
        return redirect('/admin/product')->with('success', 'Product Updated Successfully.');
    }

    public function destroy($id)
    {
        $data = Product::find($id);
        if ($data) {
        $data->delete();
        return redirect()->back()->with('success', 'Your Product Has Been Deleted Successfully!');
        }
    
        return redirect()->back()->with('error', 'Product not found!');
    }
}
