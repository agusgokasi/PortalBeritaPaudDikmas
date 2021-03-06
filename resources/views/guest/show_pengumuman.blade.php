@extends('guest.app')

@section('content')
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb amber lighten-5">
				<li class="breadcrumb-item"><a class="black-text" href="/">Beranda</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li>
				<li class="breadcrumb-item"><a class="black-text" href="{{route('g_info_index')}}">Pengumuman</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li>
				<li class="breadcrumb-item active">{{ $pengumuman->name }}</li>
			</ol>
		</nav>
		<br>

		<div class="container">
			
		<div class="card z-depth-0">
			<div class="row">
				<span class="badge badge-info z-depth-0 text-left" style="margin: 20px">
						Published : {{($pengumuman->updated_at)->format('d-m-Y H:i:s') }}
				</span>
			</div>
			<div class="card-title text-center" style="padding-top: 30px">
				<h5 class="h3">{{ $pengumuman->name }}</h5>
			</div>
			@if ($pengumuman->banner != null)
				<div class="d-flex justify-content-center">
					<img class="d-block w-100 rounded" src="{{ asset('/banner/pengumuman/'. $pengumuman->banner ) }}" alt="{{ $pengumuman->title }}">
				</div>
			@endif
			<hr>
			<div class="card-body">
				{!! $pengumuman->detail !!}
			</div>
		</div>
	    	
		</div>
		
    	
    </div>
@endsection