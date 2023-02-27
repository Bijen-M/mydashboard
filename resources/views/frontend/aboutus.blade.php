@extends('frontend.layouts.master')

@include('frontend.layouts.common.breadcrumbs')
@section('content')
    <main>
      <section class="about_content">
        <div class="container-fluid">
          <div class="about_main">
            <div class="row align-items-center">
              <div class="col* col-md-7 col-lg-7 about_left">
                <div class="title_head">
                  <h2><span>{{$aboutus_section_I->title}}</span></h2>
                </div>
                <div class="about_infos content_infos">
                  <h4>{{$aboutus_section_I->subtitle}}</h4>
                  <p>{{$aboutus_section_I->description}}</p>
                </div>

              </div>
             
              <div class="col* col-md-5 col-lg-5 about_right">
                <div class="about_fig content_fig">
                  <figure>
                    <img src="{{$aboutus_section_I->getAboutUsImageUrl()}}" class="w-100" alt="{{$aboutus_section_I->title}}">
                  </figure>
  
                  <div class="about_detailbtn">
                    <span>In Detail</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="about_mid">
            <div class="row align-items-center">
            
              <div class="col* col-md-4 col-lg-4 about_left">
                <div class="about_fig content_fig">
                  <figure>
                      <img src="{{$aboutus_section_II->getAboutUsImageUrl()}}" class="w-100" alt="{{$aboutus_section_II->title}}">
                  </figure>
  
                </div>
              </div>
  
              <div class="col* col-md-8 col-lg-8 about_right">
                <div class="title_head">
                  <h2><span>{{$aboutus_section_II->title}}</span></h2>
                </div>
                <div class="about_infos content_infos">
                  <p>{{$aboutus_section_II->description}}</p>
                </div>
  
              </div>
            </div>
          </div>

          <div class="about_short_info content_infos">
            <h4>{{$aboutus_section_III->title}}</h4>
            <p>{{$aboutus_section_III->description}}</p>
          </div>

          <div class="about_project_fig">
            <div class="row">
              @foreach ($aboutus_section_III->aboutUsImages as $image)
              <div class="col* col-sm-6 col-md-4 col-lg-4 mb-2">
                <figure>
                  <img src="{{$image->getAboutUsImageUrl()}}" alt="{{$image->aboutUs->title}}" class="w-100">
                </figure>
              </div>
              @endforeach
            
            </div>
          </div>

          <div class="about_get_touch gettouch_section">
            <h4>Everything for that ultimate feeling.</h4>
            <div class="row align-items-center">
              <div class="col* col-md-6 col-lg-6 image_section">
                <div class="product_wrapper">
                  <img src="images/touch.jpg" alt="title" class="img-fluid">
                </div>
              </div>
  
              <div class="col* col-md-6 col-lg-6 infos_section">
                <div class="content_infos_contact">
                  <p>Do you have building plans or do you want to know more about building costs? Let's get acquainted!</p>
                  <div class="theme_btn">
                    <a href="contact.html"><span>Get In Touch</span><i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
  
         
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

@endsection