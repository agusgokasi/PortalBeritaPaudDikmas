@extends('guest.app')

@section('content')
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb amber lighten-5">
				<li class="breadcrumb-item">
					<a class="black-text" href="/">Beranda</a>
					<i class="fas fa-caret-right mx-2"aria-hidden="true"></i>
				</li>
				<li class="breadcrumb-item active">
					{{ $contents->title }}
				</li>
			</ol>
		</nav>
		<br>

		
		<div class="container">
			<div class="row shw-news">
				<hr>
				<div class="card z-depth-0">
					<div class="row">
						<span class="badge badge-info z-depth-0 text-left" style="margin: 20px">
								Author : {{$contents->create_user->name}} <br><br>
								Published : {{($contents->updated_at)->format('d-m-Y H:i:s') }}
						</span>
					</div>
					<div class="d-flex justify-content-center">
						<img class="d-block w-100 rounded" src="{{ asset('/banner/headline/'. $contents->banner ) }}" alt="{{ $contents->title }}">
					</div>
					
					<div class="card-title text-center" style="padding-top: 30px">
						<h3 class="h3">{{ $contents->title }}</h3>
					</div>
					<div class="card-body">
						{!! $contents->content !!}
					</div>
				</div>
	    	
	    	</div>	
		</div>
		
    	
    </div>
@endsection