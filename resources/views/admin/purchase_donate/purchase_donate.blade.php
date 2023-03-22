@extends('layouts.admin')
@section('title','All Purchese Request')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Requested User Name</th>
                        <th>Approximate Needed Date</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->id }}</td>
                            <td>{{ $purchase->user_id }}</td>
                            <td>{{ $purchase->blood_group }}</td>
                            <td>{{ $purchase->approximate_date }}</td>
                            <td>{{ $purchase->address }}</td>
                            <td>
                                @if($purchase->status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>

                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a>
                                {{-- <a href="{{ route('about_faq.edit',['id'=>$aboutFaq->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a> --}}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Question</th>
                        <th>Answer</th>
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

