@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">Buat Konten</div>

                <div class="card-body">

                    <form method="post" role="form" action="/konten/create" enctype="multipart/form-data" id="myForm">
                        
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-left">{{ __('Judul Konten') }}
                                <span style="color:red">*)</span>
                            </label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus> 
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="konten" class="col-md-4 col-form-label text-md-left">{{ __('Jenis Konten') }}
                                <span style="color:red">*)</span>
                            </label>
                            <div class="col-md-6">
                                <select name="konten" style="font-size: 15px" class="form-control{{ $errors->has('konten') ? ' is-invalid' : '' }}" id="konten" value="{{ old('konten') }}" required>
                                  <option hidden disabled selected value>--Pilih Konten--</option>
                                  @foreach($kategoris as $kategori)
                                  <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                                  @endforeach
                              </select> 
                                @if ($errors->has('konten'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('konten') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-left">{{ __('Isi Konten') }}
                            <span style="color:red">*)</span></label>
                            <div class="col-md-6">
                                <textarea name="content" style="font-size: 15px" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" value="{{ old('content') }}" required>{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-left">{{ __('Tanggal Konten') }}
                        <span style="color:red">*)</span></label>
                        <div class="col-md-6">
                            <input type="date" name="date" style="font-size: 15px" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" value="{{ old('date') }}" required>

                            	@if ($errors->has('date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group row">
                            <label for="banner" class="col-md-4 col-form-label text-md-left">{{ __('Banner') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="banner" style="font-size: 15px" class="form-control{{ $errors->has('banner') ? ' is-invalid' : '' }}" id="banner" value="{{ old('banner') }}">
                                @if ($errors->has('banner'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('banner') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group-row">
                            <strong><span style="color:red;">*)</span>Wajib Diisi</strong>
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
    </div>
</div>
@endsection