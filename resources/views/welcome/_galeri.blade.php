<h4 class="h4 text-center"><i class="far fa-images"></i> &nbsp;Galeri Foto</h4>
<hr class="orange" style="height: 2px">

<!-- Grid row -->
<div class="row">

	@foreach ($galleries as $galeri)
		<div class="col-lg-6 mb-3">
			<div class="view overlay zoom">
				<a href="{{ route('g_gallery_show', ['id'=> $galeri->id]) }}">
					<img src="{{asset('/banner/t_gallery/' . $galeri->banner)}}" class="img-fluid img-thumbnail z-depth-1" alt="Responsive image">
					<div class="mask flex-center wave-effect wave-dark">
						<p class="white-text bg-dark badge rounded"> {{ $galeri->title }} </p>
					</div>
				</a>
			</div>
		</div>
	@endforeach
	
</div>

<div class="d-flex justify-content-md-center">
	<a href="{{ route('g_gallery_index') }}" class="btn btn-primary btn-sm">Lihat Galeri Lainnya</a>
</div>
