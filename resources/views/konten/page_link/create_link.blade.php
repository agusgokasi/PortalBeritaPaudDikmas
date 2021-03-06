@extends('layouts.app') 
@section('content')
<div class="container">
    
    <div class="card">

        <div class="card-header text-center">Buat Link Halaman</div>

        <div class="card-body">

            <form method="post" role="form" action="{{ route('post_link') }}" enctype="multipart/form-data" id="myForm">
                
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-left">{{ __('Judul Link Halaman') }}
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
                    <label for="content" class="col-md-2 col-form-label text-md-left">{{ __('Isi Link Halaman') }}</label>
                    <div class="col-md-10">
                        <textarea name="content" style="font-size: 15px" class="summernote form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" value="{{ old('content') }}" required>{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group-row">
                    <div>
                        <div class="form-group d-flex justify-content-center" style="margin-bottom: 50px">
                            <div>
                                <button type="submit" class="btn btn-success btn-md" style="margin-right: 100px">
                                    <i class="fa fa-save">{{ __(' Simpan') }}</i>
                                </button>
                                <a class="btn btn-neutral btn-md" href="/konten" style="border: solid 1px;">{{ __('Batal') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
        
</div>
@endsection

@section('add_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
        <script>
            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                });
            });
        </script>
@endsection