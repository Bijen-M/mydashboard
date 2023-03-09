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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        $data['services'] = Service::where('status', '1')->get();
        $data['project_first'] = Project::where('status', '1')->latest()->take(1)->first();
        $data['project_second'] = Project::where('status', '1')->latest()->skip(1)->take(1)->first();
        $data['project_third'] = Project::where('status', '1')->latest()->skip(2)->take(1)->first();
        $data['project_current_first'] = Project::where('status', '1')->where('is_current','1')->first();
        $data['project_current_second'] = Project::where('status', '1')->where('is_current','1')->skip(1)->first();
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

    public function serviceDetail($slug)
    {
        $data['title'] = 'Services';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Service</li>';
        $data['service'] = $service = Service::where('slug', $slug)->first();
        $data['service_images'] = Image::where('fk_service',$service->id)->get();
        return view('frontend.service_detail', $data);
    }

    public function projectList()
    {
        $data['title'] = 'Projects';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Project</li>';
        $data['project_type'] = ProjectType::where('status','1')->get();
        $data['projects'] =  Project::where('status', '1')->get();
        return view('frontend.project_list', $data);
    }
    
    public function projectDetail($slug)
    {
        $data['title'] = 'Projects';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('projects.list') . ' ">All Projects</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Project Detail</li>';
        $data['project'] = $project = Project::where('slug', $slug)->first();
        $data['project_images'] = Image::where('fk_project',$project->id)->get();
        return view('frontend.project_detail', $data);
    }

    public function contactUs()
    {
        $data['title'] = 'Contact Us';
        $data['breadcrumb'] = '<li class="breadcrumb-item"><a href=" ' . route('home') . ' ">Home</a></li>';
        $data['breadcrumb'].= '<li class="breadcrumb-item active" aria-current="page">Contact Us</li>';
        return view('frontend.contactus', $data);
    }



    public function contactUsStore(Request $request)
    {
        // return response()->json(['success' => 'Message sent successfully! We\'ll contact you soon.']);
        $validator = Validator::make($request->all(),[
            'full_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required',
        ]);
        // dd('here');
        // $rules = [
        //     'full_name' => 'required',
        //     'email' => 'required|email:rfc,dns',
        //     'subject' => 'required',
        // ];
        // $msg = [
        //     'full_name.required' => 'Name is required.',
        //     'full_name.unique' => 'Service has already been created',
        //     'email.required' => 'Email is required.',
        //     'subject.required' => 'Subject is required.'
        // ];

        // $request->validate($rules, $msg);
        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        // \DB::beginTransaction();
        try {
            // $data['full_name'] = $request->full_name;
            // $data['email'] = $request->email;
            // $data['status'] = $request->status;
            // $data['subject'] = $request->subject;
            // $data['description'] = $request->description;
            // $contactUs = ContactUs::create($data);
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
    
        Mail::to('bzn1992@gmail.com')->send(new ContactEmail($details));
            // \DB::commit();
            // return back()->with('success_message', 'Message sent successfully! We\'ll contact you soon.');
        return response()->json(['success' => 'Message sent successfully! We\'ll contact you soon.']);
        } catch (\Exception $e) {
            // \DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
            // return back()->with('error_message', $e->getMessage());
        }
    }
}
