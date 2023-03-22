@extends('layouts.app')
@section('title','Notifications Detail')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('mark_read') }}" class="btn btn-primary btn-flat bg-gradient-primary">Mark All Read</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Requested By </th>
                                <th>About Patient </th>
                                <th>Address</th>
                                <th>Needed Date</th>
                                <th>Contact Number</th>
                                <th>Patient Image</th>
                                <th>Send At</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{$bloodRequest->takerName->name}}</td>
                                    <td>{{$bloodRequest->about_patient ?? null}}</td>
                                    <td>{{$bloodRequest->address}}</td>
                                    <td>{{$bloodRequest->date}}</td>
                                    <td>{{$bloodRequest->contact_number}}</td>
                                    <td class="text-center"><img height="110px" width="130px" src="{{ asset($bloodRequest->image ?? null) }}" alt="Image Not Uploaded"></td>
                                    <td>{{$bloodRequest->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($notificationAccept)
                                            <a class="btn btn-success btn-sm" href="">Successfully Accepted </a>
                                        @else
                                            <a class="btn btn-info btn-sm" href="{{route('notification_accept',['bloodRequest'=>$bloodRequest->id])}}">Accept Request</a>
                                        @endif
                                    </td>
                               </tr>

                            </tbody>
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
            });

        });
    </script>
@endsection
