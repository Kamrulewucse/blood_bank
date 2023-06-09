@extends('layouts.admin')
@section('title','Pending List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">

                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Requester Name</th>
                                <th>Donor Name</th>
                                <th>Donate Type</th>
                                <th>Address</th>
                                <th>Needed Date </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bloodRequests as $bloodRequest)
                                @if($bloodRequest->confirmation_status == 2 && $bloodRequest->userDetails->confirmation_status == 2)
                                <tr>
                                    <td>{{ $bloodRequest->takerName->name }}</td>
                                    <td>{{ $bloodRequest->giverName->name }}</td>
                                    <td>
                                        @if($bloodRequest->donate_type == 0)
                                            <span class="badge bg-success">Purchase</span>
                                        @elseif($bloodRequest->donate_type == 1)
                                            <span class="badge bg-info">Free Donate</span>
                                        @endif
                                    </td>
                                    <td>{{ $bloodRequest->address }}</td>
                                    <td>{{ $bloodRequest->date }}</td>

                                    <td>
                                        <span class="badge bg-info">Pending</span>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm">View</a>
                                        <a href="{{route('cancel_request', ['bloodRequest'=>$bloodRequest->id])}}" class="btn btn-danger btn-sm">Cancel</a>
                                        <a href="{{route('request_confirm', ['bloodRequest'=>$bloodRequest->id])}}" class="btn btn-success btn-sm">Confirm</a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Requester Name</th>
                                <th>Donor Name</th>
                                <th>Donate Type</th>
                                <th>Address</th>
                                <th>Needed Date </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("#table").DataTable({
                "responsive": true, "autoWidth": false,
                order: [
                    [1, 'asc'],
                    [2, 'asc'],
                ],
            });
        });
    </script>
@endsection
