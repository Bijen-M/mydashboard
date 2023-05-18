<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Contracts\Session\Session;
use App\Models\MenuItem;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class MenuController extends Controller
{
    public function index()
    {
        $data['title'] = 'Menu';
        $data['menu_class'] = 'menu';
        $data['submenu'] = 'menu';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Menus</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['menuItems'] = MenuItem::orderBy('sortorder','ASC')->get();
        $data['menus'] = Menu::where('parent_id', null)->orderBy('sortorder','ASC')->get();

        // return view('menu.index', compact('menuItems'));
        return view('admin.cms_module.menu.menu', $data);
    }
    public function create()
    {
        $data['title'] = 'Menu';
        $data['menu_class'] = 'menu';
        $data['submenu'] = 'menu';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('menus.index') . ' ">All Services</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Create New Service</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['menus'] = Menu::where('status','1')->orderBy('sortorder','ASC')->get();
        return view('admin.cms_module.menu.modify', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
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
            $data['type'] = $request->type;
            
            
            $slug = Str::slug( $request->title, '-');
            if($request->type=='services'){
                $data['slug']= 'services/' . $slug;
            } elseif($request->type=='static') {
                $data['slug']= $request->slug;
            } else {
                $data['slug'] = Str::slug( $request->title, '-');
            }
            $data['status'] = $request->status;
            $data['parent_id'] = $request->parent_id;
            Menu::create($data);
            
            
            \DB::commit();
            return back()->with('success_message', 'New Menu created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Menu';
        $data['menu_class'] = 'menu';
        $data['submenu'] = 'menu';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        
        $data['breadcrumbs'] .= '<li class="breadcrumb-item"><a href=" ' . route('menus.index') . ' ">All Menu</i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Edit</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['currentdata'] = Menu::where('id',$id)->where('status','1')->first();
        $data['menus'] = Menu::where('status','1')->orderBy('sortorder','ASC')->get();
        return view('admin.cms_module.menu.modify', $data);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::where('id',$id)->where('status','1')->first();
        $rules = [
            'title' => 'required',
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
            $menu->title = $request->title;
            $menu->status = $request->status;
            $menu->url = $request->url;
            $slug = Str::slug($request->title,'-');
            if($request->type=='services'){
                $menu->slug = 'services/' . $slug;
            } elseif($request->type=='static') {
                $menu->slug= $request->slug;
            } else {
                $menu->slug = Str::slug( $request->title, '-');
            }
            $menu->parent_id = $request->parent_id;
            $menu->update();
            \DB::commit();
            return back()->with('success_message', 'Menu updated successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
    public function children($id){
        $data['title'] = 'Menu';
        $data['menu_class'] = 'menu';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Menus</li>';
        $data['sidebar'] = 'cms_sidebar';
        $menu = Menu::where('id', $id)->orderBy('sortorder','ASC')->first();
        $data['menus'] = $menu->children;
        return view('admin.cms_module.menu.menu', $data);
    }

    function updateOrder(Request $request)
    {   
        $menus = Menu::all();
        foreach($menus as $menu)
        {
            $menu->timestamps = false;
            $id = $menu->id;
            foreach($request->sortorder as $order){
                if($order['id'] == $id){
                    $menu->update(['sortorder' => $order['position']]);
                }
            }
        }
        return response('Updated Successfully.', 200);
    }

    public function delete($id)
    {
        \DB::beginTransaction();

        try {
            $menu = Menu::where('id', $id)->where('status', '!=', '2')->first();
            if(count($menu->children) > 0) {
                return back()->with('error_message', 'Menu has active children and cannot be deleted!!!');
            } else {
                foreach($menu->children as $item){
                   $item->delete();
                }
            }
            $menu->delete();
            \DB::commit();
            return back()->with('success_message', 'Menu Deleted Successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }
}
