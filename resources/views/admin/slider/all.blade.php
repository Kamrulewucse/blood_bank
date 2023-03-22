@extends('layouts.admin')
@section('title','Sliders')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="{{ route('slider.add') }}" class="btn btn-primary btn-flat bg-gradient-primary">Add Slider</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->sort }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->short_description }}</td>
                            <td><img height="100px" src="{{ asset($slider->image) }}" alt=""></td>
                            <td><a href="{{ $slider->link }}"><i class="fa fa-link"></i></a></td>
                            <td>
                                @if($slider->status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('slider.edit',['slider'=>$slider->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Link</th>
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
            });
        });
    </script>
@endsection
