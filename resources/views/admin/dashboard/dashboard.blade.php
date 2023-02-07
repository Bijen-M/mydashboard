@extends('admin.layouts.master')

@section('content')

    

    {{-- <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">
              <div class="brand-logo"><img class="logo" src="images/logo.png"/></div>
              <h2 class="brand-text mb-0">{{ auth()->user()->name }}</h2></a></li>
          <li class="nav-item nav-toggle">
            <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
              <i class="d-block d-xl-none font-medium-4  ri-menu-3-line primary toggle-icon"></i>
              <i class="toggle-icon ri-menu-3-line font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="ri-menu-3-line"></i>
            </a>
          </li>
        </ul>
      </div>

      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
          <li class=" nav-item">
            <a href="index.html">
              <i class="ri-home-wifi-line"></i>
              <span class="menu-title">Dashboard</span>
            </a>
            <ul class="menu-content">
              <li class=""> 
                <a href="dashboard1.html">
                  <i class=""></i>
                  <span class="menu-item">Dashboard 1</span>
                </a>
              </li>
              <li class="active">
                <a href="dashboard2.html">
                  <i class=" "></i>
                  <span class="menu-item">Dashboard 2</span>
                </a>
              </li>
              <li class="">
                <a href="dashboard3.html">
                  <i class=" "></i>
                  <span class="menu-item">Dashboard 3</span>
                </a>
              </li>
              <li class="">
                <a href="dashboard4.html">
                  <i class=" "></i>
                  <span class="menu-item">Dashboard 4</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="navigation-header"><span>Table</span></li>

          <li class=" nav-item">
            <a href="#">
              <i class="ri-table-alt-line"></i>
              <span class="menu-title">Table</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="table.html">
                  <i class="ri-file-copy-2-line"></i>
                  <span class="menu-item">Simple Table</span>
                </a>
              </li>
              <li>
                <a href="table-default.html">
                  <i class="ri-file-copy-2-line"></i>
                  <span class="menu-item">Default Table</span>
                </a>
              </li>
              <li>
                <a href="table-badge.html">
                  <i class="ri-file-copy-2-line"></i>
                  <span class="menu-item"> Table Badge</span>
                </a>
              </li>
              <li>
                <a href="datatable.html">
                  <i class="ri-grid-line"></i>
                  <span class="menu-item">Data Table</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="navigation-header"><span>Form</span></li>

          <li class=" nav-item">
            <a href="#">
              <i class="ri-file-list-3-line"></i>
              <span class="menu-title">Form</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="form.html">
                  <i class="ri-file-copy-2-line"></i>
                  <span class="menu-item">Form Elements</span>
                </a>
              </li>
              <li>
                <a href="form-input.html">
                  <i class="ri-file-copy-2-line"></i>
                  <span class="menu-item">Input Group</span>
                </a>
              </li>
              <li>
                <a href="form-check.html">
                  <i class="ri-file-copy-2-line"></i>
                  <span class="menu-item">CheckBox & Radio</span>
                </a>
              </li>
              <li>
                <a href="form-select.html">
                  <i class="ri-file-copy-2-line"></i>
                  <span class="menu-item">Select</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="navigation-header"><span>Button</span></li>

          <li class="navigation-header"><span>Button</span></li>

          <li class=" nav-item">
            <a href="#">
              <i class="ri-radio-button-line"></i>
              <span class="menu-title">Button</span>
            </a>
            <ul class="menu-content">
              <li class="">
                <a href="button.html">
                  <i class="ri-radio-button-fill"></i>
                  <span class="menu-item">Default Button</span>
                </a>
              </li>
              <li class="">
                <a href="button-custom.html">
                  <i class="ri-radio-button-fill"></i>
                  <span class="menu-item">Custom Button</span>
                </a>
              </li>

            </ul>
          </li>


          <li class="navigation-header"><span>Accordion</span></li>

          <li class=" nav-item">
            <a href="#">
              <i class="ri-menu-add-fill"></i>
              <span class="menu-title">Accordion</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="accordion-arrow.html">
                  <i class="ri-menu-3-fill"></i>
                  <span class="menu-item">Accordion Arrow</span>
                </a>
              </li>
              <li>
                <a href="accordion-icon.html">
                  <i class="ri-menu-3-fill"></i>
                  <span class="menu-item">Accordion Icon</span>
                </a>
              </li>
 
            </ul>
          </li>

          <li class="navigation-header"><span>Notification</span></li>

          <li class="nav-item">
            <a href="notify.html">
              <i class="ri-error-warning-line"></i>
              <span class="menu-title">Notification</span>
            </a>
          </li>

          <li class="navigation-header"><span>Form Wizard</span></li>

          <li class="nav-item">
            <a href="form-wizard.html">
              <i class="ri-file-shield-2-line"></i>
              <span class="menu-title">Form Wizard</span>
            </a>
          </li>

          <li class="navigation-header"><span>Tab</span></li>

          <li class="nav-item">
            <a href="form-tab.html">
              <i class="ri-file-shield-2-line"></i>
              <span class="menu-title">Tab</span>
            </a>
          </li>

          <li class="navigation-header"><span>Pages</span></li>

          <li class="nav-item">
            <a href="#">
              <i class="ri-menu-3-line"></i>
              <span class="menu-title">Pages</span>
            </a>
            <ul class="menu-content">
              <li class="">
                <a href="page-border.html">
                  <i class="ri-award-fill"></i>
                  <span class="menu-title">Border</span>
                </a>
              </li>

              <li class="">
                <a href="page-modal.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Modal</span>
                </a>
              </li>

              <li class="">
                <a href="page-spinner.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Spinner</span>
                </a>
              </li>

              <li class="">
                <a href="page-popover.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Popover</span>
                </a>
              </li>

              <li class="">
                <a href="page-progress.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Progress</span>
                </a>
              </li>

              <li class="">
                <a href="page-jumbotron.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Jumbotron</span>
                </a>
              </li>

              <li class="">
                <a href="page-sizing.html">
                  <i class="ri-line-height"></i>
                  <span class="menu-title">Sizing</span>
                </a>
              </li>

              <li class="">
                <a href="page-media.html">
                  <i class="ri-line-height"></i>
                  <span class="menu-title">Media Object</span>
                </a>
              </li>
 
            </ul>
          </li>

          <li class="navigation-header"><span>Advanced</span></li>

          <li class="nav-item">
            <a href="#">
              <i class="ri-bookmark-line"></i>
              <span class="menu-title">Advanced</span>
            </a>
            <ul class="menu-content">
              <li class="">
                <a href="page-toastr.html">
                  <i class="ri-printer-cloud-line"></i>
                  <span class="menu-title">Toastr</span>
                </a>
              </li>

              <li class="">
                <a href="page-timeline.html">
                  <i class="ri-timer-flash-line"></i>
                  <span class="menu-title">Timeline</span>
                </a>
              </li>

              <li class="">
                <a href="page-avatar.html">
                  <i class="ri-shield-user-line"></i>
                  <span class="menu-title">Avatar</span>
                </a>
              </li>

              <li class="">
                <a href="page-sweet.html">
                  <i class="ri-alarm-warning-line"></i>
                  <span class="menu-title">Sweet Alert</span>
                </a>
              </li>

              <li class="">
                <a href="page-breadcrumb.html">
                  <i class="ri-book-3-line"></i>
                  <span class="menu-title">Breadcrumb</span>
                </a>
              </li>

              <li class="">
                <a href="page-pagination.html">
                  <i class="ri-pages-line"></i>
                  <span class="menu-title">Pagination</span>
                </a>
              </li>

  
 
            </ul>
          </li>



          <li class="navigation-header"><span>Date Time Picker</span></li>

          <li class="nav-item">
            <a href="form-date.html">
              <i class="ri-calendar-check-line"></i>
              <span class="menu-title">Date Time Picker</span>
            </a>
          </li>

          <li class="navigation-header"><span>Components</span></li>

          <li class="nav-item">
            <a href="#">
              <i class="ri-menu-3-line"></i>
              <span class="menu-title">Components</span>
            </a>
            <ul class="menu-content">
              <li class="">
                <a href="badge.html">
                  <i class="ri-award-fill"></i>
                  <span class="menu-title">Badges</span>
                </a>
              </li>

              <li class="">
                <a href="list.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">List Items</span>
                </a>
              </li>


            </ul>
          </li>

          <li class="navigation-header"><span>Extra Pages</span></li>
          <li class="nav-item">
            <a href="#">
              <i class="ri-menu-3-line"></i>
              <span class="menu-title">Extra Pages</span>
            </a>
            <ul class="menu-content">
              <li class="">
                <a href="page-drag.html">
                  <i class="ri-award-fill"></i>
                  <span class="menu-title">Drag & Drop</span>
                </a>
              </li>

              <li class="">
                <a href="page-gallery.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Gallery</span>
                </a>
              </li>

              <li class="">
                <a href="page-chip.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Chip</span>
                </a>
              </li>

              <li class="">
                <a href="page-embeed.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">Embeed</span>
                </a>
              </li>

              <li class="">
                <a href="page-rating.html">
                  <i class="ri-shield-star-line"></i>
                  <span class="menu-title">Rating</span>
                </a>
              </li>

              <li class="">
                <a href="page-dropzone.html">
                  <i class="ri-price-tag-2-line"></i>
                  <span class="menu-title">Dropzone</span>
                </a>
              </li>

              <li class="">
                <a href="page-fileupload.html">
                  <i class="ri-file-upload-fill"></i>
                  <span class="menu-title">File Upload</span>
                </a>
              </li>

              <li class="">
                <a href="page-range.html">
                  <i class="ri-file-upload-fill"></i>
                  <span class="menu-title">Range Slider</span>
                </a>
              </li>
 
 
 
            </ul>
          </li>

          <li class="navigation-header"><span>Extra Pages</span></li>
          <li class="nav-item">
            <a href="#">
              <i class="ri-menu-3-line"></i>
              <span class="menu-title">Extra Pages</span>
            </a>
            <ul class="menu-content">
              <li class="">
                <a href="page-drag.html">
                  <i class="ri-award-fill"></i>
                  <span class="menu-title">Drag & Drop</span>
                </a>
              </li>

              <li class="">
                <a href="list.html">
                  <i class="ri-list-check-2"></i>
                  <span class="menu-title">List Items</span>
                </a>
              </li>
 
            </ul>
          </li>


          <li class="navigation-header"><span>Calendar</span></li>

          <li class="nav-item">
            <a href="form-calendar.html">
              <i class="ri-calendar-todo-line"></i>
              <span class="menu-title">Calendar</span>
            </a>
          </li>

          <li class="navigation-header"><span>Menu</span></li>
         
          <li class=" nav-item">
            <a href="#">
              <i class="ri-menu-3-line"></i>
              <span class="menu-title">Menu Levels</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="#">
                  <i class=" "></i>
                  <span class="menu-item">Second Level</span>
                </a>
              </li>
              <li>
                <a href="#"><i class=" "></i>
                  <span class="menu-item">Second Level</span>
                </a>
                <ul class="menu-content">
                  <li>
                    <a href="#">
                      <i class=" "></i>
                      <span class="menu-item">Third Level</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class=" "></i>
                      <span class="menu-item">Third Level</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </div> --}}

    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="breadcrumbs">
          <div class="breadcrumb__flex">
            <h2>Dashboard</h2>
            <div class="breadcrumb__right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"><i class="ri-home-4-line"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>

        <div class="content__body">
         <div class="main__home">
           <div class="row no-gutters">
             <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
              <a href="#">
                <div class="dashboard__box dashboard__c1">
                  <div class="dashboard__infos">
                    <span class="sub__title">total order</span> 
                    <h5 class="dashboard__count">1200</h5>
                    <p>Total order for last 20 days</p>
                  </div>

                  <div class="dashboard__icon pos__abs">
                    <i class="ri-shopping-basket-line"></i>
                  </div>

                </div>
              </a>
             </div>

             <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
              <a href="#">
                <div class="dashboard__box dashboard__c2">
                  <div class="dashboard__infos">
                    <span class="sub__title">New User</span> 
                    <h5 class="dashboard__count">100</h5>
                    <p>Total number of user for last 20 days</p>
                  </div>

                  <div class="dashboard__icon pos__abs">
                    <i class="ri-shield-user-line"></i>
                  </div>

                </div>
              </a>
             </div>

             <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
              <a href="#">
                <div class="dashboard__box dashboard__c3">
                  <div class="dashboard__infos">
                    <span class="sub__title">Task</span> 
                    <h5 class="dashboard__count">1000</h5>
                    <p>Total number of task for last 20 days</p>
                  </div>

                  <div class="dashboard__icon pos__abs">
                    <i class="ri-folder-shield-2-line"></i>
                  </div>

                </div>
              </a>
             </div>

             <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
              <a href="#">
                <div class="dashboard__box dashboard__c4">
                  <div class="dashboard__infos">
                    <span class="sub__title">Invoices</span> 
                    <h5 class="dashboard__count">1000</h5>
                    <p>Total number of Invoices for last 40 days</p>
                  </div>

                  <div class="dashboard__icon pos__abs">
                    <i class="ri-bill-line"></i>
                  </div>

                </div>
              </a>
             </div>

           </div>
         </div>

 
      </div>
    </div>



 
    <div class="sidenav-overlay"></div>

@endsection
    


@section('footer_resources')
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/main.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/vertical-menu/vertical-menu.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.nice-select.min.js')}}"></script>
@endsection

