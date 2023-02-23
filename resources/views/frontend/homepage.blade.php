<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
    <link href="{{asset('frontend/fonts/bootstrapicon/font/bootstrap-icons.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/fonts.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" type="text/css" rel="stylesheet">
  </head>
  <body>

    <header>
      <section class="sticky_header header_menu_col">
        <div class="header_menu">
          <div class="container-fluid">
            <a href="index.html" class="mobile_logo">
              <img src="images/logo.png" class="img-fluid" alt="title">
            </a>
            <div class="header_main">
              <div class="sidemenu sidemenu-1 d-lg-none d-md-block">
                <a class="open" href="javascript:void(0)"><i class="bi bi-list"></i></a>
              </div>

              <div class="main-menu">
               
                <nav id="mobile-menu" class="p-0 d-flex align-items-center navbar navbar-expand-md navbar-light">
                  
                  <a href="index.html" class="desktop_logo">
                    <img src="images/logo.png" class="img-fluid" alt="title">
                  </a>
                  <ul class="navbar-nav">
                    <li><a href="index.html">Home </a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li class="menu-item-has-children"><a href="javascript:void(0)">Services</a>
                      <ul class="sub-menu">
                          <li><a href="service-detail.html">Architect </a></li>
                          <li><a href="service-detail.html">Engineer</a></li>
                          <li><a href="service-detail.html">Planner</a></li>
                          <li><a href="service-detail.html">Vastu Sastra</a></li>
                      </ul>
                    </li>
                    <li><a href="project-list.html">Projects</a></li>
                    <li><a href="vacancy.html">Vacancy</a></li>
                    <li><a href="contact.html">Contact Us </a></li>
                    
                  </ul>
  
                  
                </nav>
              </div>
             
            </div>
          </div>
        </div>
      </section>
    </header>

    <div class="fixes">
      <div class="side-info">
        <button class="side-info-close"><i class="bi bi-x-lg"></i></button>
        <div class="side-info-content">
            <div class="mobile-menu"></div>
            
        </div>
      </div>
    </div>

    <div class="offcanvas-overlay"></div>

    <section class="banner_col">
      <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper bannerSlider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <figure>
            <img src="images/slider.jpg" alt="title" class="w-100">
            <div class="banner_content">
              <div class="container">
                <div class="banner_infos position-absolute">
                  <div class="banner_title">
                    <h2>Innovation start with a dream and a plan</h2>
                  </div>

                </div>
              </div>
            </div>
          </figure>
        </div>

        <div class="swiper-slide">
          <figure>
            <img src="images/slider1.jpg" alt="title" class="w-100">
            <div class="banner_content">
              <div class="container">
                <div class="banner_infos position-absolute">
                  <div class="banner_title">
                    <h2>Innovation start with a dream and a plan</h2>
                  </div>
  
                </div>
              </div>
            </div>
          </figure>
        </div>
        
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </section>

    <main>
      <section id="about_us" class="about_us section_top">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col* col-md-8 col-lg-8 about_left">
              <div class="title_head">
                <h2><span>Aarshi Associates Builds</span></h2>
              </div>
              <div class="about_infos content_infos">
                <h4>Wonderful, stylish architeure design. </h4>
                <p>Your exclusive dream home, for example. Will it be a luxury villa or a rustic farmhouse? We don't care. We make your home the way you want it. </p>
                <p>Why we are different from other construction companies? Because we want to be a soul mate for your dream home and want to find you on the road from dream image to brick.</p>
              </div>

              <div class="theme_btn">
                <a href="#"><span>Our Story</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4 about_right">
              <div class="about_fig content_fig">
                <figure>
                  <img src="images/about.jpg" class="w-100" alt="title">
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
                  <img src="images/quality.jpg" class="w-100" alt="title">
                </figure>

              </div>
            </div>

            <div class="col* col-md-8 col-lg-8 about_right">
              <div class="title_head">
                <h2><span>Quality is so much more</span></h2>
              </div>
              <div class="about_infos content_infos">
                <h4>No construction request is too crazy for us. </h4>
                <p>In the realization of your home, quality is much more than just 'building' and the materials used. Contact, coordination, overview, planning, efficiency, implementing changes, fulfilling agreements. These are all things that make the way to your new home a joy or an agony. We understand that very well. This is how we distinguish ourselves from other companies. </p>
                <p>With us, you and your dream home are central, from the first contact!</p>
              </div>

            </div>
          </div>
        </div>
      </section>

      <section id="services_section" class="services_sec section_top">
        <div class="container-fluid">
          <div class="title_head">
            <h2>Our Services</h2>
        
          </div>

          <div class="row">
            <div class="col* col-md-6 col-lg-3 service_list">
              <div class="service_block product_block">
                <a href="service-detail.html">
                  <div class="service_wrapper product_wrapper">
                    <div class="service_fig product_fig" style="background:url(images/1.jpg) no-repeat;background-position: center center;background-size: cover;"></div>
                  </div>
                </a>

                <div class="service_infos_col product_infos_col">
                  <div class="service_infos_flex product_infos_flex">
                    <div class="service_info_left product_info_left">
                      <h2><a href="service-detail.html">Architect</a></h2>
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
            </div>

          </div>
        </div>
      </section>

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

    <footer>
      <div class="main_footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col* col-md-6 col-lg-6 footer_left">
              <div class="footer_top_infos">
                <h3>Your dream home within reach. </h3>
              </div>

              <div class="social_icon">
                <a href="javascript:void(0)" class="social_ic fb">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path></svg>
                </a>
                <a href="javascript:void(0)" class="social_ic twitter">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814 11.874 11.874 0 0 1-8.62-4.37 4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101 4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732 11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z"></path></svg>
                </a>

                <a href="javascript:void(0)" class="social_ic google">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3.064 7.51A9.996 9.996 0 0 1 12 2c2.695 0 4.959.99 6.69 2.605l-2.867 2.868C14.786 6.482 13.468 5.977 12 5.977c-2.605 0-4.81 1.76-5.595 4.123-.2.6-.314 1.24-.314 1.9 0 .66.114 1.3.314 1.9.786 2.364 2.99 4.123 5.595 4.123 1.345 0 2.49-.355 3.386-.955a4.6 4.6 0 0 0 1.996-3.018H12v-3.868h9.418c.118.654.182 1.336.182 2.045 0 3.046-1.09 5.61-2.982 7.35C16.964 21.105 14.7 22 12 22A9.996 9.996 0 0 1 2 12c0-1.614.386-3.14 1.064-4.49z"></path></svg>
                </a>
                
              </div>

              <div class="footer_menu">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Project</a></li>
                  <li><a href="#">Vaccancy</a></li>
                </ul>
              </div>
            </div>

            <div class="col* col-md-6 col-lg-6 footer_right">
              <div class="footer_contact">
                <p>If you have any questions or need help, feel free to contact with our team. </p>
                <ul>
                  <li>
                    <a href="mailto:aarshi@gmail.com">Mail</a>
                  </li>
                  <li>
                    <a href="tel:12345678">Phone</a>
                  </li>
                  <li>
                    <a href="tel:12345678">Whats app</a>
                  </li>
                </ul>
              </div>

              <div class="footer_location">
                <p><label>Aarshi Associates</label></p>
                <p>UN Park, Lalitpur</p>
                <p>Manidown Marg-11 </p>
                
              </div>

            
            </div>
          </div>

          <div class="footer_about">
            <p>Your exclusive dream home, for example. Will it be a luxury villa or a rustic farmhouse? We don't care. We make your home the way you want it.</p>
          </div>

          <div class="copy_right">
            <p>Copyright © 2022, Aarshi Associates - All rights reserved </p>
          </div>
        </div>
      </div>
    </footer>

    <div class="go-top">
      <i class="bi bi-chevron-up"></i>
    </div>

    
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/main.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
  </body>
</html>