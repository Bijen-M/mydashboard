<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href="#"><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Dashboard</li>';
        

        return view('admin.dashboard.dashboard', $data);
    }

    public function cms_module()
    {
        $data['title'] = 'CMS Dashboard';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">CMS Dashboard</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['projects'] = Project::where('status','1')->get();
        

        return view('admin.cms_module.cms_dashboard', $data);
    }
}
