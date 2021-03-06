@extends('layouts.app')

@section('content')

<div class="container">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('user') }}">Manajemen User</a>
        </li>
        <li class="breadcrumb-item active">
            Edit User
        </li>
    </ol>


    <div class="card">

        <div class="card-header text-center">Edit User</div>

        <div class="card-body">

            <form method="post" role="form" action="/user/{{$users->id}}" enctype="multipart/form-data">
                
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama User') }}</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $users->name}}" required autofocus> 
                        @if ($errors->has('name'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
                    <div class="col-md-8">
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ? old('email') : $users->email}}" required autofocus> 
                        @if ($errors->has('email'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-left">{{ __('Permission') }}
                    </label>
                    <div class="col-md-8">
                        <select name="role" style="font-size: 15px" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" id="role" value="{{ old('role') }}" required>
                          <option value="{{$users->role_id}}">{{$users->role->name}}</option>
                          @foreach($roles as $role)
                          @if($users->role_id !== $role->id)
                          <option value="{{$role->id}}">{{$role->name}}</option>
                          @endif
                          @endforeach
                      </select> 
                        @if ($errors->has('role'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('role') }}</strong>
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
                            <a class="btn btn-light border border-dark rounded" href="{{ route('user') }}">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection