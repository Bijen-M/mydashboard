@extends('frontend.layouts.master')
@section('content')

@include('frontend.layouts.common.breadcrumbs')
<main>
    @if ($service)
    <section class="service_content">
      <div class="container-fluid">
        <h2 class="title_head">{{$service->title}}</h2>
        <div class="row">
        @foreach ($service->serviceImages as $image)
            <div class="col* col-md-6 col-lg-6 mb-3">
                <img src="{{$image->getServiceImageUrl()}}" class="w-100" alt="{{ $service->title }}">
            </div>
        @endforeach
        </div>
        <p>{{ $service->description }}</p>
      </div>  
    </section>
    @else
       <h4> Service Not Found</h4>
    @endif
  </main>
@endsection