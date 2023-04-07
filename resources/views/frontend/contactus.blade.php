@extends('frontend.layouts.master')
@section('header_resources')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  {{-- <link rel="stylesheet" type="text/css" href="css/remixicon.css"> --}}
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
@include('frontend.layouts.common.breadcrumbs')
<main>
    <section class="contact_content">
      <div class="container-fluid">
        <div class="contact_get_touch gettouch_section">
          <div class="row align-items-center">
            <div class="col* col-md-8 col-lg-8 image_section map_section">
              <div class="product_wrapper">
                {!! $setting->site_google_map_link !!}
              </div>
            </div>

            <div class="col* col-md-4 col-lg-4 infos_section">
              <div class="infos_contact">
                <h3>{{ $setting->site_title }}</h3>
                <p>{{ $setting->site_address }}</p>
                <p>{{ $setting->site_contact }}</p>
                <p>{{ $setting->site_email }}</p>
              </div>

       
            </div>
          </div>
        </div>

        @if (Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      {{ Session::get('success_message') }}
                  </div>
              @endif
              @if (Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      {{ Session::get('error_message') }}
                  </div>
              @endif
        <div class="contact_form_col">
          <div class="row align-items-center">
            
            <div class="col* col-md-6 col-lg-6 contact_left">
              <div class="contact_form">
                {{-- <form action="{{ route('contact.us.store')}}" method="POST"> --}}
                  <form id="contactForm">
                  @csrf
                  <div class="row">
                    <div class="col* col-md-6 col-lg-6">
                      <div class="form-group">
                        <input type="text" id="name" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Name">
                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                      </div>
                    </div>
    
                    <div class="col* col-md-6 col-lg-6">
                      <div class="form-group">
                        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                      </div>
                    </div>
    
                    <div class="col* col-md-12 col-lg-12">
                      <div class="form-group">
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Subject">
                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                      </div>
                    </div>
                    
                    <div class="col* col-md-12 col-lg-12">
                      <div class="form-group">
                        <textarea name="description" id="description" value="{{ old('description') }}" rows="8" cols="8" class="form-control" placeholder="Message Us"></textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="submit_btn mt-4">
                    <button type="submit" value="" id="submitbtn" class="btn btn_theme">send message</button>
                  </div>
    
                </form>
              </div>
            </div>

            <div class="col* col-md-6 col-lg-6 contact_right">
              <div class="contact_fig content_fig">
                <figure>
                  <img src="{{ $setting->getContactImageUrl() }}" class="w-100" alt="{{ $setting->site_title }}">
                </figure>

              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main>

@endsection
@section('footer_resources')
<script type="text/javascript" src="{{ asset('js/toastr/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/toastr/toastr.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#contactForm').submit(function(e){

                e.preventDefault();

                let full_name = $('#name').val();
                let email = $('#email').val();
                let subject = $('#subject').val();
                let description = $('#description').val();
                const url = '{{route('contact.us.store')}}';
                $.ajax({
                    url: "{{ route('contact.us.store') }}",
                    type: 'POST',
                    data: {
                      "_token": "{{ csrf_token() }}",
                        full_name: full_name,
                        email: email,
                        subject: subject,
                        description: description
                    },
                    success: function(data){
                      // console.log(data.message);
                        if(data['success']){
                          toastr.success(data['success']);
                          setTimeout(() => {
                            location.reload();
                          }, 5000);
                        
                        }
                        else if (data['error']) {
                          $.each(data.error, function(index, msg){
                            toastr.error(msg);
                          })
                          // toastr.error(data['error']);
                      } else {
                          toastr.error('Whoops Something went wrong!!');
                      }
                        

                    },
                    error: function (data) {
                          toastr.error(data.error);
                    }
                });

            });
});

</script>
@endsection