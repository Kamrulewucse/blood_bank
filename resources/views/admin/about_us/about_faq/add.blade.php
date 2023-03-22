@extends('layouts.admin')
@section('title','About FAQ')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">About FAQ Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" enctype="multipart/form-data" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('question') ? 'has-error' :'' }}">
                            <label for="question" class="col-sm-2 col-form-label">Question <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea rows="3"  name="question" class="form-control" id="question" placeholder="Enter Question">{{ old('question') }}</textarea>
                                @error('question')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('answer') ? 'has-error' :'' }}">
                            <label for="answer" class="col-sm-2 col-form-label">Answer <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea rows="3"  name="answer" class="form-control" id="answer" placeholder="Enter answer">{{ old('answer') }}</textarea>
                                @error('answer')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>

                            <div class="col-sm-10">

                                <div class="icheck-success d-inline">
                                    <input checked type="radio" id="active" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                    <label for="active">
                                        Active
                                    </label>
                                </div>

                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="inactive" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                    <label for="inactive">
                                        Inactive
                                    </label>
                                </div>

                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                        <a href="" class="btn btn-default btn-flat float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection


