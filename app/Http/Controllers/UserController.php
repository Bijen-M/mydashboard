<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'User';
        $data['menu'] = 'user';
        $data['submenu'] = 'index';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">User</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['users'] = User::all();
        return view('admin.cms_module.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'User';
        $data['menu'] = 'user';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">User</li>';
        $data['sidebar'] = 'cms_sidebar';
        return view('admin.cms_module.user.modify',$data);
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
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
        ];
        $msg = [
            'name.required' => 'Name is required.',
            'email.unique' => 'Email has already been used',
            'password.required' => 'password is required.',
            'password.min' => 'Password must be atleast 8 characters.',
        ];

        $request->validate($rules, $msg);
        \DB::beginTransaction();
        try {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            // $password = $request->password;
            $data['password'] = bcrypt($request->password);
            User::create($data);
            \DB::commit();
            return back()->with('success_message', 'New User created successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['title'] = 'User';
        $data['menu'] = 'user';
        $data['submenu'] = 'create';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">User</li>';
        $data['sidebar'] = 'cms_sidebar';
        $data['currentdata'] = $user;
        return view('admin.cms_module.user.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
        ];
        $msg = [
            'name.required' => 'Name is required.',
            'email.unique' => 'Email has already been used',
        ];
        $request->validate($rules, $msg);
        if ($user->email != $request->email) {
            $rules = [
                'email' => 'unique:users'
            ];
            $msg = [
                'email.unique' => 'Email has already been used'
            ];
            $request->validate($rules, $msg);
        }
        if ($request->password) {
            $rules = ['password' => 'min:8'];
            $request->validate($rules);
        }


        \DB::beginTransaction();
        try {

            // Check if the password field is set in the request
            if (isset($request->password)) {
                // If the password field is set, create an array with the user's email, password, and login link
                
                //    $user->email = $request->email;
                   $user->password  = bcrypt($request->password);
                

                // Set the checkemptypassword variable to false
                $checkemptypassword = false;
            } else {
                // If the password field is not set, set the checkemptypassword variable to true and use the user's current password
                $checkemptypassword = true;
                $request->merge(['password' => $user->password]);
            }

            // Hash the password field using bcrypt
            $request->merge(['password' => bcrypt($request->password)]);

            // Update the user record with the merged request data
            $user->update($request->all());

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            \DB::commit();
            return back()->with('success_message', 'User updated successfully!!!');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
