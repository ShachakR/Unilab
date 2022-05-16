@extends('admin.index')

@section('content')
<table id="dataTable" class="display mt-3 " style="width:100%">
    <thead>
        <tr>
            <th>User_id</th>
            <th>Username</th>
            <th>Is_Admin</th>
            <th>Email</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <script>
        var userData = @json($userData);
        var currentUsername = @json(Auth::user()->username);
        var columns = ['id', 'username', 'is_admin', 'email', 'created_at'];
        injectData(getUsersDataTable(), userData, columns);
    </script>
@endsection
