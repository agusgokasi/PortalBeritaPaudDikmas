@extends('guest.app')

@section('content')
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb amber lighten-5">
				<li class="breadcrumb-item"><a class="black-text" href="/">Beranda</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li>
				<li class="breadcrumb-item active">Berita</li>
				{{-- <li class="breadcrumb-item active">{{ $content->title }}</li> --}}
			</ol>
		</nav>
		<br>

<div class="d-flex row">
  @foreach($contents as $content)
  <div class="col-md-3 my-2">
    <div class="card">

      <!-- Card image -->
      <div class="view overlay">
        <img class="card-img-top" src="{{asset('/banner/thumbnews/' . $content->banner)}}" alt="Card image cap">
        <a href="{{route('g_news_show', ['id' => $content->id])}}">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!-- Card content -->
      <div class="card-body" style="height: 350px">
        
        <!-- Title -->
        <h6 class="card-title">{{ $content->title }}</h6>
        <!-- Text -->
        <small><p class="card-text" style="padding-bottom: 5px"><span class="badge badge-secondary z-depth-0">{{($content->updated_at)->format('d-m-Y') }}</span>&nbsp;{{ $content->description }}</p></small>
        <!-- Button -->
        <br>
        {{-- Author : {{$content->create_user->name}} --}}

      </div>
      <div class="card-body">
      <a href="{{route('g_news_show', ['id' => $content->id])}}" class="btn btn-outline-primary btn-sm btn-block">Selengkapnya</a>
      </div>
    </div>
  </div>
  @endforeach

  </div>
</div>
<div class="container d-flex justify-content-center">
	<div class="row">
		<div class="pagination justify-content-center">{{ $contents->links() }}</div>
	</div>
</div>
@endsection