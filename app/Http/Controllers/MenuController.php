<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Contracts\Session\Session;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $data['title'] = 'Posts';
        $data['menu'] = 'posts';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Menus</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['menuItems'] = MenuItem::orderBy('order')->get();

        // return view('menu.index', compact('menuItems'));
        return view('admin.cms_module.menu.menu', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (Menu::create($data)) {
            $newdata = Menu::orderby('id', 'DESC')->first();
            Session::flash('success', 'Menu saved successfully !');
            return redirect("manage-menus?id=$newdata->id");
        } else {
            return redirect()->back()->with('error', 'Failed to save menu !');
        }
    }
}
