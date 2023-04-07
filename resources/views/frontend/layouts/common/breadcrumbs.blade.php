<section class="breadcrumb_main">
    <div class="breadcrumb_bg" style="background: url({{ $setting->getBreadcrumbImageUrl()}}) no-repeat;background-size: cover;">
      <div class="overlay"></div>
      <div class="breadcrumb_content">
        <div class="container">
          <h3>{{$title}}</h3>
          <nav aria-label="breadcrumb">
            <ol class="list-unstyled breadcrumb">
              {!! $breadcrumb !!}
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>