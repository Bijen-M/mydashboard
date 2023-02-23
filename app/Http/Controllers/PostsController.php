<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $data['title'] = 'Posts';
        $data['menu'] = 'posts';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Posts</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.posts.index', $data);
    }
    public function postsCreate(){
        $data['title'] = 'Posts';
        $data['menu'] = 'posts';
        $data['submenu'] = 'create';
        $data['categories'] = Category::where('status','1')->get();
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create Post</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.posts.modify', $data);
    }

    public function postsSubmit(Request $request)
    {
        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'category_id.required' => 'Category is required.',
            'phone_no.required' => 'Phone Number is required',
            'image.required' => 'Image is required'
        ];
        $request->validate($rules, $msg);
        try {
            $data = $request->all();
            
            $post = Posts::create($data);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename  = $image->getClientOriginalName();
                $upload_path = $post->getUploadPath();
                $image->move($upload_path, $filename);
            } else {
                $filename = NULL;
            }
            $post->image = $filename;
            $post->save();
            \DB::commit();
            return back()->with('success_message', 'New Post created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }

    }
}
