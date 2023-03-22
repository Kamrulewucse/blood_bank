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
                                <th>User Name</th>
                                <th>Blood Group</th>
                                <th>Age</th>
                                <th>Last Donate Date</th>
                                <th>Weight</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($allUsers as $allUser)
                                @php
                                    $old = strtotime($allUser->last_blood_donate);
                                   $difference = time()- $old;
                                   $days = round($difference / 86400)
                                @endphp
                                    <tr>
                                        <td>{{$allUser->user->name}}</td>
                                        <td>{{$allUser->blood_group}}</td>
                                        <td>{{$allUser->age}}</td>
                                        <td>{{$allUser->last_blood_donate}}</td>
                                        <td>{{$allUser->weight}}</td>
                                        <td>{{$allUser->phone}}</td>
                                        <td>{{$allUser->district->name}}</td>
                                        @if($days >=90)
                                            <td><span class="badge bg-success">Available</span></td>
                                        @else
                                            <td><span class="badge bg-danger">Not Available</span></td>
                                        @endif
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>User Name</th>
                                <th>Blood Group</th>
                                <th>Age</th>
                                <th>Last Donate Date</th>
                                <th>Weight</th>
                                <th>Phone</th>
                                <th>District</th>
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
