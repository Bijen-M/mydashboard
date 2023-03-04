@extends('admin.cms_module.layouts.master')

@section('content')
    <div class="content__body">

        <div class="row">
            <div class="col* col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header cardHeaderFlex">
                        <h3 class="cardHeaderFlex__title mb-0">Create New Project</h3>
                    </div>

                    <div class="card-body">
                        @if (!isset($currentdata))
                            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @else
                        <form action="{{ route('projects.update', $currentdata) }}" id="form"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @endif
                            @csrf
                            <div class="form-group">
                                <label class="form__title">Title</label><span class="astrick">*</span>
                                <input type="text" @if (isset($currentdata)) value="{{ $currentdata->title }}" @else value="{{ old('title') }}" @endif name="title"
                                    class="form-control" placeholder="Enter title">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Slug</label><span class="astrick">*</span>
                                <input type="text" @if (isset($currentdata)) value="{{ $currentdata->slug }}" @else value="{{ old('slug') }}" @endif name="slug"
                                    class="form-control" disabled>
                                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Project Type <span class="astrick">*</span></label>
                                <select
                                    class="form-control nice__select"
                                    name="fk_project_type">
      
                                    @foreach ($project_type as $type)
                                        <option
                                            value="{{ $type->id }}"
                                            @if(isset($currentdata))
                                             @if ($type->id == $currentdata->fk_project_type) selected @endif
                                             @endif >
                                            {{ $type->title }} </option>
      
                                    @endforeach
                                </select>
                               
                                <span class="text-danger">{{$errors->first('fk_project_type')}}</span>
                              </div>
      
                            <div class="form-group">
                                <label class="form__title">Status</label>
                                @if(isset($currentdata))
                                <select id="selectField" class="form-control nice__select" name="status">
                                    <option value="">-- Choose Select --</option>
                                        <option <?php if ($currentdata->status == '1') {
                                            echo 'selected';
                                        } ?> value="1"> Active</option>
                                        <option <?php if ($currentdata->status == '0') {
                                            echo 'selected';
                                        } ?> value="0"> Inactive</option>
                                </select>
                                @else
                                <select id="statusSelect" class="form-control nice__select" name="status">
                                    <option value="">-- Choose Select --</option>
                                        <option value="1"> Active </option>
                                        <option value="0"> Inactive </option>
                                </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form__title">Year</label><span class="astrick">*</span>
                                <input type="number" @if (isset($currentdata)) value="{{ $currentdata->year }}" @else value="{{ old('year') }}" @endif name="year"
                                    class="form-control" placeholder="Enter project year">
                                    <span class="text-danger">{{ $errors->first('year') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Architect</label><span class="astrick">*</span>
                                <input type="text" @if (isset($currentdata)) value="{{ $currentdata->architect }}" @else value="{{ old('architect') }}" @endif name="architect"
                                    class="form-control" placeholder="Enter Architect">
                                    <span class="text-danger">{{ $errors->first('architect') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Description</label>
                                <textarea rows="5" cols="5" name="description" @if (isset($currentdata)) value="{{ $currentdata->description }}" @else value="{{ old('description') }}" @endif class="form-control" placeholder="Description">{{isset($currentdata) ? $currentdata->description : old('description')}}</textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                          
                            <div class="form-group" id="single-image">
                                <label class="form__title">Cover Image</label>
                                <input type="file" name="coverimage"   data-default-file="{{ isset($currentdata) ? $currentdata->getProjectImageUrl() : '' }}" id="input-file-now" class="dropify" />
                                <span class="text-danger">{{$errors->first('coverimage')}}</span>
                            </div>
                            <div class="form-group" id="multiple-image">
                                <label class="formTitle">Images <span class="astrick">*</span></label>
                                <input  type="file" name="image[]" class="d-block dropifys" placeholder="" multiple="multiple"/>
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                <span class="text-danger">{{ $errors->first('image.*') }}</span>
                            </div>
                            <div class="mainBtn bntGrp btnLeft">
                                <input type="submit" name="submit" value="{{(isset($currentdetail)?'Update':'submit')}}" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_resources')
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dropify/dropify.js')}}"></script>
    <script>
        $(document).ready(function(){
        // Basic
        $('.dropify').dropify();
       
    });
    </script>
@endsection
