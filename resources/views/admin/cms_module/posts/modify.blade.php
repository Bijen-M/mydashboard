@extends('admin.cms_module.layouts.master')

@section('content')
    <div class="content__body">

        <div class="row">
            <div class="col* col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header cardHeaderFlex">
                        <h3 class="cardHeaderFlex__title mb-0">Create New Post</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('posts.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form__title">Title</label><span class="astrick">*</span>
                                <input type="text" @if (isset($currentdata)) value="{{ $post->title }}" @else value="{{ old('title') }}" @endif name="title"
                                    class="form-control" placeholder="Enter title">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>


                            <div class="form-group">
                                <label class="form__title">Category</label>
                                <select class="form-control nice__select" name="category_id">
                                    <option value="">-- Choose Select --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Description</label>
                                <textarea rows="5" cols="5" value="{{ isset($currentdata) ? $currentdata->title : '' }}" name="description" class="form-control" placeholder="Message"></textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Image Upload</label>
                                <input type="file" name="image" id="input-file-now" class="dropify" />
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Status</label>
                                <select class="form-control nice__select" name="status">
                                    <option value="1" @if (old('status') == '1') selected @endif> Active </option>
                                    <option value="0" @if (old('status') == '0') selected @endif> InActive </option>
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>
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
