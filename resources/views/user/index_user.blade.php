@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Manajemen User
        </li>
    </ol>
    
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            List User
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('create_user') }}">Tambah User</a>
            <br><br>
            <div class="table-responsive">
                <table id="users_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th class="th-sm">No</th>
                        <th class="th-sm">Nama User</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Permission</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</div>
<br>
@endsection

@section('add_js')
    <script type="text/javascript">
        $(function () {
            $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get-user') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'role.name', name: 'role.name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        });
    </script>
@endsection