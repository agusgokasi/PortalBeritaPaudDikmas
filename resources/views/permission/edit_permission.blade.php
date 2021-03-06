@extends('layouts.app')

@section('content')
<div class="container">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('permission') }}">Permission</a>
        </li>
        <li class="breadcrumb-item active">
            Edit Permission
        </li>
    </ol>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-header text-center">Edit Permission</div>
        <div class="card-body">
            <form method="post" role="form" action="{{ route('update_permission' , ['id' => $roles->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama Permission') }}</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $roles->name }}" required autofocus> 
                        @if ($errors->has('name'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit_category" class="col-md-4 col-form-label text-md-left">{{ __('Edit Kategori') }}</label>

                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="edit_category" type="radio" class=" form-control{{ $errors->has('edit_category') ? ' is-invalid' : '' }}" name="edit_category" value="1" {{ $roles->edit_category == '1' ? 'checked' : '' }}>
                            <label> Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="edit_category" type="radio" class="form-control{{ $errors->has('edit_category') ? ' is-invalid' : '' }}" name="edit_category" value="0" {{ $roles->edit_category == '0' ? 'checked' : '' }}>
                            <label> Tidak</label>
                        </div>

                        @if ($errors->has('edit_category'))
                            <div role="alert">
                                <small>
                                    <strong class="text-danger">{{ $errors->first('edit_category') }}</strong>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit_component" class="col-md-4 col-form-label text-md-left">{{ __('Edit Komponen') }}</label>

                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="edit_component" type="radio" class=" form-control{{ $errors->has('edit_component') ? ' is-invalid' : '' }}" name="edit_component" value="1" {{ $roles->edit_component == '1' ? 'checked' : '' }}>
                            <label> Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="edit_component" type="radio" class="form-control{{ $errors->has('edit_component') ? ' is-invalid' : '' }}" name="edit_component" value="0" {{ $roles->edit_component == '0' ? 'checked' : '' }}>
                            <label> Tidak</label>
                        </div>

                        @if ($errors->has('edit_component'))
                            <div role="alert">
                                <small>
                                    <strong class="text-danger">{{ $errors->first('edit_component') }}</strong>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <label for="add_content" class="col-md-4 col-form-label text-md-left">{{ __('Membuat Konten') }}</label>

                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="add_content" type="radio" class=" form-control{{ $errors->has('add_content') ? ' is-invalid' : '' }}" name="add_content" value="1" {{ $roles->add_content == '1' ? 'checked' : '' }}>
                            <label> Ya</label>
                        </div>
                            <div class="form-check form-check-inline">
                                <input id="add_content" type="radio" class="form-control{{ $errors->has('add_content') ? ' is-invalid' : '' }}" name="add_content" value="0" {{ $roles->add_content == '0' ? 'checked' : '' }}>
                                <label> Tidak</label>
                            </div>
                        @if ($errors->has('add_content'))
                            <div>
                                <small class="text-danger" role="alert">
                                     <strong>{{ $errors->first('add_content') }}</strong>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit_content" class="col-md-4 col-form-label text-md-left">{{ __('Edit Konten') }}</label>

                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="edit_content" type="radio" class=" form-control{{ $errors->has('edit_content') ? ' is-invalid' : '' }}" name="edit_content" value="1" {{ $roles->edit_content == '1' ? 'checked' : '' }}>
                            <label> Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="edit_content" type="radio" class="form-control{{ $errors->has('edit_content') ? ' is-invalid' : '' }}" name="edit_content" value="0" {{ $roles->edit_content == '0' ? 'checked' : '' }}>
                            <label> Tidak</label>
                        </div>

                        @if ($errors->has('edit_content'))
                            <div role="alert">
                                <small>
                                    <strong class="text-danger">{{ $errors->first('edit_content') }}</strong>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="approve_content" class="col-md-4 col-form-label text-md-left">{{ __('Approve Konten') }}</label>

                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="approve_content" type="radio" class=" form-control{{ $errors->has('approve_content') ? ' is-invalid' : '' }}" name="approve_content" value="1" {{ $roles->approve_content == '1' ? 'checked' : '' }}>
                            <label> Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="approve_content" type="radio" class="form-control{{ $errors->has('approve_content') ? ' is-invalid' : '' }}" name="approve_content" value="0" {{ $roles->approve_content == '0' ? 'checked' : '' }}>
                            <label> Tidak</label>
                        </div>

                        @if ($errors->has('approve_content'))
                            <div role="alert">
                                <small>
                                    <strong class="text-danger">{{ $errors->first('approve_content') }}</strong>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="crud_permission" class="col-md-4 col-form-label text-md-left">{{ __('CRUD Permission') }}</label>

                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="crud_permission" type="radio" class=" form-control{{ $errors->has('crud_permission') ? ' is-invalid' : '' }}" name="crud_permission" value="1" {{ $roles->crud_permission == '1' ? 'checked' : '' }}>
                            <label> Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="crud_permission" type="radio" class="form-control{{ $errors->has('crud_permission') ? ' is-invalid' : '' }}" name="crud_permission" value="0" {{ $roles->crud_permission == '0' ? 'checked' : '' }}>
                            <label> Tidak</label>
                        </div>

                        @if ($errors->has('crud_permission'))
                            <div role="alert">
                                <small>
                                    <strong class="text-danger">{{ $errors->first('crud_permission') }}</strong>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="crud_user" class="col-md-4 col-form-label text-md-left">{{ __('CRUD User') }}</label>

                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="crud_user" type="radio" class=" form-control{{ $errors->has('crud_user') ? ' is-invalid' : '' }}" name="crud_user" value="1" {{ $roles->crud_user == '1' ? 'checked' : '' }}>
                            <label> Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="crud_user" type="radio" class="form-control{{ $errors->has('crud_user') ? ' is-invalid' : '' }}" name="crud_user" value="0" {{ $roles->crud_user == '0' ? 'checked' : '' }}>
                            <label> Tidak</label>
                        </div>

                        @if ($errors->has('crud_user'))
                            <div role="alert">
                                <small>
                                    <strong class="text-danger">{{ $errors->first('crud_user') }}</strong>
                                </small>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group-row">
                    <br style="margin-bottom: 10px">
                    <div class="form-group d-flex justify-content-end" style="margin-bottom: 50px">
                        <div>
                            <button type="submit" class="btn btn-primary rounded" style="padding-right: 30px; padding-left: 30px">
                                {{ __(' Simpan') }}
                            </button>
                            <span>&nbsp;&nbsp;</span>
                            <a class="btn btn-light border border-dark rounded" href="{{ route('permission') }}">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection