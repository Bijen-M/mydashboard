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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.108740078312!2d85.32550241455586!3d27.68303383316797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b897a2551f%3A0x5a534a43f3c61d3d!2sSpices%20Research%20and%20Consulting%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1657450048196!5m2!1sen!2snp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>

            <div class="col* col-md-4 col-lg-4 infos_section">
              <div class="infos_contact">
                <h3>Aarshi Associates</h3>
                <p>UN Park, Lalitpur</p>
                <p>Manidown Marg-11</p>
                <p>+31 (0)478 746 016</p>
                <p>info.aarshiassociates@gmail.com</p>
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
                  <img src="images/contact.jpg" class="w-100" alt="title">
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