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
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                          
                            <div class="form-group">
                                <label class="form__title">Description</label>
                                <textarea rows="5" cols="5" @if (isset($currentdata)) value="{{ $currentdata->description }}" @else value="{{ old('description') }}" @endif name="description" class="form-control" placeholder="Message"></textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="formTitle">Images <span class="astrick">*</span></label>
                                <input type="file" name="image[]" class="d-block dropifys" placeholder="" multiple="multiple"/>
                                    {{-- data-default-file="{{ isset($currentdata) ? $currentdata->getBannerImageUrl() : '' }}" multiple="multiple"/> --}}
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                <span class="text-danger">{{ $errors->first('image.*') }}</span>
                            </div>
                            {{-- <div class="form-group">
                                <label for="images">Images</label>
                                <input type="file" name="images[]" class="form-control-file" id="images" multiple required>
                            </div> --}}
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
