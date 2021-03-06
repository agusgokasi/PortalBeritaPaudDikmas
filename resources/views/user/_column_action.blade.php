<a href="{{ route('edit_user', ['id' => $id] ) }}" class="edit btn btn-primary btn-sm">Edit</a>
<span>&nbsp;</span>
<form action="{{ route('hapus.user', ['id' => $id] ) }}" method="POST" style="display: inline">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button onclick="return confirm('Hapus User?');" type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>