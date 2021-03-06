<div class="form-group">
    <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Nama Komponen') }}
    </label>
    <div class="col-md-12">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $component->name }}" required autofocus> 
        @if ($errors->has('name'))
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span> 
        @endif
    </div>
</div>

<div class="form-group">
    <label for="content" class="col-md-2 col-form-label text-md-left">{{ __('Konten') }}</label>
    <div class="col-md-12">
        <textarea name="content" style="font-size: 15px" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" value="{{ old('content') }}" required>{!! old('content') ? old('content') : $component->content !!}</textarea>
        @if ($errors->has('content'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
    </div>
</div>