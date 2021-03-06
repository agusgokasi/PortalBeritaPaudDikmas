@extends('guest.app')

@section('add_css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
@endsection

@section('add_js')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

	<script type="text/javascript">
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
	</script>
@endsection

@section('content')
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb amber lighten-5">
				<li class="breadcrumb-item">
					<a class="black-text" href="/">Beranda</a>
					<i class="fas fa-caret-right mx-2"aria-hidden="true"></i>
				</li>
				<li class="breadcrumb-item">
					<a class="black-text" href="/galeri/g/list">Galeri</a>
					<i class="fas fa-caret-right mx-2"aria-hidden="true"></i>
				</li>
				<li class="breadcrumb-item active">
					{{ $contents->title }}
				</li>
			</ol>
		</nav>

		<span class="badge badge-info z-depth-0 text-left">
				Author : {{$contents->create_user->name}} <br><br>
				Published : {{($contents->updated_at)->format('d-m-Y H:i:s') }}
		</span>

		<br><br>
		<h1 class="text-center">{{ $contents->title }}</h1>
		<hr>



		{{-- gallery start --}}
		<div class="row">

			@foreach ($photos as $photo)
				<a href="{{asset('/banner/gallery/' . $photo->filename)}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2 my-2">
	                <img src="{{asset('/banner/gallery/' . $photo->filename)}}" class="img-fluid">
	            </a>
			@endforeach
		</div>
		
    	
    </div>

    <div class="container d-flex justify-content-md-center">
		<div class="row">
			<div class="pagination justify-content-center">{{ $photos->links() }}</div>
		</div>
	</div>

@endsection