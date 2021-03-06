@extends('guest.app')

@section('content')
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb amber lighten-5">
				<li class="breadcrumb-item"><a class="black-text" href="/">Beranda</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li>
				<li class="breadcrumb-item active">Applikasi Paud-Dikmas</li>
			</ol>
		</nav>
		<br>

		<div class="container">
			<div class="d-flex row">
				@foreach($padis as $padi)
				<div class="card m-3">
					<div class="card-body">
						<img src="{{ asset('banner/app_padi/'. $padi->icon ) }}">
						<a href="{{$padi->link}}" target="_blank">
							<h5 class="h5 text-center text-dark">{{ $padi->name }}</h5>
						</a>
				</div>
				</div>
				@endforeach
			</div>
		</div>
		
		<div class="container d-flex justify-content-center">
			<div class="row">
				<div class="pagination justify-content-center">{{ $padis->links() }}</div>
			</div>
		</div>
    	
    </div>
@endsection