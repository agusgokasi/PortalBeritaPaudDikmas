<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-left">{{ __('Kode Warna') }}
    </label>
    <div class="col-md-10">
        <input id="color" type="color" class="form-control{{ $errors->has('background_color') ? ' is-invalid' : '' }}" name="background_color" value="{{ old('background_color') ? old('background_color') : $component->background_color }}" required autofocus> 
        @if ($errors->has('background_color'))
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $errors->first('background_color') }}</strong>
            </span> 
        @endif
    </div>
</div>