@extends('layouts.app')

@section('content')
	<!-- Breadcrumbs-->
	<div class="container">
		<ol class="breadcrumb">
	        <li class="breadcrumb-item">
	            <a href="{{ route('home') }}">Dashboard</a>
	        </li>
	        <li class="breadcrumb-item">
	        	@if (auth()->user()->role->crud_permission == 1)
	            <a href="{{ route('konten') }}">Konten Saya</a>
		          @elseif(auth()->user()->role->add_content == 1)
		            <a href="{{ route('konten') }}">Konten Saya</a>
		          @elseif(auth()->user()->role->approve_content == 1)
	            <a href="{{ route('konten') }}">List Konten</a>
	          @endif
	        </li>
	        <li class="breadcrumb-item active">
	            {{ $content->title }}
	        </li>
	    </ol>	
	</div>
	@if($content->is_news == 1)
	<div class="container shw-news">
		<hr>
		<h3 class="h3">{{ $content->title }}</h3>
    	<div class="row">
			<div class="col-md-12">
				{!! $content->content !!}
			</div>
    	</div>
    	<hr>
		Thumbnail Image <img class="d-block" src="{{asset('/banner/thumbnews/' . $content->banner)}}">
    </div>
	@elseif($content->is_headline == 1)
	<div class="container">
    	<hr>
    	<h1>{{ $content->title }}</h1>
    	<img class="d-block w-100" src="{{asset('/banner/headline/' . $content->banner)}}">
		<p>{!! $content->content !!}</p>
    </div>
	@elseif($content->is_gallery == 1)
	<h1>{{ $content->title }}</h1>
    <img class="d-block" src="{{asset('/banner/t_gallery/' . $content->banner)}}">
    <p>{{ $content->description }}</p>
    <br>

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
	@endif
@endsection