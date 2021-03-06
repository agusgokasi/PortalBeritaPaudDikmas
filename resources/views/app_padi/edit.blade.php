<div class="modal fade" id="exampleModal{{$app_padi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Aplikasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form method="post" action="{{ route('apps.update', ['id' => $app_padi->id]) }}" enctype="multipart/form-data" id="myForm{{$app_padi->id}}">

              <div class="form-group">
                <label for="name" class="col-form-label">Nama :</label>

                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ old('name') ? old('name') : $app_padi->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group">
                <label for="icon" class="col-form-label">Ikon :</label>

                <input type="file" class="form-control-file{{ $errors->has('icon') ? ' is-invalid' : '' }}" id="icon" name="icon" value="{{ old('icon') }}">

                @if ($errors->has('icon'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('icon') }}</strong>
                    </span>
                @else
                    <small>
                        <span class="text-danger" role="alert">
                            <strong>(Tidak Wajib diisi)</strong>
                        </span>
                    </small>
                @endif
              </div>

              <div class="form-group">
                <label for="link" class="col-form-label">URL :</label>

                <input type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" id="link" name="link" value="{{ old('link') ? old('link') : $app_padi->link }}">

                @if ($errors->has('link'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('link') }}</strong>
                    </span>
                @endif
              </div>

              @csrf
              @method('PUT')
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
            </form>
            
          </div>

        </div>
      </div>
    </div>

@section('add_js')
  <script>
    $('#exampleModal{{$app_padi->id}}').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var id = button.data('id')
      var name = button.data('name')
      var link = button.data('link')


      var modal = $(this)

      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #link').val(link);
    })
  </script>
@endsection