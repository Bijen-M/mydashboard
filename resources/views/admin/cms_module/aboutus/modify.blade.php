@extends('admin.cms_module.layouts.master')

@section('content')
    <div class="content__body">

        <div class="row">
            <div class="col* col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header cardHeaderFlex">
                        <h3 class="cardHeaderFlex__title mb-0">Create New Heading</h3>
                    </div>

                    <div class="card-body">
                        @if (!isset($currentdata))
                            <form action="{{ route('about-us.store') }}" method="POST" enctype="multipart/form-data">
                        @else
                        <form action="{{ route('about-us.update', $currentdata->id) }}" id="form"
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
                                <label class="form__title">Subtitle</label><span class="astrick">*</span>
                                <input type="text" @if (isset($currentdata)) value="{{ $currentdata->subtitle }}" @else value="{{ old('subtitle') }}" @endif name="subtitle"
                                    class="form-control" placeholder="Enter title">
                                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Type</label>
                                @if(isset($currentdata))
                                <select id="selectField" class="form-control nice__select" name="type">
                                    <option value="">-- Choose Select --</option>
                                    
                                        <option <?php if ($currentdata->type == '1') {
                                            echo 'selected';
                                        } ?> value="1"> About Us Section I  </option>
                                        <option <?php if ($currentdata->type == '2') {
                                            echo 'selected';
                                        } ?> value="2"> About Us Section II </option>
                                        <option <?php if ($currentdata->type == '3') {
                                            echo 'selected';
                                        } ?> value="3"> About Us Page Section(3 images) </option>
                                </select>

                                @else
                                <select id="typeSelect" class="form-control nice__select" name="type">
                                    <option value="">-- Choose Select --</option>
                                        <option value="1"> About Us Section I </option>
                                        <option value="2"> About Us Section II </option>
                                        <option value="3"> About Us Page Section (3 images) </option>
                                </select>
                                @endif
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Description</label>
                                <textarea rows="5" cols="5" name="description" @if (isset($currentdata)) value="{{ $currentdata->description }}" @else value="{{ old('description') }}" @endif class="form-control" placeholder="Description">{{isset($currentdata) ? $currentdata->description : old('description')}}</textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            @if (isset($currentdata))
                                @if($currentdata->type == '3')
                                    <div class="form-group" id="multiple-image1">
                                        <label class="formTitle">Images <span class="astrick">*</span></label>
                                        <input  type="file" name="image[]" class="d-block dropifys" placeholder=""  multiple="multiple"/>
                                            {{-- data-default-file="{{ isset($currentdata) ? $currentdata->getBannerImageUrl() : '' }}" multiple="multiple"/> --}}
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        <span class="text-danger">{{ $errors->first('image.*') }}</span>
                                    </div>
                                @else
                                    <div class="form-group" id="single-image1">
                                        <label class="form__title">Image Upload</label>
                                        <input type="file" name="image[]" id="input-file-now" data-default-file="{{ isset($currentdata) ? $currentdata-> getAboutUsImageUrl() : ''}}" class="dropify" />
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    </div>
                                @endif
                            @else
                                <div class="form-group" id="multiple-image">
                                    <label class="formTitle">Images <span class="astrick">*</span></label>
                                    <input  type="file" name="image[]" class="d-block dropifys" placeholder="" multiple="multiple"/>
                                        {{-- data-default-file="{{ isset($currentdata) ? $currentdata->getBannerImageUrl() : '' }}" multiple="multiple"/> --}}
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <span class="text-danger">{{ $errors->first('image.*') }}</span>
                                </div>
                                <div class="form-group" id="single-image">
                                    <label class="form__title">Image Upload</label>
                                    <input type="file" name="image[]" id="input-file-now" class="dropify" />
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                </div>
                            @endif
                            <div class="mainBtn bntGrp btnLeft">
                                <input type="submit" name="submit" value="{{(isset($currentdetail)?'Update':'submit')}}" class="btn-success">
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
            $('#multiple-image').hide();
            // $('#single-image').hide();
            $('#typeSelect').change(function() {
                if ($(this).val() == '3') {
                $('#multiple-image').show();
                $('#single-image').hide();
                } 
            }); 
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Drop file here or click to upload',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
@endsection
