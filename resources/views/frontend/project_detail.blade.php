@extends('frontend.layouts.master')
@section('content')

@include('frontend.layouts.common.breadcrumbs')
<main>
    <section class="project_content">
      <div class="container-fluid">
       <div class="project_top_infos">
        <div class="row">
          <div class="col* col-md-3 col-lg-3 project_info_list">
            <label>Construction year</label>
            <span>{{$project->year}}</span>
          </div>

          <div class="col* col-md-3 col-lg-3 project_info_list">
            <label>Architect</label>
            <span>{{$project->architect}} </span>
          </div>
        </div>
       </div>

       <div class="project_figure">
            @foreach ($project_images as $image)
                <div class="project_figure_list">
                    <figure>
                    <img src="{{$image->getProjectImageUrl()}}" alt="title" class="w-100">
                    </figure>
                </div>
            @endforeach
       </div>
       <p>{{$project->description}}</p>
      </div>
    </section>
  </main>
@endsection

