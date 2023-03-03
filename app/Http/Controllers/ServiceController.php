<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Services';
        $data['menu'] = 'services';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Services</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['services'] = Service::all();
        return view('admin.cms_module.services.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Services';
        $data['menu'] = 'services';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('services.index') . ' ">All Services</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create New Service</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.services.modify', $data);
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
            'title' => ['required', Rule::unique('services')],
            'status' => 'required',
            'description' => 'required',
            'coverimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image' => 'max:2|min:2',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'title.unique' => 'Service has already been created',
            'status.required' => 'Status is required.',
            'Description.required' => 'Description is required.',
            'image.*.required' => 'Image is required',
            'coverimage.required' => 'Cover Image is required',
            'image.*.image' => 'File must be an image',
            'coverimage.image' => 'File must be an image',
            'image.*.max:2' => 'Only a maximum of 2 images can be uploaded',
            'image.*.min' => 'At least 2 images should be uploaded'
        ];

        $request->validate($rules, $msg);
        \DB::beginTransaction();
        try {
            $data['title'] = $request->title;
            $data['slug'] = Str::slug( $request->title, '-');
            $data['description'] = $request->description;
            $data['status'] = $request->status;
            $service = Service::create($data);

            if($request->hasFile('coverimage')){
                $image = $request->file('coverimage');
                $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                $upload_path = $service->getUploadPath();
                $image->move($upload_path, $filename);
            } else {
                $filename = NULL;
            }
            $service->coverimage = $filename;
            $service->save();
            if($request->hasFile('image')){
                $images = $request->file('image');
                $upload_path = $service->getUploadPath();
                foreach($images as $image){
                    $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                    $service->serviceImages()->create(['title'=> $service->title,'image'=> $filename, 'fk_service' => $service->id]);
                    $image->move($upload_path, $filename);
                }
            } else {
                $filename = NULL;
            }
            
            
            \DB::commit();
            return back()->with('success_message', 'New Service created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */

    public function edit(Service $service)
    {
        $data['title'] = 'Services';
        $data['menu'] = 'services';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('services.index') . ' ">All Services</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Edit</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['currentdata'] = $service;
        return view('admin.cms_module.services.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'title' => ['required', Rule::unique('services')->ignore($service)],
            'status' => 'required',
            'image' => 'max:2|min:2',
            'description' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'coverimage' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'status.required' => 'Status is required.',
            'title.unique' => 'Service has already been created',
            'Description.required' => 'Description is required.',
            'image.*.image' => 'File must be an image',
            'coverimage.image' => 'File must be an image',
            'image.max:2' => 'Only a maximum of 2 images can be uploaded',
            'image.min' => 'At least 2 images should be uploaded',
        ];

        $request->validate($rules, $msg);
        $service_images = Image::where('fk_service', $service->id)->get();
        \DB::beginTransaction();
        try {
            if($request->hasFile('coverimage')){
                $service->removeServiceImage();
                $image = $request->file('coverimage');
                $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                $upload_path = $service->getUploadPath();
                $image->move($upload_path, $filename);
                $service->coverimage = $filename;
            } 
            
            if($request->hasFile('image')){

                foreach ($service_images as $image) {
                    $image->removeServiceImages();
                }
                $service->serviceImages()->delete();
                
                $images = $request->file('image');
                $upload_path = $service->getUploadPath();
                foreach($images as $image){
                    $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                    $service->serviceImages()->create(['title'=> $service->title,'image'=> $filename, 'fk_service' => $service->id]);
                    $image->move($upload_path, $filename);
                }
            }

            $service->title = $request->title;
            $service->description = $request->description;
            $service->status = $request->status;
            $service->slug = Str::slug($request->title,'-');
            $service->save();
            \DB::commit();
            return back()->with('success_message', 'Service updated successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        \DB::beginTransaction();
        try {
            $serviceImages = $service->serviceImages;
            if($serviceImages->count() > 0){
                
                // delete associated service images
                foreach($serviceImages as $serviceImage){
                    if (is_file('storage/services/' . $serviceImage->image)) {
                        unlink('storage/services/'.$serviceImage->image);
                    }
                    $serviceImages->delete();
                }
            }
            $service->delete();
            \DB::commit();
            return back()->with('success_message', 'Service Deleted Successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
}
