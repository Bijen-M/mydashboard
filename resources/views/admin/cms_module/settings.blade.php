@extends('admin.cms_module.layouts.master')

@section('content')
<div class="card">
    <div class="card-header cardHeaderFlex">
      <h3 class="cardHeaderFlex__title mb-0">Form Controls</h3>

    </div>

    <div class="card-body">
      <form method="POST" action="{{ route('settings.update',[$setting->id])}}"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
          <div class="col* col-md-3 col-lg-3">
            <div class="form-group">
              <label class="form__title">Site Title</label>
              <input type="site_title" @if (isset($setting)) value="{{ $setting->site_title }}" @else value="{{ old('site_title') }}" @endif name="site_title" class="form-control" placeholder="Text">
            </div>
          </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Address</label>
                <input type="site_address" @if (isset($setting)) value="{{ $setting->site_address }}" @else value="{{ old('site_address') }}" @endif name="site_address" class="form-control" placeholder="Address">
              </div>
            </div>
            <div class="col* col-md-5 col-lg-5">
              <div class="form-group">
                <label class="form__title">Facebook Link</label>
                <input type="facebook" @if (isset($setting)) value="{{ $setting->facebook }}" @else value="{{ old('facebook') }}" @endif name="facebook" class="form-control" placeholder="Facebook">
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Twitter</label>
                <input type="twitter" @if (isset($setting)) value="{{ $setting->twitter }}" @else value="{{ old('twitter') }}" @endif name="twitter" class="form-control" placeholder="Twitter">
              </div>
            </div>

            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Email address</label>
                <input type="text" @if (isset($setting)) value="{{ $setting->site_email }}" @else value="{{ old('site_email') }}" @endif name="site_email" class="form-control" placeholder="test@example.com">
                <span class="text-danger">{{ $errors->first('site_email') }}</span>
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Contact Number</label>
                <input type="number" @if (isset($setting)) value="{{ $setting->site_contact }}" @else value="{{ old('site_contact') }}" @endif name="site_contact" class="form-control">
                <span class="text-danger">{{ $errors->first('site_contact') }}</span>
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Whatsapp</label>
                <input type="text" @if (isset($setting)) value="{{ $setting->whatsapp }}" @else value="{{ old('whatsapp') }}" @endif name="whatsapp" class="form-control">
                <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Google Map Link</label>
                <input type="text" @if (isset($setting)) value="{{ $setting->site_google_map_link }}" @else value="{{ old('site_google_map_link') }}" @endif name="site_google_map_link" class="form-control">
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Copyright</label>
                <input type="text" @if (isset($setting)) value="{{ $setting->copyright }}" @else value="{{ old('copyright') }}" @endif name="copyright" class="form-control">
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Footer Message</label>
                <textarea name="footer_message" class="form-control" cols="30" rows="10">{{ isset($setting->footer_message) ? $setting->footer_message : ''}}</textarea>
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Contact Message</label>
                <textarea name="contact_message" class="form-control" cols="30" rows="10">{{ isset($setting->contact_message) ? $setting->contact_message : ''}}</textarea>
              </div>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <div class="form-group">
                <label class="form__title">Footer About Us</label>
                <textarea name="footer_about_us" class="form-control" cols="30" rows="10">{{ isset($setting->footer_about_us) ? $setting->footer_about_us : ''}}</textarea>
              </div>
            </div>
            
           
            <div class="col* col-md-4 col-lg-4">
              <label class="form__title">Logo</label>
              <input type="file" name="site_logo"   data-default-file="{{ isset($setting) ? $setting->getSiteLogoUrl() : '' }}" id="input-file-now" class="dropify" />
              <span class="text-danger">{{$errors->first('site_logo')}}</span>
            </div>
          
            <div class="col* col-md-4 col-lg-4">
              <label class="form__title">Contact Us Image</label>
              <input type="file" name="contact_image"   data-default-file="{{ isset($setting) ? $setting->getContactImageUrl() : '' }}" id="input-file-now" class="dropify" />
              <span class="text-danger">{{$errors->first('contact_image')}}</span>
            </div>
            <div class="col* col-md-4 col-lg-4">
              <label class="form__title">Breadcrumb Image</label>
              <input type="file" name="breadcrumb_image"   data-default-file="{{ isset($setting) ? $setting->getBreadcrumbImageUrl() : '' }}" id="input-file-now" class="dropify" />
              <span class="text-danger">{{$errors->first('breadcrumb_image')}}</span>
            </div>
        </div>

        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  @endsection
  @section('footer_resources')
  <script type="text/javascript" src="{{ asset('js/dropify/dropify.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/dropzone-script.js')}}"></script>
  <script>
    $(document).ready(function(){
    // Basic
    $('.dropify').dropify();
   
});
</script>
  @endsection