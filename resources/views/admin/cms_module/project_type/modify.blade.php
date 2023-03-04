@extends('admin.cms_module.layouts.master')

@section('content')
    <div class="content__body">

        <div class="row">
            <div class="col* col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header cardHeaderFlex">
                        <h3 class="cardHeaderFlex__title mb-0">Create New Project Type</h3>
                    </div>

                    <div class="card-body">
                        @if (!isset($currentdata))
                            <form action="{{ route('project.type.submit') }}" method="POST" enctype="multipart/form-data">
                        @else
                        <form action="{{ route('project.type.update', $currentdata) }}" id="form"
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
                            <div class="mainBtn bntGrp btnLeft">
                                <input type="submit" name="submit" value="{{(isset($currentdetail)?'Update':'Submit')}}" class="btn-success">
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
@endsection
