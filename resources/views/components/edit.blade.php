@extends('layouts.app') 

@section('content')
<div class="container">

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header text-center">Edit Komponent : {{ $component->name }}</div>

        <div class="card-body">
        	
            <form method="post" role="form" action="{{ route('update_component', ['id' => $component->id]) }}" enctype="multipart/form-data" id="myForm">
                
                {{ csrf_field() }}
                @method('PUT')

                @if ($component->is_navbar == 1 || $component->is_navbar_2 ==1 )
                    @include('components._form_navbar')
                @elseif ($component->is_page == 1 || $component->is_page_link ==1 )
                    @include('components._form_page')
                @endif

                <div class="form-group">
                    <div>
                        <div class="form-group d-flex justify-content-center" style="margin-bottom: 50px">
                            <div>
                                <button type="submit" class="btn btn-success btn-md" style="margin-right: 100px">
                                    <i class="fa fa-save">{{ __(' Simpan') }}</i>
                                </button>
                                <a class="btn btn-neutral btn-md" href="/components" style="border: solid 1px;">{{ __('Batal') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
        
</div>
@endsection

@section('add_js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
          };

        CKEDITOR.replace('content',options);
        

    </script>
@endsection