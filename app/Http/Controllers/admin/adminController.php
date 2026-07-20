<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Industry;
use App\Models\Blog;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function admin(){
        $blogs = Blog::whereNull('deleted_at')->count();
        $product = Product::whereNull('deleted_at')->count();
        $testimonial = Testimonial::whereNull('deleted_at')->count();
        $industry = Industry::whereNull('deleted_at')->count();
        return view('admin.admin',compact('blogs','product','testimonial','industry'));
    }
	
}