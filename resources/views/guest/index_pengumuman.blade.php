@extends('guest.app')

@section('content')
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb amber lighten-5">
				<li class="breadcrumb-item"><a class="black-text" href="/">Beranda</a><i class="fas fa-caret-right mx-2"aria-hidden="true"></i></li>
				<li class="breadcrumb-item active">Pengumuman</li>
				{{-- <li class="breadcrumb-item active">{{ $pengumuman->title }}</li> --}}
			</ol>
		</nav>
		<br>

<div class="d-flex row">
  @foreach($pengumumans as $pengumuman)
    <div class="col-md-3 my-2">
      <div class="card">
        
        <!-- Card pengumuman -->
        <div class="card-body" style="height: 150px">
          
          <!-- Title -->
          <small><p class="card-text mb-2" style="padding-bottom: 5px"><span class="badge badge-secondary z-depth-0">{{($pengumuman->updated_at)->format('d-m-Y') }}</span>&nbsp;{{ $pengumuman->description }}</p></small>
          <h6 class="card-title">{{ $pengumuman->name }}</h6>

        </div>
        <div class="card-body">
        <a href="{{route('g_info_show', ['id' => $pengumuman->id])}}" class="btn btn-outline-primary btn-sm btn-block">Selengkapnya</a>
        </div>
      </div>
    </div>
  @endforeach

  </div>
</div>
<div class="container d-flex justify-pengumuman-center">
	<div class="row">
		<div class="pagination justify-pengumuman-center">{{ $pengumumans->links() }}</div>
	</div>
</div>
@endsection