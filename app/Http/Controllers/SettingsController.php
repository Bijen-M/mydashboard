<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Exception;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }
    public function index(){
        $data['title'] = 'Settings';
        $data['menu'] = 'settings';
        $data['submenu'] = 'edit';
        $data['sidebar'] = 'cms_sidebar';
        $data['breadcrumbs'] = '<li class="breadcrumb-item"><a href=" ' . route('cms.dashboard') . ' "><i class="ri-home-4-line"></i></a></li>';
        $data['breadcrumbs'] .= '<li class="breadcrumb-item active" aria-current="page">Settings</li>';
        $data['setting'] = Settings::first();
        return view('admin.cms_module.settings',$data);
    }
    
    public function update(Request $request, $id){
        
        $rules = [
            'site_email' => 'nullable|email:rfc,dns',
            'whatsapp' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'site_contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
        ];
        $msg = [
            'site_email.email' => 'Please enter a valid email.',
            'whatsapp.regex' => 'Please enter a valid contact number.',
            'site_contact.regex' => 'Please enter a valid contact number.',
        ];
        $request->validate($rules,$msg);
        \DB::beginTransaction();
        try{
        $data['setting'] = $settings = Settings::findOrFail($id);
        $settings->site_title = $request->site_title;
        $settings->contact_message = $request->contact_message;
        $settings->site_email = $request->site_email;
        $settings->site_address = $request->site_address;
        $settings->site_contact = $request->site_contact;
        $settings->site_google_map_link = $request->site_google_map_link;
        $settings->googlemappage = $request->googlemappage;
        $settings->footer_message = $request->footer_message;
        $settings->footer_about_us = $request->footer_about_us;
        $settings->copyright = $request->copyright;
        $settings->whatsapp = $request->whatsapp;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->update();
        if($request->hasFile('site_logo')){
            $image = $request->file('site_logo');
            if($settings->site_logo){
                $settings->removeSiteLogo();
            }
            $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
            $upload_path = $settings->getUploadPath();
            $image->move($upload_path, $filename);
            $settings->site_logo = $filename;
            $settings->save();
        }
        

        if($request->hasFile('contact_image')){
            $image = $request->file('contact_image');
            if($settings->contact_image){
                $settings->removeContactImage();
            }
            $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
            $upload_path = $settings->getUploadPath();
            $image->move($upload_path, $filename);
            $settings->contact_image = $filename;
            $settings->save();
        }
        if($request->hasFile('breadcrumb_image')){
            $image = $request->file('breadcrumb_image');
            if($settings->breadcrumb_image){
                $settings->removeBreadcrumbImage();
            }
            $filename  = time() . '-' . rand(1111,9999). '-' . $image->getClientOriginalName();
            $upload_path = $settings->getUploadPath();
            $image->move($upload_path, $filename);
            $settings->breadcrumb_image = $filename;
            $settings->save();
        }
       
        
        \DB::commit();
        return back()->with('success_message', 'Settings updated successfully!!!');
        } catch(Exception $e){
            \DB::rollback();
            return back()->with('error_message',$e->getMessage())->withInput();
        }
    }
}
