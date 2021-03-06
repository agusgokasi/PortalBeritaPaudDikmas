@if($status == 0)
	@if( auth()->user()->role->add_content == 1)
	<a class="btn btn-sm btn-warning btn-block" href="{{ route('edit_gallery', ['id' => $id]) }}">edit</a>
		<form action="{{ route('delete_gallery', ['id' => $id] ) }}" method="POST">
		    @csrf
		    <input type="hidden" name="_method" value="DELETE">
		    <button onclick="return confirm('Hapus Berita ini?');" type="submit" class="btn btn-danger btn-sm btn-block">Hapus</button>
		</form>
		<a class="btn btn-sm btn-success btn-block" href="{{ route( 'submit_gallery', [$id => $id] ) }}" onclick="return confirm('1 Galeri akan di submit')">submit</a>
	@endif
{{-- content submited --}}
@elseif($status == 1)
	@if ( auth()->user()->role->approve_content == 1)
	{{-- <a href="{{ route('approve_gallery', ['id' => $id]) }}" onclick="return confirm('1 Galeri akan di approve')">approve</a><br> --}}
	<a class="btn btn-sm btn-success btn-block" href="{{ route('detail_gallery', ['id'=> $id] ) }}">approve</a>
	{{-- <a href="{{ route('reject_gallery', ['id' => $id]) }}" onclick="return confirm('1 Galeri akan di reject')">Reject</a><br> --}}
	<a class="btn btn-sm btn-danger btn-block" href="{{ route('detail_gallery', ['id'=> $id] ) }}">Reject</a>
	@endif
	@if( auth()->user()->role->add_content == 1)
		-
	@endif
{{-- content rejected --}}
@elseif($status == 9)
	@if( auth()->user()->role->add_content == 1)
	    <a class="btn btn-sm btn-warning btn-block" href="{{ route('edit_gallery', ['id' => $id]) }}">edit</a>
	    <form action="{{ route('delete_gallery', ['id' => $id] ) }}" method="POST">
		    @csrf
		    <input type="hidden" name="_method" value="DELETE">
		    <button onclick="return confirm('Hapus Berita ini?');" type="submit" class="btn btn-danger btn-sm btn-block">Hapus</button>
		</form>
		<a class="btn btn-sm btn-success btn-block" href="{{ route( 'submit_gallery', [$id => $id] ) }}" onclick="return confirm('1 Galeri akan di submit')">submit</a>
	@endif
{{-- content approved/publish --}}
@elseif($status == 2)
		-
@endif