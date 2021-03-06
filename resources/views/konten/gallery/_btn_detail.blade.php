<a class="btn btn-sm btn-outline-primary btn-block rounded" href="{{ route('detail_gallery', ['id'=> $id] ) }}">detail</a>

{{-- content rejected --}}
@if($status == 9)
	@if ( auth()->user()->role->edit_content == 1)
	    <a class="btn btn-sm btn-danger btn-block rounded" href="{{ route('edit_gallery', ['id' => $id]) }}">Lihat Kesalahan</a><br>
	@endif
@endif