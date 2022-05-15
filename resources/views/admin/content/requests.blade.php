@extends('admin.index')

@section('content')
<table id="dataTable" class="display mt-3 " style="width:100%">
    <thead>
        <tr>
            <th>Request_id</th>
            <th>Type</th>
            <th>Request_val</th>
            <th>University_name</th>
            <th>Created</th>
            <th>Aceept</th>
            <th>Reject</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <script>
        var requestData = @json($requestData);
        var columns = ['id', 'type', 'request_val', 'university_name', 'created_at', 'accept', 'reject'];
        injectData(getRequestsDataTable(), requestData, columns);
    </script>
@endsection
