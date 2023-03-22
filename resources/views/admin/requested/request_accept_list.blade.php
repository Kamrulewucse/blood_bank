@extends('layouts.admin')
@section('title','Requested Accepted List')
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
                                <th>Acceptor Name</th>
                                <th>Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requestAcceptLists as $requestAcceptList)
                                <tr>
                                    <td>{{ $requestAcceptList->requester->name ?? '' }}</td>
                                    <td>{{ $requestAcceptList->acceptor->name }}</td>
                                    <td>{{ $requestAcceptList->contact_number }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Requester Name</th>
                                <th>Acceptor Name</th>
                                <th>Mobile</th>
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
