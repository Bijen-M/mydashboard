@extends('admin.cms_module.layouts.master')

@section('content')
<div class="content__body">
    <div class="card">
      <div class="card-header cardHeaderFlex">
        <h3 class="cardHeaderFlex__title mb-0">Rounded Image</h3>
      </div>

      <div class="card-body">
        @foreach ($project->projectImages as $image)
            <img src="{{ $image->getProjectImageUrl()}}" class="rounded" alt="title">
        @endforeach
        
      </div>
    </div>

    

  </div>

@endsection