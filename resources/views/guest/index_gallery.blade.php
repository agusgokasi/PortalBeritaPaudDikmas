@extends('guest.app')

@section('content')
<div class="container">
	<br>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb amber lighten-5">
			<li class="breadcrumb-item"><a class="black-text" href="/">Beranda</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li>
			<li class="breadcrumb-item active">Galeri</li>
			{{-- <li class="breadcrumb-item active">{{ $content->title }}</li> --}}
		</ol>
	</nav>
	<br>

	<!-- Grid row -->
	<div class="row">

		@foreach ($galleries as $galeri)
			<div class="col-md-3 my-2">
	    		<div class="card">
					<div class="card-body">
						<div class="view overlay zoom">
							<a href="{{ route('g_gallery_show', ['id'=> $galeri->id]) }}">
								<img src="{{asset('/banner/t_gallery/' . $galeri->banner)}}" class="img-fluid img-thumbnail z-depth-1" alt="Responsive image">
								<div class="mask flex-center wave-effect wave-dark">
									<p class="white-text bg-dark badge rounded"> {{ $galeri->title }} </p>
								</div>
							</a>
						</div>

						<!-- Title -->
						<br>
						<h6 class="card-title text-center">{{ $galeri->title }}</h6>
						<!-- Text -->
						<small>
							<p class="card-text text-center" style="padding-bottom: 5px">
								<span class="badge badge-secondary z-depth-0 ">
									{{($galeri->updated_at)->format('d-m-Y') }}
								</span>
							</p>
						</small>

					</div>
				</div>
			</div>
		@endforeach
		
	</div>

</div>

<div class="container d-flex justify-content-md-center">
	<div class="row">
		<div class="pagination justify-content-center">{{ $galleries->links() }}</div>
	</div>
</div>

@endsection