<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::orderBy('created_at', 'desc')->where('is_delete', '0')->paginate(15);
        return view('admin.news.newslisting', compact('data'));
    }

    public function create()
    {
        return view('admin.news.addnews');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'host' => 'required',
        ], [
            'host.required' => 'Please Enter the news name.',
        ]);
    
        $post = new News;
        $post->news_name = $request->get('news_name');
        $post->news_des = $request->get('news_des');
        $post->host = $request->get('host');
        $post->alt = $request->get('alt');
        $post->url = $request->get('url');
        $post->date = date('Y-m-d', strtotime($request->input('date')));
        
    
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/news_image');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $post->image = implode(',', $upload_images);
        }
    
     
        $post->save();
    
        return redirect('/admin/news')->with('success', 'news Added Successfully');
    }


    public function edit($id)
    {
        $data = News::find($id);
        return view('admin.news.editnews', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = News::find($id);
        $post->news_name = $request->get('news_name');
        $post->host = $request->get('host');
        $post->alt = $request->get('alt');
        $post->news_des = $request->get('news_des');
        $post->url = $request->get('url');
        $post->date = date('Y-m-d', strtotime($request->input('date')));

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $upload_images = [];
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path = public_path('/news_image');
                $file->move($path, $filename);
                $upload_images[] = $filename;
            }
            $post->image = implode(',', $upload_images);
        }
    
     
        $post->save();
        return redirect('/admin/news')->with('success', 'news Updated Successfully');
    }


    public function destroy($id)
    {
        $data = News::find($id);
        $data->is_delete = '1';
        $data->update();
        return redirect()->back()->with('success', 'Your news Has Been Deleted Successfully!');
    }
}