@extends('layouts.app')

@section('content')
<div class="container">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Manajemen Kategori
        </li>
    </ol>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">Kategori</div>

        <div class="card-body">
        	<div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        	<th>No</th>
                        	<th>Nama Kategori</th>
                            <th>Jenis Kategori</th>
                            @if(auth()->user()->role->edit_category == 1)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                    @if($kategoris->count())
                        @foreach($kategoris as $key => $kategori)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$kategori->name}}</td>
                                <td>
                                    {{$kategori->is_content == 1 ? 'Konten' : ''}}
                                    {{$kategori->is_component == 1 ? 'Komponen' : ''}}
                                </td>
                                @if(auth()->user()->role->edit_category == 1)
                                <td>
                                    <a href="/kategori/{{$kategori->id}}/edit" class="btn btn-outline-primary waves-effect btn-sm">Edit</a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
