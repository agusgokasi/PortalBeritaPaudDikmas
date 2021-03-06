@extends('layouts.app')

@section('content')
<div class="container">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('kategori') }}">Manajemen Kategori</a>
        </li>
        <li class="breadcrumb-item active">
            Edit Kategori
        </li>
    </ol>


    <div class="card">

        <div class="card-header text-center">Edit Kategori</div>

        <div class="card-body">

            <form method="post" role="form" action="/kategori/{{$kategoris->id}}" enctype="multipart/form-data">
                
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama Kategori') }}</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $kategoris->name }}" required autofocus> 
                        @if ($errors->has('name'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
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
                            <a class="btn btn-light border border-dark rounded" href="{{ route('kategori') }}">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection