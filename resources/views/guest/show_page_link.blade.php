@extends('guest.app')

@section('content')
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb amber lighten-5">
				<li class="breadcrumb-item"><a class="black-text" href="/">Beranda</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li>
				{{-- <li class="breadcrumb-item"><a class="black-text" href="#">Library</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li> --}}
				<li class="breadcrumb-item active">{{ $component->name }}</li>
			</ol>
		</nav>
		<br>

		<div class="row container">
			<div class="col-md-12 card bg-transparent z-depth-0">
				{!! $component->content !!}
			</div>
		</div>

	</div>
@endsection