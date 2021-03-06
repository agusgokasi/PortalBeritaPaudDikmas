@extends('layouts.app') 
@section('content')
<div class="container">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('headline') }}">Manajemen Headlines</a>
        </li>
        <li class="breadcrumb-item active">
            Buat Headlines
        </li>
    </ol>

    
    <div class="card">

        <div class="card-header text-center">Buat Headline</div>

        <div class="card-body">

            <form method="post" role="form" action="{{ route('post_headline') }}" enctype="multipart/form-data" id="myForm">
                
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-left">{{ __('Judul Headline') }}
                    </label>
                    <div class="col-md-10">
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus> 
                        @if ($errors->has('title'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="banner" class="col-md-2 col-form-label text-md-left">{{ __('Banner') }}</label>
                    <div class="col-md-10">
                        <input type="file" name="banner" style="font-size: 15px" class="form-control{{ $errors->has('banner') ? ' is-invalid' : '' }}" id="banner" value="{{ old('banner') }}" required>
                        @if ($errors->has('banner'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('banner') }}</strong>
                            </span>
                        @else
                        <small>
                            <span class="text-danger" role="alert">
                                <strong>Resolusi Banner harus 1440x720</strong>
                            </span>
                        </small>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-md-2 col-form-label text-md-left">{{ __('Isi Headline') }}</label>
                    <div class="col-md-10">
                        <textarea name="content" style="font-size: 15px" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" value="{{ old('content') }}" required>{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group-row">
                    <br style="margin-bottom: 10px">
                    <div class="form-group d-flex justify-content-end" style="margin-bottom: 50px">
                        <div>
                            <button type="submit" class="btn btn-primary rounded" style="padding-right: 30px; padding-left: 30px">
                                {{ __('Simpan' ) }}
                            </button>
                            <span>&nbsp;&nbsp;</span>
                            <a class="btn btn-light border border-dark rounded" href="{{ route('headline') }}">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
        
</div>
@endsection

@section('add_js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
          };

        CKEDITOR.replace('content',options);
        

    </script>
@endsection