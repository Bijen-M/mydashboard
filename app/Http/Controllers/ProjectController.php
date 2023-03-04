<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectTypeIndex()
    {
        $data['title'] = 'Project Type';
        $data['menu'] = 'projecttype';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Project Type</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['project_types'] = ProjectType::all();
        return view('admin.cms_module.project_type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectTypeCreate()
    {
        $data['title'] = 'Project Type';
        $data['menu'] = 'projecttype';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Project Type</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.project_type.modify',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function projectTypeStore(Request $request)
    {
        $rules = [
            'title' => ['required', Rule::unique('project_types')],
            'status' => 'required',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'title.unique' => 'Service has already been created',
            'status.required' => 'Status is required.',
        ];

        $request->validate($rules, $msg);
        \DB::beginTransaction();
        try {
            $data['title'] = $request->title;
            $data['slug'] = Str::slug( $request->title, '-');
            $data['status'] = $request->status;
            ProjectType::create($data);
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function projectTypeshow(ProjectType $projectType)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function projectTypeEdit(ProjectType $projectType)
    {
        $data['title'] = 'Project Type';
        $data['menu'] = 'projecttype';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Project Type</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['project_type'] = $projectType;
        return view('admin.cms_module.project_type.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function projectTypeUpdate(Request $request, ProjectType $projectType)
    {

        $rules = [
            'title' => ['required', Rule::unique('project_types')],
            'status' => 'required',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'title.unique' => 'Project type has already been created',
            'status.required' => 'Status is required.',
        ];

        $request->validate($rules, $msg);
        \DB::beginTransaction();
        try {
            $projectType->title = $request->title;
            $projectType->slug = Str::slug($request->title, '-');
            $projectType->status = $request->status;
            $projectType->save();
            \DB::commit();
            return back()->with('success_message', 'New Project Type created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function projectTypeDestroy($id)
    {
        $projectType = ProjectType::findOrFail($id);
        \DB::beginTransaction();
        try {
            $projectType->delete();
            \DB::commit();
            return back()->with('success_message', 'Project Type Deleted Successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    public function index()
    {
        $data['title'] = 'Projects';
        $data['menu'] = 'projects';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">projects</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['projects'] = Project::all();
        return view('admin.cms_module.projects.index',$data);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Projects';
        $data['menu'] = 'projects';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('projects.index') . ' ">All projects</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create New Project</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['project_type'] = ProjectType::where('status','1')->get();
        return view('admin.cms_module.projects.modify', $data);
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
            'title' => ['required', Rule::unique('projects')],
            'status' => 'required',
            'year' => 'required',
            'architect' => 'required',
            'coverimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image' => 'max:5|min:2',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'title.unique' => 'Service has already been created',
            'status.required' => 'Status is required.',
            'year.required' => 'Year is required.',
            'architect.required' => 'Architect is required.',
            'image.required' => 'Image is required',
            'coverimage.required' => 'Cover Image is required',
            'image.*.image' => 'File must be an image',
            'coverimage.image' => 'File must be an image',
            'image.*.max:5' => 'Only a maximum of 5 images can be uploaded',
            'image.*.min' => 'At least 2 images should be uploaded'
        ];

        $request->validate($rules, $msg);
        \DB::beginTransaction();
        try {
            $data['title'] = $request->title;
            $data['year'] = $request->year;
            $data['description'] = $request->description;
            $data['fk_project_type'] = $request->fk_project_type;
            $data['slug'] = Str::slug( $request->title, '-');
            $data['architect'] = $request->architect;
            $data['year'] = $request->year;
            $data['status'] = $request->status;
            $project = Project::create($data);

            if($request->hasFile('coverimage')){
                $image = $request->file('coverimage');
                $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                $upload_path = $project->getUploadPath();
                $image->move($upload_path, $filename);
            } else {
                $filename = NULL;
            }
            $project->coverimage = $filename;
            if($request->hasFile('image')){
                $images = $request->file('image');
                $upload_path = $project->getUploadPath();
                foreach($images as $image){
                    $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                    $project->projectImages()->create(['title'=> $project->title,'image'=> $filename, 'fk_project' => $project->id]);
                    $image->move($upload_path, $filename);
                }
            } else {
                return back()->with('error_message', 'Please upload at least one image');
            }
            $project->save();
            
            
            \DB::commit();
            return back()->with('success_message', 'New project created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data['title'] = 'Projects';
        $data['menu'] = 'projects';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('projects.index') . ' ">All Projects</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Edit</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['currentdata'] = $project;
        $data['project_type'] = ProjectType::where('status','1')->get();
        return view('admin.cms_module.Projects.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules = [
            'title' => ['required', Rule::unique('projects')->ignore($project)],
            'status' => 'required',
            'year' => 'required',
            'architect' => 'required',
            'coverimage' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image' => 'max:5|min:2',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'title.unique' => 'Service has already been created',
            'status.required' => 'Status is required.',
            'year.required' => 'Year is required.',
            'architect.required' => 'Architect is required.',
            'image.*.image' => 'File must be an image',
            'coverimage.image' => 'File must be an image',
            'image.*.max:5' => 'Only a maximum of 5 images can be uploaded',
            'image.*.min' => 'At least 2 images should be uploaded'
        ];

        $request->validate($rules, $msg);
        $project_images = Image::where('fk_project', $project->id)->get();
        \DB::beginTransaction();
        try {
           
            

            if($request->hasFile('coverimage')){
                $project->removeProjectImage();
                $image = $request->file('coverimage');
                $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                $upload_path = $project->getUploadPath();
                $image->move($upload_path, $filename);
                $project->coverimage = $filename;
            } 
            
            if($request->hasFile('image')){

                foreach ($project_images as $image) {
                    $image->removeProjectImages();
                }
                $project->projectImages()->delete();
                
                $images = $request->file('image');
                $upload_path = $project->getUploadPath();
                foreach($images as $image){
                    $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
                    $project->projectImages()->create(['title'=> $project->title,'image'=> $filename, 'fk_project' => $project->id]);
                    $image->move($upload_path, $filename);
                }
            }

            $project->title = $request->title;
            $project->year = $request->year;
            $project->description = $request->description;
            $project->fk_project_type = $request->fk_project_type;
            $project->slug = Str::slug( $request->title, '-');
            $project->architect = $request->architect;
            $project->year = $request->year;
            $project->status = $request->status;
            $project->save();
            
            \DB::commit();
            return back()->with('success_message', 'Project created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        \DB::beginTransaction();
        try {
            $projectImages = $project->projectImages;
            if($projectImages->count() > 0){
                
                // delete associated project images
                foreach($projectImages as $projectImage){
                    if (is_file('storage/projects/' . $projectImage->image)) {
                        unlink('storage/projects/'.$projectImage->image);
                    }
                    $projectImages->delete();
                }
            }
            $project->delete();
            \DB::commit();
            return back()->with('success_message', 'Service Deleted Successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
}
