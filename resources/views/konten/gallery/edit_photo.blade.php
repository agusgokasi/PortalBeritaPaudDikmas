@extends('layouts.app') 

@section('content')
<div class="container">
    
    <div class="card">

        <div class="card-header text-center">Edit Photo</div>

        <div class="card-body">
        	{{-- /photo/{{ $photos->id }} --}}
            <form method="post" role="form" action="{{ route('update_photos', ['id' => $photos->id]) }}" enctype="multipart/form-data" id="myForm">
                {{ csrf_field() }}
            <div class="form-group row">
                    <label for="filename" class="col-md-4 col-form-label text-md-left">{{ __('Masukkan Photo Baru') }}</label>
                    <div class="col-md-4">
                        <input type="file" name="filename" style="font-size: 15px" class="form-control{{ $errors->has('filename') ? ' is-invalid' : '' }}" id="filename" value="{{ old('filename') }}">
                        @if ($errors->has('filename'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('filename') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success btn-sm" style="margin-right: 25px">
                        <i class="fa fa-edit">{{ __(' Edit') }}</i>
                    </button>
                    <a class="btn btn-neutral btn-md" href="{{ route('detail_gallery', ['id' => $content->id]) }}" style="border: solid 1px;">{{ __('Batal') }}</a>
                </div>
            </form>
        </div>

    </div>
        
</div>
@endsection