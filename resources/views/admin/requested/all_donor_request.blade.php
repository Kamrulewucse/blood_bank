@extends('layouts.admin')
@section('title','Requested List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">

                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Donor Name</th>
                                <th>Donate Type</th>
                                <th>Address</th>
                                <th>Needed Date </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donateRequests as $donateRequest)
                                @if( $donateRequest->confirmation_status == 3 && $donateRequest->userDetails->confirmation_status == 3  )
                                    <tr>
                                        <td>{{ $donateRequest->takerName->name }}</td>
                                        <td>{{ $donateRequest->giverName->name }}</td>
                                        <td>
                                            @if($donateRequest->donate_type == 0)
                                                <span class="badge bg-success">Purchase</span>
                                            @elseif($donateRequest->donate_type == 1)
                                                <span class="badge bg-info">Free Donate</span>
                                            @endif
                                        </td>
                                        <td>{{ $donateRequest->userPost->address }}</td>
                                        <td>{{ $donateRequest->userPost->date_blood_needed }}</td>

                                        <td>
                                            <a href="" class="btn btn-warning btn-sm">View</a>
                                            <a href="{{route('donate_cancel_request', ['donorRequest'=>$donateRequest->id])}}" class="btn btn-danger btn-sm">Cancel</a>
                                            <a href="{{route('donate_approve_request', ['donorRequest'=>$donateRequest->id])}}" class="btn btn-success btn-sm">Approve</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Patient Name</th>
                                <th>Donor Name</th>
                                <th>Donate Type</th>
                                <th>Address</th>
                                <th>Needed Date </th>
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
