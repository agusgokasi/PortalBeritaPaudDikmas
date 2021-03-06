@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">List Komponen</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Komponen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($components->count())
                            @foreach($components as $key => $component)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$component->name}}</td>
                                    @if(auth()->user()->role->edit_component == 1)
                                    <td>
                                        <a href="{{ route('edit_component', ['id' => $component->id]) }}" class="btn btn-outline-primary waves-effect btn-sm">Edit</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection