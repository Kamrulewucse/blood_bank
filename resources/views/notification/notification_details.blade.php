@extends('layouts.app')
@section('title','Notifications Details')
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
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>Send At</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($bloodRequests as $bloodRequest)
                                <tr>
                                  <td>{{$bloodRequest->takerName->name}}</td>
                                  <td>{{$bloodRequest->address}}</td>
                                  <td>{{$bloodRequest->contact_number}}</td>
                                  <td>{{$bloodRequest->created_at->diffForHumans()}}</td>
                              </tr>
                            @endforeach
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
