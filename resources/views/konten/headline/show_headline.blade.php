@extends('layouts.app')

@section('content')

	<!-- Breadcrumbs-->
	<div class="container">
		<ol class="breadcrumb">
	        <li class="breadcrumb-item">
	            <a href="{{ route('home') }}">Dashboard</a>
	        </li>
	        <li class="breadcrumb-item">
	            <a href="{{ route('headline') }}">Manajemen Headline</a>
	        </li>
	        <li class="breadcrumb-item active">
	            {{ $content->title }}
	        </li>
	    </ol>	
	</div>

	<div class="container">
		@if (session('msg'))
	        <div class="alert alert-success" role="alert">
	            {{ session('msg') }}
	        </div>
	    @endif
	</div>

	<div class="d-flex justify-content-end container">
    	<div>
			@if($content->status == 1)
				@if ( auth()->user()->role->approve_content == 1)
				<div class="col-12 d-flex">
					<a class="btn btn-warning rounded" href="{{ route('edit_headline', ['id' => $content->id]) }}">edit</a>&nbsp;&nbsp;
					<a class="btn btn-success rounded" href="{{ route('approve_headline', ['id' => $content->id]) }}" onclick="return confirm('1 Headline akan di approve')">lanjutkan approve</a>&nbsp;&nbsp;
					<a class="btn btn-danger rounded" href="{{ route('reject_headline', ['id' => $content->id]) }}" onclick="return confirm('1 Headline akan di reject')">lanjutkan Reject</a>&nbsp;&nbsp;
				</div>
				@endif

			@endif
		</div>
    </div>
	
	
	<div class="container">
    	<hr>
    	<h1>{{ $content->title }}</h1>
    	<img class="d-block w-100" src="{{asset('/banner/headline/' . $content->banner)}}">
		<p>{!! $content->content !!}</p>
    </div>
@endsection