<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Vacancy';
        $data['menu'] = 'vacancy';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Project Type</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['vacancies'] = Vacancy::all();
        return view('admin.cms_module.vacancy.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Vacancy';
        $data['menu'] = 'vacancy';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Project Type</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.vacancy.modify',$data);
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
            'title' => ['required', Rule::unique('vacancies')],
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
            $data['subtitle'] = $request->subtitle;
            $data['subtitle_s'] = $request->subtitle_s;
            $data['slug'] = Str::slug( $request->title, '-');
            $data['status'] = $request->status;
            $data['description'] = json_encode($request->description);
            $data['description_s'] = json_encode($request->description_s);
            // $data['description'] = serialize($request->description);
            Vacancy::create($data);
            \DB::commit();
            return back()->with('success_message', 'New Vacancy created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        $data['title'] = 'Vacancy';
        $data['menu'] = 'vacancy';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' ">CMS Dashboard</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('vacancy.index') . ' ">All Vacancys</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Edit Vacancy</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['currentdata'] = $vacancy;
        return view('admin.cms_module.vacancy.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $rules = [
            'title' => ['required', Rule::unique('vacancies')->ignore($vacancy)],
            'status' => 'required',
        ];
        $msg = [
            'title.required' => 'Title is required.',
            'status.required' => 'Status is required.',
        ];

        $request->validate($rules, $msg);

        \DB::beginTransaction();
        try {
            
            $vacancy->title = $request->title;
            $vacancy->subtitle = $request->subtitle;
            $vacancy->subtitle_s = $request->subtitle_S;
            $vacancy->description = json_encode($request->description); 
            $vacancy->description_s = json_encode($request->description_s); 
            $vacancy->status = $request->status;
            $vacancy->save();
            \DB::commit();
            return back()->with('success_message', 'Vacancy updated successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
       $vacancy = Vacancy::findOrFail($id);
            $vacancy->delete();
            \DB::commit();
            return back()->with('success_message', 'Vacancy Deleted Successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
}
