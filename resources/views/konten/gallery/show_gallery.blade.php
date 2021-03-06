@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('gallery') }}">Manajemen Galeri</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $content->title }}
        </li>
    </ol>

    <div class="d-flex justify-content-end container">
        <div>
            @if($content->status == 1)
                @if ( auth()->user()->role->approve_content == 1)
                    <div class="col-12 d-flex">
                        <a class="btn btn-warning rounded" href="{{ route('edit_gallery', ['id' => $content->id]) }}">edit</a>&nbsp;&nbsp;
                        <a class="btn btn-success rounded" href="{{ route('approve_gallery', ['id' => $content->id]) }}" onclick="return confirm('1 Galeri akan di approve')">lanjutkan approve</a>&nbsp;&nbsp;
                        <a class="btn btn-danger rounded" href="{{ route('reject_gallery', ['id' => $content->id]) }}" onclick="return confirm('1 Galeri akan di reject')">lanjutkan Reject</a>&nbsp;&nbsp;
                    </div>
                @endif
            @endif
        </div>
    </div>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <br>
    <h1>{{ $content->title }}</h1>
    <img class="d-block" src="{{asset('/banner/t_gallery/' . $content->banner)}}">
    <p>{{ $content->description }}</p>
    <br>
    @if(!$content->status == 1 && !$content->status == 2)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-plus"></i> Tambah Foto</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                @include('konten.gallery._create_photo_form')
              </div>

            </div>
          </div>
        </div>
    @endif

    @if(!$photos->count() == 0)
    <br><hr><br>
    <h1>List Foto</h1>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>List Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($photos->count())
                    @foreach($photos as $key => $photo)
                        <tr>
                            <td>{{++$key}}</td>
                            <td><a class="btn btn-light border border-dark btn-sm rounded" target="_blanck" href="{{ asset('/banner/gallery/' . $photo->filename) }}">{{ __('Lihat Foto') }}</a></td>
                            @if(auth()->user()->role->add_content == 1)
                                @if($content->status == 0)
                                <td>
                                <form action="/photo/{{$photo->id}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Hapus Photo" type="submit" onclick="return confirm('Kamu yakin ingin menghapus photo ini?');">Hapus</button>
                                </form>
                                </td>
                                @else
                                <td>-</td>
                                @endif
                            @elseif(auth()->user()->role->approve_content == 1)
                                @if($content->status == 1)
                                <td>
                                <form action="/photo/{{$photo->id}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Hapus Photo" type="submit" onclick="return confirm('Kamu yakin ingin menghapus photo ini?');">Hapus</button>
                                </form>
                                </td>
                                @else
                                <td>-</td>
                                @endif
                            @else
                            <td>-</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @endif
@endsection

@section('add_js')
    <script type="text/javascript">
        @switch($errors)
            @case($errors->has('filename'))
                $('#exampleModal').modal('show');
                @break
            @default
        @endswitch
    </script>
@endsection