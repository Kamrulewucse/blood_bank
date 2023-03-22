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
                                <th>Requester Name</th>
                                <th>Blood Group</th>
                                <th>Requester Phone</th>
                                <th>About Patient</th>
                                <th>Address</th>
                                <th>Request Area</th>
                                <th>Needed Date </th>
                                <th>Patient Image </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bloodRequests as $bloodRequest)
                               <tr>
                                    <td>{{ $bloodRequest->takerName->name }}</td>
                                    <td>{{ $bloodRequest->blood_group }}</td>
                                    <td>{{ $bloodRequest->contact_number }}</td>
                                    <td>{{ $bloodRequest->about_patient ?? null }}</td>
                                    <td>{{ $bloodRequest->address }}</td>
                                    <td>{{ $bloodRequest->division->name ?? null }},{{ $bloodRequest->district->name ?? null }},{{ $bloodRequest->thana->name ?? null }}</td>
                                    <td>{{ $bloodRequest->date }}</td>
                                   <td class="text-center"><img height="110px" width="130px" src="{{ asset($bloodRequest->image ?? null) }}" alt="Image Not Uploaded"></td>
                                   <td>
                                      <a href="javascript:void(0)" type="button" class="btn btn-primary openModal"  data-id="{{$bloodRequest->id}}" >Confirm</a>
                                      <a href="{{route('request_accept_list',['bloodRequest'=>$bloodRequest->id])}}" type="button" class="btn btn-success" >Accept List</a>
                                  </td>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Requester Name</th>
                                <th>Requester Phone</th>
                                <th>About Patient</th>
                                <th>Address</th>
                                <th>Request Area</th>
                                <th>Needed Date </th>
                                <th>Patient Image </th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="userUpdate">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content text-center">
                            <div class="modal-body">
                                <form id="userUpdate" action="{{route('blood_request.approve')}}" enctype="multipart/form-data" name="modal-edit-form">
                                    @csrf

                                    <div class="form-group">
                                        <input type="hidden" id="userId" name="id" value=""/>
                                        <label for="user_id" class="">Select Donor</label>
                                        <div class="">
                                            <select name="user_id" id="user_id" class="select2">
                                                <option value="">Select Donor</option>
                                                @foreach($allUsers as $allUser)
                                                    <option {{ old('user_id') == $allUser->id ? 'selected' : '' }} value="{{ $allUser->id }}">{{ $allUser->user->name }} ({{$allUser->phone}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
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

    <script>
        $(document).on('click', '.openModal', function () {
            var id = $(this).data('id');
            $('#userId').val(id);

            $('#userUpdate').modal('show');
        })
    </script>

@endsection
