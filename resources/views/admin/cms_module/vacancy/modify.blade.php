@extends('admin.cms_module.layouts.master')
@section('header_resources')

<style>
#addMore {
    margin-top: 3rem;
}
</style>
@endsection
@section('content')
    <div class="content__body">

        <div class="row">
            <div class="col* col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header cardHeaderFlex">
                        <h3 class="cardHeaderFlex__title mb-0">Create New Vacancy</h3>
                    </div>

                    <div class="card-body">
                        @if (!isset($currentdata))
                            <form action="{{ route('vacancy.store') }}" method="POST" enctype="multipart/form-data">
                            @else
                                <form action="{{ route('vacancy.update', $currentdata) }}" id="form" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                        @endif
                        @csrf
                        {{-- {{dd($currentdata)}} --}}
                        <div class="form-group">
                            <label class="form__title">Title</label><span class="astrick">*</span>
                            <input type="text"
                                @if (isset($currentdata)) value="{{ $currentdata->title }}" @else value="{{ old('title') }}" @endif
                                name="title" class="form-control" placeholder="Enter title">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="form__title">Subtitle</label><span class="astrick">*</span>
                            <input type="text"
                                @if (isset($currentdata)) value="{{ $currentdata->subtitle }}" @else value="{{ old('subtitle') }}" @endif
                                name="subtitle" class="form-control" placeholder="Enter subtitle">
                            <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                        </div>

                        <div class="form-group">
                            <label class="form__title">Status</label>
                            @if (isset($currentdata))
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
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 col-lg-6" id="description">
                            <label class="form__title">Description</label>
                           
                            @if (isset($currentdata))
                            
                                @foreach (explode(',', $currentdata->description) as $description)
                                <div class="input-group mb-2">
                                    <input type="text" value="{{ str_replace(['"', '[', ']' ,'\\'], '', $description)  }}" name="description[]"
                                        class="form-control" placeholder="Enter Description">
                                    
                                    <span class="input-group-btn"> 
                                        <button class="btn btn-sm btn-danger removeField" type="button"><i class="ri-delete-bin-line"></i></button>
                                    </span>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                                @endforeach
                            @else
                            <div class="input-group mb-2">
                                <input type="text" value="{{ old('description') }}" name="description[]"
                                    class="form-control" placeholder="Enter Description">
                                    <span class="input-group-btn"> 
                                        <button class="btn btn-sm btn-danger removeField" type="button"><i class="ri-delete-bin-line"></i></button>
                                    </span>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            @endif
                            {{-- @if (isset($currentdata))
                            @foreach (explode(',', $currentdata->description) as $description)
                                <input type="text" value="{{ htmlspecialchars($description) }}" name="description[]"
                                    class="form-control" placeholder="Enter Description">
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endforeach
                            @endif --}}
                            {{-- <input type="text"
                                @if (isset($currentdata)) value="{{ $currentdata->description }}" @else value="{{ old('description') }}" @endif
                                name="description[]" class="form-control" placeholder="Enter Description">
                            <span class="text-danger">{{ $errors->first('description') }}</span> --}}
                            
                        </div>
                        
                        <div class="form-group col-md-6 col-lg-6">
                        <button class="btn btn-sm btn-secondary " id="addMore">Add more</button>
                        </div>
                        </div>
                        <div class="mainBtn bntGrp btnLeft">
                            <input type="submit" name="submit" value="{{ isset($currentdetail) ? 'Update' : 'submit' }}"
                                class="btn btn-primary">
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col* col-md-6 col-lg-6">
            </div>
        </div>
    </div>
@endsection
@section('footer_resources')
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dropify/dropify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dropzone-script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#addMore').on('click', function(e) {
                e.preventDefault();
            var html = '<div class="input-group mb-2">' +
                            '<input type="text" name="description[]" class="form-control" placeholder="Enter Description">' +
                            '<span class="input-group-btn">' +
                                '<button class="btn btn-sm btn-danger removeField" type="button"><i class="ri-delete-bin-line"></i></button>' +
                            '</span>' +
                        '</div>';
            $('#description').append(html);
        });
        $(document).on('click', '.removeField', function() {
            $(this).closest('.input-group').remove();
        });
            // $(".addMore").click(function() {
            //     console.log('addmore');
            // //     var html = `
            // //     <div class="form-group">
            // //         <label class="form__title">Description</label>
            // //         <input type="text" name="description[]" class="form-control" placeholder="Enter Description">
            // //         <span class="text-danger"></span>
            // //         <button class="btn btn-secondary remove">Remove</button>
            // //     </div>
            // // `;
            // //     $("#description").append(html);
            
            // });
            // $(document).on("click", ".remove", function() {
            //     $(this).closest(".form-group").remove();
            // });


        });
    </script>
@endsection
