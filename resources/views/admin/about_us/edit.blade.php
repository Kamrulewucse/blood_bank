@extends('layouts.admin')
@section('title','AboutUS')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">AboutUs Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{ route('about.edit',['about'=>$about->id]) }}" class="form-horizontal" method="post">
                    @csrf

                    <div class="form-group row {{ $errors->has('short_description') ? 'has-error' :'' }}">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <textarea rows="3"  name="short_description" class="form-control" id="short_description" placeholder="Enter Short Description">{{ $about->short_description}}</textarea>
                            @error('short_description')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('description') ? 'has-error' :'' }}">
                        <label for="description" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <textarea rows="3"  name="description" class="form-control" id="description" placeholder="Enter Description">{!! $about->description !!}</textarea>
                            @error('description')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('image') ? 'has-error' :'' }}">
                        <label for="image" class="col-sm-2 col-form-label"> Image</label>
                        <div class="col-sm-10">
                            <input type="file"  name="image" class="form-control" id="image">
                            <br>
                            @if($about->thumbs)
                                <img width="200px" src="{{ asset($about->thumbs) }}" alt="">
                            @endif
                            @error('image')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                    <a href="{{ route('about') }}" class="btn btn-default btn-flat float-right">Cancel</a>
                </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#description').summernote({
                height: 350,
            });
        });

    </script>
@endsection
