@extends('layouts.admin')
@section('title','ADD FAQ')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">FAQ Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" enctype="multipart/form-data" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- <div class="form-group row {{ $errors->has('category') ? 'has-error' :'' }}">
                            <label for="category" class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="category" id="category" class="form-control select2">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row {{ $errors->has('sub_category') ? 'has-error' :'' }}">
                            <label for="sub_category" class="col-sm-2 col-form-label">Sub Category <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="sub_category" id="sub_category" class="form-control select2">
                                    <option value="">Select Sub Category</option>
                                </select>
                                @error('sub_category')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row {{ $errors->has('sub_sub_category') ? 'has-error' :'' }}">
                            <label for="sub_sub_category" class="col-sm-2 col-form-label">Sub Sub Category <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="sub_sub_category" id="sub_sub_category" class="form-control select2">
                                    <option value="">Select Sub Sub Category</option>
                                </select>
                                @error('sub_sub_category')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}


                        <div class="form-group row {{ $errors->has('question') ? 'has-error' :'' }}">
                            <label for="question" class="col-sm-2 col-form-label">Question <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea rows="3"  name="question" class="form-control" id="question" placeholder="Enter Short answer">{{ old('question') }}</textarea>
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
                        <div class="form-group row {{ $errors->has('sort') ? 'has-error' :'' }}">
                            <label for="sort" class="col-sm-2 col-form-label">Sort <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" value="{{ old('sort',$maxSort) }}" name="sort" class="form-control" id="sort" placeholder="Enter Sort">

                                @error('sort')
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
@section('script')
      <script type="text/javascript">
        $(document).ready(function () {
            $('#answer').summernote({
                height: 350,
            });
        });

    </script>
@endsection

