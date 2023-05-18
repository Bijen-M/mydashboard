<footer>
    <div class="main_footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col* col-md-6 col-lg-6 footer_left">
            <div class="footer_top_infos">
              <h3>{{$setting->footer_message}}</h3>
            </div>

            <div class="social_icon">
              <a href="{{ isset($setting->facebook) ? $setting->facebook : 'javascript:void(0)' }}" class="social_ic fb" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path></svg>
              </a>
              <a href="{{ isset($setting->twitter) ? $setting->twitter : 'javascript:void(0)' }}" class="social_ic twitter">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814 11.874 11.874 0 0 1-8.62-4.37 4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101 4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732 11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z"></path></svg>
              </a>

              <a href="{{ $setting->google }}" class="social_ic google">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3.064 7.51A9.996 9.996 0 0 1 12 2c2.695 0 4.959.99 6.69 2.605l-2.867 2.868C14.786 6.482 13.468 5.977 12 5.977c-2.605 0-4.81 1.76-5.595 4.123-.2.6-.314 1.24-.314 1.9 0 .66.114 1.3.314 1.9.786 2.364 2.99 4.123 5.595 4.123 1.345 0 2.49-.355 3.386-.955a4.6 4.6 0 0 0 1.996-3.018H12v-3.868h9.418c.118.654.182 1.336.182 2.045 0 3.046-1.09 5.61-2.982 7.35C16.964 21.105 14.7 22 12 22A9.996 9.996 0 0 1 2 12c0-1.614.386-3.14 1.064-4.49z"></path></svg>
              </a>
              
            </div>

            <div class="footer_menu">
              {!! navs('footer-menu', 'navbar-nav', 'navbar-nav') !!}
            </div>
          </div>

          <div class="col* col-md-6 col-lg-6 footer_right">
            <div class="footer_contact">
              <p>{{ $setting->contact_message }} </p>
              <ul>
                <li>
                  <a href="mailto:{{$setting->site_email}}">Mail</a>
                </li>
                <li>
                  <a href="tel:{{$setting->site_contact}}">Phone</a>
                </li>
                <li>
                  <a href="tel:{{$setting->whatsapp}}">Whatsapp</a>
                </li>
              </ul>
            </div>

            <div class="footer_location">
              <p><label>{{ $setting->site_title }}</label></p>
              <a href="{{ $setting->googlemappage }}" target="__blank"><p>{{ $setting->site_address }}</p></a>
              
            </div>

          
          </div>
        </div>

        <div class="footer_about">
          <p>{{ $setting->footer_about_us }}</p>
        </div>

        <div class="copy_right">
          <p>{{ $setting->copyright}}</p>
        </div>
      </div>
    </div>
</footer>