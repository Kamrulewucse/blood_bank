@extends('layouts.admin')
@section('title','AboutUs')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="{{ route('about.edit',['about'=>$about->id]) }}" class="btn btn-primary btn-flat bg-gradient-primary">Edit AboutUs</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Short Description</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td>{{ $about->short_description }}</td>
                            <td>{!! $about->description !!}</td>
                            <td><img height="100px" src="{{ asset($about->thumbs) }}" alt=""></td>
                        </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Short Description</th>
                        <th>Description</th>
                        <th>Image</th>
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
