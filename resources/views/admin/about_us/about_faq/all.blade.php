@extends('layouts.admin')
@section('title','FAQ')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('about_faq.add') }}" class="btn btn-primary btn-flat bg-gradient-primary">Add Question</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($aboutFaqs as $aboutFaq)
                        <tr>
                            <td>{{ $aboutFaq->id }}</td>
                            <td>{{ $aboutFaq->question }}</td>
                            <td>{!! $aboutFaq->answer !!}</td>
                            <td>
                                @if($aboutFaq->status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('about_faq.edit',['id'=>$aboutFaq->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a>

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

