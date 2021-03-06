@extends('layouts.app') 
@section('content')
<div class="container">
    
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('gallery') }}">Manajemen Galeri</a>
        </li>
        <li class="breadcrumb-item active">
            Buat Galeri
        </li>
    </ol>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif


    <div class="card">

        <div class="card-header text-center">Buat Gallery</div>

        <div class="card-body">

            <form method="post" role="form" action="{{ route('post_gallery') }}" enctype="multipart/form-data" id="myForm">
                
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-left">{{ __('Judul Galeri') }}
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
                    <label for="banner" class="col-md-2 col-form-label text-md-left">{{ __('Thumbnail Foto') }}
                    </label>
                    <div class="col-md-10">
                        <input type="file" name="banner" style="font-size: 15px" class="form-control{{ $errors->has('banner') ? ' is-invalid' : '' }}" id="banner" value="{{ old('banner') }}" required>
                        @if ($errors->has('banner'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('banner') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-left">{{ __('Deskripsi Galeri') }}</label>
                    <div class="col-md-10">
                        <textarea name="description" style="font-size: 15px" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" value="{{ old('description') }}" required>{!! old('description') !!}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
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
                            <a class="btn btn-light border border-dark rounded" href="{{ route('gallery') }}">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
        
</div>
@endsection