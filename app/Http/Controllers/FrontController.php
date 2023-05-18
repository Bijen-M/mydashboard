<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\ContactUs;
use App\Models\Image;
use App\Models\Service;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Settings;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    protected $about_us_section_I=1;
    protected $about_us_section_II=2;
    protected $about_us_page_multiple_images = 3;
    protected $setting;

    public function __construct(Settings $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $data['aboutus_section_I'] = AboutUs::where('type',$this->about_us_section_I)->latest()->first();
        $data['aboutus_section_II'] = AboutUs::where('type',$this->about_us_section_II)->latest()->first();
        $data['banners'] = Banner::where('status', '1')->get();
        $data['services'] = Service::where('status', '1')->get();
        $data['project_first'] = Project::where('status', '1')->latest()->take(1)->first();
        $data['project_second'] = Project::where('status', '1')->latest()->skip(1)->take(1)->first();
        $data['project_third'] = Project::where('status', '1')->latest()->skip(2)->take(1)->first();
        $data['project_current_first'] = Project::where('status', '1')->where('is_current','1')->first();
        $data['project_current_second'] = Project::where('status', '1')->where('is_current','1')->skip(1)->first();
        $data['setting'] = $this->setting->first();
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
        $data['setting'] = $this->setting->first();
        return view('frontend.aboutus',$data);
    }

    public function serviceDetail($slug)
    {
        $data['title'] = 'Services';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Service</li>';
        $data['service'] = $service = Service::where('slug', $slug)->first();
        if (!$data['service']) {
            abort(404);
        }
        $data['service_images'] = Image::where('fk_service',$service->id)->get();
        $data['setting'] = $this->setting->first();
        return view('frontend.service_detail', $data);
    }

    public function projectList()
    {
        $data['title'] = 'Projects';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Project</li>';
        $data['project_type'] = ProjectType::where('status','1')->get();
        $data['projects'] =  Project::where('status', '1')->get();
        $data['setting'] = $this->setting->first();
        return view('frontend.project_list', $data);
    }
    
    public function projectDetail($slug)
    {
        $data['title'] = 'Projects';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('projects.list') . ' ">All Projects</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Project Detail</li>';
        $data['project'] = $project = Project::where('slug', $slug)->first();
        if (!$data['project']) {
            abort(404);
        }
        $data['project_images'] = Image::where('fk_project',$project->id)->get();
        $data['setting'] = $this->setting->first();
        return view('frontend.project_detail', $data);
    }

    public function contactUs()
    {
        $data['title'] = 'Contact Us';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Contact Us</li>';
        $data['setting'] = $this->setting->first();
        return view('frontend.contactus', $data);
    }



    public function contactUsStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        \DB::beginTransaction();
        try {
            ContactUs::create([
                'full_name' => $request->full_name,
                'subject' => $request->subject,
                'email' => $request->email,
                'description' => $request->description,

            ]);
        $details = [
            'title' => 'Customer Mail',
            'full_name' => $request->full_name,
            'subject' => $request->subject,
            'email' => $request->email
        ];
    
        Mail::to($request->email)->send(new ContactEmail($details));
            \DB::commit();
        return response()->json(['success' => 'Message sent successfully! We\'ll contact you soon.']);
        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
            
        }
    }

    public function vacancy()
    {
        $data['title'] = 'Career';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Career</li>';
        $data['vacancies'] = Vacancy::where('status','1')->get();
        $data['setting'] = $this->setting->first();
        return view('frontend.vacancy', $data);
    }
}
