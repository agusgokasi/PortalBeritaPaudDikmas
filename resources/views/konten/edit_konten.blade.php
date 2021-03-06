@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">Edit Kategori</div>

                <div class="card-body">

                    <form method="post" role="form" action="/konten/{{$kontens->id}}" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama Kategori') }}
                                <span style="color:red">*)</span>
                            </label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $kontens->name }}" required autofocus> 
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="form-group-row">
                            <strong><span style="color:red;">*)</span>Wajib Diisi</strong>
                            <div>
                                <br style="margin-bottom: 10px">
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