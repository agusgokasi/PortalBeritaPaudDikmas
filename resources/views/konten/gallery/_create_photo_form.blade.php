<form method="post" role="form" action="{{ route('post_photos', ['id' => $content->id]) }}" enctype="multipart/form-data" id="myForm">
        {{ csrf_field() }}
    <div class="form-group">
        <div>
            <label for="filename" class="form-label">{{ __('Photo') }}</label>
            <input type="file" name="filename" style="font-size: 15px" class="form-control{{ $errors->has('filename') ? ' is-invalid' : '' }}" id="filename" value="{{ old('filename') }}" required>
            @if ($errors->has('filename'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('filename') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save">{{ __(' Submit') }}</i>
            </button>
        </div>
        
    </div>
</form>