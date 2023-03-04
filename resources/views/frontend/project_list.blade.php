@extends('frontend.layouts.master')
@section('content')

@include('frontend.layouts.common.breadcrumbs')
<main>
    <section class="project_content">
      <div class="container-fluid">
        <div class="project_control">
          <button type="button" class="control" data-filter="all">All</button>
          @foreach ($project_type as $type)
            <button type="button" class="control" data-filter=".{{$type->slug}}">{{$type->title}}</button>
          @endforeach
        </div>

        <div class="project_filter_list">
          <div class="row">
            @foreach ($projects as $project)
            
            <div class="col* col-md-4 col-lg-4 mix {{$project->projectType->slug}} prd_filter_list">
                <div class="project_block product_block">
                  <a href="{{route('project.detail', $project->slug)}}">
                    <div class="project_wrapper product_wrapper">
                      <div class="project_fig product_fig" style="background:url({{$project->getProjectImageUrl()}}) no-repeat;background-position: center center;background-size: cover;"></div>
                    </div>
                  </a>
  
                  <div class="project_infos_col product_infos_col">
                    <div class="project_infos_flex product_infos_flex">
                      <div class="project_info_left product_info_left">
                        <span class="product_head">{{ $project->projectType->title }}</span>
                        <h2><a href="{{route('project.detail', $project->slug)}}">{{$project->title}}</a></h2>
                        <span class="project_date">{{$project->year}}</span>
                      </div>
                      <div class="project_info_right product_info_right">
                        <div class="project_line product_line"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('footer_resources')
<script type="text/javascript" src="{{asset('js/mixitup/mixitup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mixitup/mixit.custom.js')}}"></script>
@endsection