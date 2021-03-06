@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            @if ( request()->is('news'))
                List Berita
            @elseif(request()->is('konten'))
                @if (auth()->user()->role->add_content == 1)
                    Konten Saya
                @elseif(auth()->user()->role->approve_content == 1)
                    List Konten
                @elseif(auth()->user()->role->crud_permission == 1)
                List Konten
                @endif
            @elseif ( request()->is('headline') )
                List Headline
            @elseif ( request()->is('gallery') )
                List Galeri
            @endif
        </li>
    </ol>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <!-- DataTables Example -->
    @if( !request()->is('konten') )
        @if (auth()->user()->role->add_content == 1)
            @if ( request()->is('news') )
                <a class="btn btn-primary" href="/news/create"> buat berita</a><br><br>
            @elseif ( request()->is('headline') )
                <a class="btn btn-primary" href="/headline/create"> buat headline</a><br><br>
            @elseif ( request()->is('gallery') )
                <a class="btn btn-primary" href="/gallery/create"> buat galeri</a><br><br>
            @endif
        @endif
    @endif
    

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> 
                @if ( request()->is('news') )
                    List Berita
                @elseif ( request()->is('konten') )
                    @if (auth()->user()->role->add_content == 1)
                        List Konten Saya
                    @elseif(auth()->user()->role->approve_content == 1)
                        List Konten
                    @endif
                @elseif ( request()->is('headline') )
                    List Headline
                @elseif ( request()->is('gallery') )
                    List Galeri
                @endif
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="table_news" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            @if ( request()->is('news') )
                                <th>Judul Berita</th>
                            @elseif ( request()->is('konten') )
                                <th>Judul Konten</th>
                            @elseif ( request()->is('headline') )
                                <th>Judul Headline</th>
                            @elseif ( request()->is('gallery') )
                                <th>Judul Galeri</th>
                            @endif
                            @if( request()->is('konten') )
                            <th>Jenis Konten</th>
                            @endif
                            <th>Dibuat Oleh</th>
                            <th>Diedit Oleh</th>
                            <th>Tanggal Dibuat</th>
                            <th>Tanggal Diedit</th>
                            <th>Status</th>
                            <th>Detail</th>
                            {{-- route(konten) == content yg publish dan history content --}}
                            {{-- @if( !request()->is('konten') ) --}}
                                @if(auth()->user()->role->edit_content == 1)
                                    <th>Action</th>
                                @endif
                            {{-- @endif --}}
                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add_js')
    <script type="text/javascript">
        $(function () {
            //berita
            var apiNews;
            // all konten
            var apiKonten;
            //headline
            var apiHeadline;
            //gallery
            var apiGallery;

            @if ( request()->is('news'))
                apiNews ="{{ route('apiNews') }}";
                $('#table_news').DataTable({
                
                processing: true,
                serverSide: true,
                ajax: ""+apiNews,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'updated_by', name: 'updated_by'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'status', name: 'status'},
                    {data: 'detail', name: 'detail'},
                    {data: 'action', name: 'action'},
                ],
            });
            @elseif ( request()->is('headline'))
                apiHeadline ="{{ route('apiHeadline') }}";
                $('#table_news').DataTable({
                
                processing: true,
                serverSide: true,
                ajax: ""+apiHeadline,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'updated_by', name: 'updated_by'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'status', name: 'status'},
                    {data: 'detail', name: 'detail'},
                    {data: 'action', name: 'action'},
                ],
            });
            @elseif ( request()->is('gallery'))
                apiGallery ="{{ route('apiGallery') }}";
                $('#table_news').DataTable({
                
                processing: true,
                serverSide: true,
                // autoWidth: false,
                ajax: ""+apiGallery,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'updated_by', name: 'updated_by'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'status', name: 'status'},
                    {data: 'detail', name: 'detail'},
                    {data: 'action', name: 'action'},
                ],
            });
            @elseif ( request()->is('konten'))
                apiKonten ="{{ route('apiKonten') }}";
                $('#table_news').DataTable({
                
                processing: true,
                serverSide: true,
                // autoWidth: false,
                ajax: ""+apiKonten,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'jenis', name: 'jenis'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'updated_by', name: 'updated_by'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'status', name: 'status'},
                    {data: 'detail', name: 'detail'},
                    {data: 'action', name: 'action'},
                ],
            });
            @endif

            
        });
    </script>
@endsection

