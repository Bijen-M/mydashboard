@extends('admin.cms_module.layouts.master')

@section('content')
    <div class="content__body">
        <div class="row">
            <div class="col* col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header cardHeaderFlex">
                        <h3 class="cardHeaderFlex__title mb-0">{{isset($currentdata) ? 'Edit User' : 'Create New User'}}</h3>
                    </div>

                    <div class="card-body">
                        @if (!isset($currentdata))
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @else
                        <form action="{{ route('users.update', $currentdata) }}" id="form"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @endif
                            @csrf
                            <div class="form-group">
                                <label class="form__title">Name</label><span class="astrick">*</span>
                                <input type="text" @if (isset($currentdata)) value="{{ $currentdata->name }}" @else value="{{ old('name') }}" @endif name="name"
                                    class="form-control" placeholder="Enter name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Email</label><span class="astrick">*</span>
                                <input type="text" @if (isset($currentdata)) value="{{ $currentdata->email }}" @else value="{{ old('email') }}" @endif name="email"
                                    class="form-control" placeholder="Enter email">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="form__title">Password</label>
                                <input type="password" value="password" name="password" class="form-control" placeholder="">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
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
