@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Permission
        </li>
    </ol>

    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-header">Permission</div>

        <div class="card-body">
        	<a class="btn btn-primary" href="{{ route('create_permission') }}">
                <i class="fa fa-plus"></i>
                Buat Permission
            </a>
            <br><br>
        	<div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        	<th>No</th>
                        	<th>Nama Permission</th>
                            <th>List Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($roles->count())
                        @foreach($roles as $key => $role)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <small>
                                        {{ $role->add_content == 1 ? 'Tambah Konten, ' : ''  }}
                                        {{ $role->edit_content == 1 ? 'Edit Konten, ' : ''  }}
                                        {{ $role->read_content == 1 ? 'Membaca Konten, ' : ''  }}
                                        {{ $role->approve_content == 1 ? 'Approve Konten, ' : ''  }}
                                        {{ $role->crud_user == 1 ? 'CRUD User, ' : ''  }}
                                        {{ $role->crud_permission == 1 ? 'CRUD Permission, ' : ''  }}
                                        {{ $role->read_category == 1 ? 'Read Kategori, ' : ''  }}
                                        {{ $role->edit_category == 1 ? 'Edit Kategori, ' : ''  }}
                                        {{ $role->edit_component == 1 ? 'Edit Komponen, ' : ''  }}
                                        {{ $role->read_component == 1 ? 'Read Komponen' : ''  }}
                                    </small>
                                </td>
                                <td>
                                    <a href="{{ route('edit_permission' , ['id' => $role->id]) }}" class="btn btn-outline-primary waves-effect btn-sm">Edit</a>
                                    <form action="/permission/{{$role->id}}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Hapus Permission" type="submit" onclick="return confirm('Kamu yakin ingin menghapus permission ini?');">Hapus</button>
                                    </form>
                                </td>
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
