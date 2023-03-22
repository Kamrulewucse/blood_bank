@extends('layouts.app')
<style type="text/css">
    body{
        color: #6F8BA4;
        margin-top:20px;
    }
    .gray-bg {
        background-color: #f5f5f5;
    }
    img {
        max-width: 100%;
    }
    img {
        vertical-align: middle;
        border-style: none;
    }
    /* About Me
    ---------------------*/
    .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
    }
    @media (max-width: 767px) {
        .about-text h3 {
            font-size: 35px;
        }
    }
    .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
    }
    @media (max-width: 767px) {
        .about-text h6 {
            font-size: 18px;
        }
    }
    .about-text p {
        font-size: 18px;
        max-width: 450px;
    }
    .about-text p mark {
        font-weight: 600;
        color: #20247b;
    }

    .about-list {
        padding-top: 10px;
    }
    .about-list .media {
        padding: 5px 0;
    }
    .about-list label {
        color: #EB1C22;
        font-weight: 600;
        width: 115px;
        margin: 0;
        position: relative;
    }
    .about-list label:after {
        content: "";
        position: absolute;
        top: 7px;
        bottom: 0;
        right: 11px;
        width: 1px;
        height: 16px;
        background: #20247b;
        -moz-transform: rotate(15deg);
        -o-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);

        opacity: 0.5;
    }
    .about-list p {
        margin: 0;
        font-size: 20px;
    }
    .about-avatar {
        margin-top: 30px;
        height: 500px;
        width: 400px;
    }

    @media (max-width: 991px) {
        .about-avatar {
            margin-top: 30px;
        }
    }

    .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }
    .about-section .counter .count-data {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .about-section .counter .count {
        font-weight: 700;
        color: #20247b;
        margin: 0 0 5px;
    }
    .about-section .counter p {
        font-weight: 600;
        margin: 0;
    }
    mark {
        background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
        background-size: 100% 3px;
        background-repeat: no-repeat;
        background-position: 0 bottom;
        background-color: transparent;
        padding: 0;
        color: currentColor;
    }
    .theme-color {
        color: #fc5356;
    }
    .blood-color {
        color: #EB1C22;
    }
    .mar-top{
        margin-top: 10px;
    }


</style>
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 text-center">
                <div class="about-text go-to">
                    <h2 class="blood-color">Sent request based on your area</h2>
                    <hr>
                </div>
            </div>
            <div class="col-lg-3"></div>
            <div class=" col-lg-6">
                <form class="" action="{{route('request_to_all_donor')}}" method="post" id="user-login" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="form-body">
                        <div class="form-wrapper" id="edit-credentials">
                            <div class="form-item form-group form-type-textfield form-item-name {{ $errors->has('blood_for') ? 'has-error' :'' }}">
                                <label > Blood For <span class="form-required" ></span></label>
                                <select id="blood_for" class="form-control " name="blood_for">
                                    <option value="">Select </option>
                                    <option {{ old('blood_for') == 1 ? 'selected' : '' }} value="1">For Own</option>
                                    <option {{ old('blood_for') == 2 ? 'selected' : '' }} value="2">For Others</option>
                                </select>
                                @error('blood_for')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div id="others_field">
                                <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('blood_group') ? 'has-error' :'' }}">
                                    <label for="edit-first-name">Blood Group <span class="" ></span></label>
                                    <select id="blood_group" class="form-control " name="blood_group">
                                        <option value="">Select Your Blood Group</option>
                                        <option {{ old('blood_group') == 'A+' ? 'selected' : '' }} value="A+">A+</option>
                                        <option {{ old('blood_group') == 'A-' ? 'selected' : '' }}  value="A-">A-</option>
                                        <option {{ old('blood_group') == 'B+' ? 'selected' : '' }}  value="B+">B+</option>
                                        <option {{ old('blood_group') == 'B-' ? 'selected' : '' }}  value="B-">B-</option>
                                        <option {{ old('blood_group') == 'O+' ? 'selected' : '' }}  value="O+">O+</option>
                                        <option {{ old('blood_group') == 'O-' ? 'selected' : '' }}  value="O-">O-</option>
                                        <option {{ old('blood_group') == 'AB+' ? 'selected' : '' }}  value="AB+">AB+</option>
                                        <option {{ old('blood_group') == 'AB-' ? 'selected' : '' }}  value="AB-">AB-</option>
                                    </select>
                                    @error('blood_group')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('patient_name') ? 'has-error' :'' }}">
                                    <label for="edit-first-name">Patient Name <span class="form-required" ></span></label>
                                    <input autocomplete="given-name" type="text" placeholder="Enter your name" value="{{old('patient_name')}}" name="patient_name" class="form-text form-control" />
                                    @error('patient_name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('division') ? 'has-error' :'' }}">
                                <label for="division">Division <span class="form-required" ></span></label>
                                <select class="form-control" id="division" name="division" >
                                    <option value="">Select division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ old('division') == $division->id ? 'selected' : '' }} >{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                @error('division')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-item form-group form-type-textfield form-item-first-name">
                                <label for="district">District <span class="" ></span></label>
                                <select class="form-control" id="district" name="district" >
                                    <option value="">Select district</option>
                                </select>
                                @error('district')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-item form-group form-type-textfield form-item-first-name">
                                <label for="thana">Thana <span class="" ></span></label>
                                <select class="form-control" id="thana" name="thana" >
                                    <option value="">Select upazila</option>
                                </select>
                            </div>

                            <div class="form-item form-group form-type-textfield form-item-name {{ $errors->has('contact_number') ? 'has-error' :'' }}">
                                <label > Contact Number <span class="form-required" ></span></label>
                                <input placeholder="Enter your phone number" type="text" value="{{old('contact_number')}}" name="contact_number" class="form-text form-control"/>
                                @error('contact_number')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-item form-group form-type-textfield form-item-name {{ $errors->has('about_patient') ? 'has-error' :'' }}">
                                <label >About Patient</label>
                                <textarea placeholder="Enter About Patient" type="text"  name="about_patient" value="{{old('about_patient')}}" class="form-text form-control"></textarea>
                                @error('about_patient')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-item form-group form-type-textfield form-item-name {{ $errors->has('address') ? 'has-error' :'' }}">
                                <label >Medical Address <span class="form-required" ></span></label>
                                <textarea placeholder="Enter Address" type="text"  name="address" value="{{old('address')}}" class="form-text form-control"></textarea>
                                @error('address')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('date_blood_needed') ? 'has-error' :'' }}">
                                <label for="edit-first-name">Date Blood Needed <span class="form-required" ></span></label>
                                <input autocomplete="given-name" type="date"  name="date_blood_needed" value="{{old('date_blood_needed')}}" size="60" maxlength="128" class="form-text form-control" />
                                @error('date_blood_needed')
                                <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('date_blood_needed') ? 'has-error' :'' }}">
                                <label for="edit-first-name">Patient Image </label>
                                <input type="file"  name="image" class="form-control" id="image">
                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-actions form-wrapper" id="edit-actions">
                            <input type="submit" id="edit-submit" name="op" value="Submit" class="form-submit btn btn-default btn btn-danger" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>

        @endsection
        @section('script')
            <script
                src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
                crossorigin="anonymous"></script>
            <script>

                $(function () {

                    //for others
                    $('#blood_for').change(function (){
                        var bloodForType = $(this).val();
                        if (bloodForType == '2'){
                            $("#others_field").show();
                        }else{
                            $("#others_field").hide();
                        }
                    });
                    $('#blood_for').trigger("change");

                    var districtSelected = '{{ old('district') }}';

                    $('#division').change(function () {
                        var divisionId = $(this).val();

                        $('#district').html('<option value="">Select District</option>');

                        if (divisionId != '') {
                            $.ajax({
                                method: "GET",
                                url: "{{ route('get_district') }}",
                                data: { divisionId: divisionId }
                            }).done(function( data ) {
                                $.each(data, function( index, item ) {
                                    if (districtSelected == item.id)
                                        $('#district').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                                    else
                                        $('#district').append('<option value="'+item.id+'">'+item.name+'</option>');
                                });
                                $('#district').trigger('change');
                            });

                        }

                    });

                    $('#division').trigger('change');

                    var thanaSelected = '{{ old('thana') }}';


                    $('#district').change(function () {
                        var districtId = $(this).val();

                        $('#sub_sub_category').html('<option value="">Select Thana</option>');

                        if (districtId != '') {
                            $.ajax({
                                method: "GET",
                                url: "{{ route('get_thana') }}",
                                data: { districtId: districtId }
                            }).done(function( data ) {
                                $.each(data, function( index, item ) {
                                    if (thanaSelected == item.id)
                                        $('#thana').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                                    else
                                        $('#thana').append('<option value="'+item.id+'">'+item.name+'</option>');
                                });

                            });
                        }
                    });
                    $('#district').trigger('change');
                });
            </script>
@endsection
