@extends('layouts.admin')
@section('title','FAQ')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('sub_sub_category.faqadd',['subSubCategory'=>$subSubCategory]) }}" class="btn btn-primary btn-flat bg-gradient-primary">Add Question</a>
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
                        <th>Sub Sub Category</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($subCategoriesFaqs as $subCategoriesFaq)
                        <tr>

                            <td>{{ $subCategoriesFaq->sort }}</td>
                            <td>{{ $subCategoriesFaq->subSubCategory->name }}</td>
                            <td>{{ $subCategoriesFaq->question }}</td>
                            <td>{!! $subCategoriesFaq->answer !!}</td>
                            <td>
                                @if($subCategoriesFaq->status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('sub_sub_category.faqedit',['subSubCategoryfaq'=>$subCategoriesFaq->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a>
                                {{-- <a href="" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Sub Sub Category</th>
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
