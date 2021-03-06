@extends('layouts.app')

@section('content')
	<!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Aplikasi Paud Dikmas
        </li>
    </ol>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-plus"></i> Tambah Aplikasi</button><br><br>
            @include('app_padi.create')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> 
                List Apliaksi Paud Dikmas
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="table_app" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Ikon</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($app_padis->count())
                            @foreach($app_padis as $key => $app_padi)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$app_padi->name}}</td>
                                    <td>
                                        <img src="{{ asset('banner/app_padi/'. $app_padi->icon ) }}">
                                    </td>
                                    <td>
                                        {{$app_padi->link}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#exampleModal{{$app_padi->id}}" data-id="{{$app_padi->id}}" data-name="{{$app_padi->name}}" data-link="{{$app_padi->link}}"><i class="fas fa-edit"></i> Edit Aplikasi</button>
                                        @include('app_padi.edit')
                                        <form action="{{ route('apps.destroy', ['id' => $app_padi->id] ) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button onclick="return confirm('Hapus Aplikasi ini?');" type="submit" class="btn btn-danger btn-sm btn-block">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="pagination justify-content-center">{{ $app_padis->links() }}</div>
        </div>
    </div>

@endsection

@section('add_js')
    <script>

        @switch($errors)
            @case($errors->has('name'))
                $('#exampleModal').modal('show');
                @break
            @case($errors->has('icon'))
                $('#exampleModal').modal('show');
                @break
            @case($errors->has('link'))
                $('#exampleModal').modal('show');
                @break
            @case($errors->has('name'))
                $('#exampleModal{{$app_padi->id}}').modal('show');
                @break
            @case($errors->has('icon'))
                $('#exampleModal{{$app_padi->id}}').modal('show');
                @break
            @case($errors->has('link'))
                $('#exampleModal{{$app_padi->id}}').modal('show');
                @break
            @default
        @endswitch
        
    </script>
@endsection
