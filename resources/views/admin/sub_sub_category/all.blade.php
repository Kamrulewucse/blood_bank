@extends('layouts.admin')
@section('title','Sub Sub Categories')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('sub_sub_category.add') }}" class="btn btn-primary btn-flat bg-gradient-primary">Add Sub Sub Category</a>
                    </div>
                    <div class="col-md-9">
                        <form id="filter-form" action="{{ route('sub_sub_category') }}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <select name="category" id="category" class="form-control select2">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option {{ request('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <select name="sub_category" id="sub_category" class="form-control select2">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                       <button class="btn btn-danger">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Name</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subSubCategories as $subSubCategory)
                        <tr>
                            <td>{{ $subSubCategory->sort }}</td>
                            <td>{{ $subSubCategory->category->name }}</td>
                            <td>{{ $subSubCategory->subCategory->name }}</td>
                            <td>{{ $subSubCategory->name }}</td>
                            <td>{{ $subSubCategory->short_description }}</td>
                            <td><img height="100px" src="{{ asset($subSubCategory->thumbs) }}" alt=""></td>
                            <td>
                                @if($subSubCategory->status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('sub_sub_category.edit',['subSubCategory'=>$subSubCategory->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('sub_sub_category_faq',['subSubCategory'=>$subSubCategory->id]) }}" class="btn btn-success btn-sm">FAQ</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Name</th>
                        <th>Short Description</th>
                        <th>Image</th>
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


            var subCategorySelected = '{{ request('sub_category')}}';
            var subSubCategorySelected = '{{ request('sub_sub_category')}}';

            $('#category').change(function () {
                var categoryId = $(this).val();

                $('#sub_category').html('<option value="">Select Sub Category</option>');

                if (categoryId != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('admin.get_sub_category') }}",
                        data: { categoryId: categoryId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (subCategorySelected == item.id)
                                $('#sub_category').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#sub_category').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        $('#sub_category').trigger('change');

                    });

                }
            });

            $('#category').trigger('change');

            $('#sub_category').change(function () {
                var subCategoryId = $(this).val();

                $('#sub_sub_category').html('<option value="">Select Sub Sub Category</option>');

                if (subCategoryId != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('admin.get_sub_sub_category') }}",
                        data: { subCategoryId: subCategoryId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (subSubCategorySelected == item.id)
                                $('#sub_sub_category').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#sub_sub_category').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                    });
                }
            });

            $('#sub_category').trigger('change');

        });
    </script>
@endsection
