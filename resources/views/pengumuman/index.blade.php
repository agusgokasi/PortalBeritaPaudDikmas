@extends('layouts.app')

@section('content')
	<!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ route('home') }}">Dashboard</a>
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

    <a href="{{ route('pengumum.create') }}" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Pemngumuman</a><br><br>
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> 
                List Pengumuman Paud Dikmas
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="table_app" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Banner</th>
                            <th>Isi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengumumans as $key => $pengumuman)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$pengumuman->name}}</td>
                                <td>
                                @if($pengumuman->banner == null)
                                Tidak Ada Banner
                                @else
                                    <a href="{{ asset('banner/pengumuman/'. $pengumuman->banner ) }}" target="_blank">{{ $pengumuman->banner }}</a>
                                @endif
                                </td>
                                <td>
                                    {{$pengumuman->content}}
                                </td>
                                <td>
                                    <a href="{{ route('pengumum.edit', ['pengumum' => $pengumuman->id]) }}" class="btn btn-warning btn-sm btn-block" ><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ route('g_info_show', ['id' => $pengumuman->id]) }}" class="btn btn-outline-primary btn-sm btn-block" target="_blank"><i class="fas fa-link"></i> Detail</a>
                                    <form action="{{ route('pengumum.destroy', ['id' => $pengumuman->id] ) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="return confirm('Hapus Pengumuman ini?');" type="submit" class="btn btn-danger btn-sm btn-block mt-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <br>

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="pagination justify-content-center">{{ $pengumumans->links() }}</div>
        </div>
    </div>
@endsection

@section('add_js')
    <script>

        @switch($errors)
            @case($errors->has('name'))
                $('#exampleModal').modal('show');
                @break
            @case($errors->has('banner'))
                $('#exampleModal').modal('show');
                @break
            @case($errors->has('content'))
                $('#exampleModal').modal('show');
                @break
            @case($errors->has('name'))
                $('#exampleModal{{$pengumumans->id}}').modal('show');
                @break
            @case($errors->has('banner'))
                $('#exampleModal{{$pengumumans->id}}').modal('show');
                @break
            @case($errors->has('content'))
                $('#exampleModal{{$pengumumans->id}}').modal('show');
                @break
            @default
        @endswitch
        
    </script>


@endsection
