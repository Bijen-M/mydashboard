@extends('frontend.layouts.master')

  
@section('content')
    @if(count($banners)>0)
      <section class="banner_col">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper bannerSlider">
        <div class="swiper-wrapper">
          @foreach ($banners as $banner)
          <div class="swiper-slide">
            <figure>
              <img src="{{$banner->getBannerImageUrl()}}" alt="{{$banner->title}}" class="w-100">
              <div class="banner_content">
                <div class="container">
                  <div class="banner_infos position-absolute">
                    <div class="banner_title">
                      <h2>{{$banner->title}}</h2>
                    </div>

                  </div>
                </div>
              </div>
            </figure>
          </div>
          @endforeach
        
          
        </div>
        <div class="swiper-pagination"></div>
      </div>
      </section>
    @endif

    <main>
      <section id="about_us" class="about_us section_top">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col* col-md-8 col-lg-8 about_left">
              <div class="title_head">
                <h2><span>{{$aboutus_section_I->title}}</span></h2>
              </div>
              <div class="about_infos content_infos">
                <h4>{{$aboutus_section_I->subtitle}} </h4>
                <p>{{$aboutus_section_I->description}} </p>
              </div>

              <div class="theme_btn">
                <a href="{{route('aboutus')}}"><span>Our Story</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4 about_right">
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
      </section>

      <section id="construction_section" class="construction_sec section_top">
        <div class="container-fluid">
          <div class="title_head">
            <h2>Current construction project</h2>
            <div class="view_btn">
              <a href="#" class="btn btn_theme_outline">view all</a>
            </div>
          </div>

          <div class="row">
            <div class="col* col-md-6 col-lg-6 construction_list">
              <div class="construction_block product_block">
                <a href="construction-detail.html">
                  <div class="construction_wrapper product_wrapper">
                    <div class="construction_fig product_fig" style="background:url(images/1.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="construction_infos_col product_infos_col">
                  <div class="construction_infos_flex product_infos_flex">
                    <div class="construction_info_left product_info_left">
                      <span class="product_head">New Construction</span>
                      <h2><a href="construction-detail.html">Contemporary prairie style</a></h2>
                      <span class="construction_type">Arcen</span>
                    </div>
                    <div class="construction_info_right product_info_right">
                      <div class="construction_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col* col-md-6 col-lg-6 construction_list pt-8">
              <div class="construction_block product_block">
                <a href="construction-detail.html">
                  <div class="construction_wrapper product_wrapper">
                    <div class="construction_fig product_fig" style="background:url(images/2.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="construction_infos_col product_infos_col">
                  <div class="construction_infos_flex product_infos_flex">
                    <div class="construction_info_left product_info_left">
                      <span class="product_head">New Construction</span>
                      <h2><a href="construction-detail.html">Contemporary prairie style</a></h2>
                      <span class="construction_type">Arcen</span>
                    </div>
                    <div class="construction_info_right product_info_right">
                      <div class="construction_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="quality_content" class="quality_content section_top">
        <div class="container-fluid">
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
                <h4>{{$aboutus_section_II->subtitle}}</h4>
                <p>{{$aboutus_section_II->description}} </p>
              </div>

            </div>
          </div>
        </div>
      </section>

      @if (count($services)>0)
      <section id="services_section" class="services_sec section_top">
        <div class="container-fluid">
          <div class="title_head">
            <h2>Our Services</h2>
        
          </div>

          <div class="row">
          @foreach ($services as $service)

            <div class="col* col-md-6 col-lg-3 service_list">
              <div class="service_block product_block">
                <a href="{{route('service.detail', $service->slug)}}">
                  <div class="service_wrapper product_wrapper">
                    <div class="service_fig product_fig" style="background:url({{$service->getServiceImageUrl()}}) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="service_infos_col product_infos_col">
                  <div class="service_infos_flex product_infos_flex">
                    <div class="service_info_left product_info_left">
                      <h2><a href="{{route('service.detail', $service->slug)}}">{{$service->title}}</a></h2>
                    </div>
                    <div class="service_info_right product_info_right">
                      <div class="service_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            {{-- <div class="col* col-md-6 col-lg-3 service_list">
              <div class="service_block product_block">
                <a href="service-detail.html">
                  <div class="service_wrapper product_wrapper">
                    <div class="service_fig product_fig" style="background:url(images/2.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="service_infos_col product_infos_col">
                  <div class="service_infos_flex product_infos_flex">
                    <div class="service_info_left product_info_left">
                      <h2><a href="service-detail.html">Engineer</a></h2>
                    </div>
                    <div class="service_info_right product_info_right">
                      <div class="service_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col* col-md-6 col-lg-3 service_list">
              <div class="service_block product_block">
                <a href="service-detail.html">
                  <div class="service_wrapper product_wrapper">
                    <div class="service_fig product_fig" style="background:url(images/3.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="service_infos_col product_infos_col">
                  <div class="service_infos_flex product_infos_flex">
                    <div class="service_info_left product_info_left">
                      <h2><a href="service-detail.html">Planner</a></h2>
                    </div>
                    <div class="service_info_right product_info_right">
                      <div class="service_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col* col-md-6 col-lg-3 service_list">
              <div class="service_block product_block">
                <a href="service-detail.html">
                  <div class="service_wrapper product_wrapper">
                    <div class="service_fig product_fig" style="background:url(images/4.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="service_infos_col product_infos_col">
                  <div class="service_infos_flex product_infos_flex">
                    <div class="service_info_left product_info_left">
                      <h2><a href="service-detail.html">Vasu Sastra</a></h2>
                    </div>
                    <div class="service_info_right product_info_right">
                      <div class="service_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

          </div>
        </div>
      </section>
      @endif

      <section id="project_section" class="project_section section_top">
        <div class="container-fluid">
          <div class="title_head">
            <h2>Recent Projects</h2>
            <div class="view_btn">
              <a href="#" class="btn btn_theme_outline">view all project</a>
            </div>
          </div>

          <div class="row align-items-center">
            <div class="col* col-md-6 col-lg-6 project_list">
              <div class="project_block product_block">
                <a href="project-detail.html">
                  <div class="project_wrapper product_wrapper">
                    <div class="project_fig product_fig" style="background:url(images/3.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="project_infos_col product_infos_col">
                  <div class="project_infos_flex product_infos_flex">
                    <div class="project_info_left product_info_left">
                      <span class="product_head">New project</span>
                      <h2><a href="project-detail.html">Modern Villa</a></h2>
                      <span class="project_date">2022</span>
                    </div>
                    <div class="project_info_right product_info_right">
                      <div class="project_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col* col-md-6 col-lg-6 project_list">
              <div class="project_block product_block">
                <div class="project_infos_col product_infos_col">
                  <div class="project_infos_flex product_infos_flex">
                    <div class="project_info_left product_info_left">
                      <span class="product_head">New project</span>
                      <h2><a href="project-detail.html">Modern Villa</a></h2>
                      <span class="project_date">2022</span>
                    </div>
                    <div class="project_info_right product_info_right">
                      <div class="project_line product_line"></div>
                    </div>
                  </div>
                </div>

                <a href="project-detail.html">
                  <div class="project_wrapper product_wrapper">
                    <div class="project_fig product_fig" style="background:url(images/4.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                
              </div>

              <div class="project_block product_block">
                <a href="project-detail.html">
                  <div class="project_wrapper product_wrapper">
                    <div class="project_fig product_fig" style="background:url(images/5.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="project_infos_col product_infos_col">
                  <div class="project_infos_flex product_infos_flex">
                    <div class="project_info_left product_info_left">
                      <span class="product_head">New project</span>
                      <h2><a href="project-detail.html">Modern Villa</a></h2>
                      <span class="project_date">2022</span>
                    </div>
                    <div class="project_info_right product_info_right">
                      <div class="project_line product_line"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <section id="gettouch_section" class="gettouch_section section_top">
        <div class="container-fluid">
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
      </section>
    </main>
@endsection
