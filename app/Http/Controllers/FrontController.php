<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\Banner;
class FrontController extends Controller
{
    protected $about_us_section_I=1;
    protected $about_us_section_II=2;
    protected $about_us_page_multiple_images = 3;
    

    public function index()
    {
        $data['aboutus_section_I'] = AboutUs::where('type',$this->about_us_section_I)->latest()->first();
        $data['aboutus_section_II'] = AboutUs::where('type',$this->about_us_section_II)->latest()->first();
        $data['banners'] = Banner::where('status', '1')->get();
        return view('frontend.homepage', $data);
    }

    public function aboutUs()
    {
        $data['title'] = 'About Us';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">About Us</li>';
        $data['aboutus_section_I'] = AboutUs::where('type',$this->about_us_section_I)->latest()->first();
        $data['aboutus_section_II'] = AboutUs::where('type',$this->about_us_section_II)->latest()->first();
        $data['aboutus_section_III'] = AboutUs::where('type',$this->about_us_page_multiple_images)->latest()->first();
      
        return view('frontend.aboutus',$data);
    }
}
