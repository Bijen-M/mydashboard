<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AboutUsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'About Us';
        $data['menu'] = 'about-us';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">About Us Headings</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['aboutUs'] = AboutUs::all();
        return view('admin.cms_module.aboutus.index',$data);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'About Us';
        $data['menu'] = 'about-us';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('about-us.index') . ' ">All headings</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create New Heading</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.aboutus.modify', $data);
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
            'image' => 'max:3',
            'image.*' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'type' =>'required'
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'phone_no.required' => 'Phone Number is required',
            'image.*.required' => 'At least one Image is required',
            'image.*.image' => 'File must be an image',
            'image.max' => 'Only a maximum of 3 images can be uploaded',
            'type.required' => 'Type is required',
        ];
        $request->validate($rules, $msg);
        try {
            $data['title'] = $request->title;
            $data['subtitle'] = $request->subtitle;
            $data['description'] = $request->description;
            $data['type'] = $request->type;
            $aboutUs = AboutUs::create($data);
            
            
                if($request->file('image')){
                    $images = $request->file('image');
                    $upload_path = $aboutUs->getUploadPath();
                    if($aboutUs->type == '3')
                    {
                        foreach ($images as $image) {
                            $filename  = $image->getClientOriginalName();
                            $aboutUs->aboutUsImages()->create(['image' => $filename]);
                            $image->move($upload_path, $filename);
                            }
                    }
                    else
                    {
                    //   dd($images);
                        foreach ($images as $image) {
                        $filename = $image->getClientOriginalName();
                        $aboutUs->image = $filename;
                        $image->move($upload_path, $filename);
                     }
                    }
                }
            $aboutUs->save();
            \DB::commit();
            return back()->with('success_message', 'About us created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'About Us';
        $data['menu'] = 'about-us';
        $data['submenu'] = 'edit';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('about-us.index ') . ' ">All headings</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create New Heading</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['currentdata'] = AboutUs::findOrFail($id);
        return view('admin.cms_module.aboutus.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'image' => 'max:3',
            'image.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'phone_no.required' => 'Phone Number is required',
            'image.*.image' => 'File must be an image',
            'image.max' => 'Only a maximum of 3 images can be uploaded',
        ];
        $request->validate($rules, $msg);
        try {
            
            $aboutUs = AboutUs::findOrFail($id);

            $aboutus_images = AboutUsImages::where('aboutus_id',$id)->get();
            
            
            if($request->file('image')){
                foreach ( $aboutus_images as $image) {
                    $image->removeAboutUsImages();
                }
                $aboutUs->removeAboutUsImage();
                $aboutUs->aboutUsImages()->delete();
                $images = $request->file('image');
                $upload_path = $aboutUs->getUploadPath(); 
                if($aboutUs->type == '3')
                {
                    foreach($images as $image) {
                        $filename  = $image->getClientOriginalName();
                        $aboutUs->aboutUsImages()->create(['image'=> $filename]);
                        $image->move($upload_path, $filename);
                        }
                }
                else
                {
                    foreach ($images as $image) {
                        $filename = $image->getClientOriginalName();
                        $aboutUs->image = $filename;
                        $image->move($upload_path, $filename);
                    }
                }
            }
            $aboutUs->title = $request->title;
            $aboutUs->subtitle = $request->subtitle;
            $aboutUs->description = $request->description;
            $aboutUs->type = $request->type;
            $aboutUs->save();
            \DB::commit();
            return back()->with('success_message', 'About us updated successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            $aboutUs = AboutUs::findOrFail($id);
            if($aboutUs->aboutUsImages->count() > 0){
                $aboutUsImages = $aboutUs->aboutUsImages;
                // delete associated aboutUs images
                foreach($aboutUsImages as $aboutUsImage){
                    if (is_file('storage/aboutUs/' . $aboutUsImage->image)) {
                        unlink('storage/aboutUs/'.$aboutUsImage->image);
                    }
                    $aboutUsImage->delete();
                }
            }
            $aboutUs->delete();
            \DB::commit();
            return back()->with('success_message', 'Banner Deleted Successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
}
