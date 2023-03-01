<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Banners';
        $data['menu'] = 'banner';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Banners</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['banners'] = Banner::all();
        return view('admin.cms_module.banners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Banners';
        $data['menu'] = 'banner';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('banners.index') . ' ">All Banners</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create New Banner</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.banners.modify', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'status.required' => 'Status is required.',
            'image.required' => 'Image is required'
        ];

        $request->validate($rules, $msg);
        try {
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['status'] = $request->status;
            $banner = Banner::create($data);

            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                $upload_path = $banner->getUploadPath();
                $image->move($upload_path, $filename);
            } else {
                $filename = NULL;
            }
            $banner->image = $filename;
            $banner->save();
            \DB::commit();
            return back()->with('success_message', 'New Banner created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Banners';
        $data['menu'] = 'banner';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('banners.index') . ' ">All Banners</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create New Banner</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['currentdata'] = Banner::findOrFail($id);
        return view('admin.cms_module.banners.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'status' => 'required',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'status.required' => 'Status is required.',
        ];

        $request->validate($rules, $msg);
        try {
            $banner = Banner::findOrFail($id);
        
            if($request->hasFile('image')){
                $banner->removeBannerImage();

                $image = $request->file('image');
                $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                $upload_path = $banner->getUploadPath();
                $banner->image = $filename;
                
                $image->move($upload_path, $filename);
                
            }
           
            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->status = $request->status;
            $banner->save();
            \DB::commit();
            return back()->with('success_message', 'Banner updated successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            $banner = Banner::findOrFail($id);
            $banner->removeBannerImage();
            $banner->delete();
            \DB::commit();
            return back()->with('success_message', 'Banner Deleted Successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
}
