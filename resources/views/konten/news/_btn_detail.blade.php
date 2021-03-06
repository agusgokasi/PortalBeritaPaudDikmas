<a class="btn btn-sm btn-outline-primary btn-block rounded" href="{{ route('detail_news', ['id'=> $id] ) }}">detail</a>

{{-- content rejected --}}
@if($status == 9)
	@if ( auth()->user()->role->edit_content == 1)
	    <a class="btn btn-sm btn-danger btn-block rounded" href="{{ route('edit_news', ['id' => $id]) }}">Lihat Kesalahan</a>
	@endif
@endif