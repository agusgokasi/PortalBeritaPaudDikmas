@extends('layouts.app')

@section('content')
  <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('pengumum.index') }}">Pengumuman Paud Dikmas</a>
        </li>
        <li class="breadcrumb-item active">
            Pengumanan Paud Dikmas
        </li>
    </ol>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    
    <h5>Tambah Pengumuman</h5>

    
    <form method="POST" action="{{ route('pengumum.store') }}" enctype="multipart/form-data">

      <div class="form-group">
        <label for="name" class="col-form-label">Nama :</label>

        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <label for="banner" class="col-form-label">Banner :</label>

        <input type="file" class="form-control-file{{ $errors->has('banner') ? ' is-invalid' : '' }}" id="banner" name="banner" value="{{ old('banner') }}">

        @if ($errors->has('banner'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('banner') }}</strong>
            </span>
        @else
            <small>
                <span class="text-danger" role="alert">
                    <strong>(Tidak Wajib diisi)</strong>
                </span>
            </small>
        @endif
      </div>

      <div class="form-group">
        <label for="content" class="col-form-label text-md-left">{{ __('Isi Pengumuman') }}</label>
          <textarea name="content" style="font-size: 15px" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" value="{{ old('content') }}" required>{{ old('content') }}</textarea>
          @if ($errors->has('content'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('content') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group">
        <label for="detail" class="col-form-label text-md-left">{{ __('Detail') }}</label>
          <textarea name="detail" style="font-size: 15px" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" id="detail" value="{{ old('detail') }}" required>{{ old('detail') }}</textarea>
          @if ($errors->has('detail'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('detail') }}</strong>
              </span>
          @endif
      </div>

      @csrf
      
      <div class="modal-footer">
        <a href="/pengumum" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Buat Pengumuman</button>
      </div>
    </form>

    
    

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

        CKEDITOR.replace('detail',options);
        
    </script>

@endsection