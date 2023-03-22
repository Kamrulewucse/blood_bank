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
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif

        <div class="row mar-top flex-row-reverse">
            <div class="col-lg-7">
                <div class="about-text go-to">
                    <h3 class="blood-color">About Patient</h3>
                    <p class="text-dark"> <b>I am {{($patientdetails->patient_name != '' ? $patientdetails->patient_name : $patientdetails->user->name)}} badly I need {{$patientdetails->blood_group}} blood at {{$patientdetails->address}}.</b> </p>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label>Blood</label>
                                <b>{{$patientdetails->blood_group}}</b>
                            </div>
                            <div class="media">
                                <label>District</label>
                                <b>{{$patientdetails->district->name}}</b>
                            </div>
                            <div class="media">
                                <label>Address</label>
                                <b>{{$patientdetails->address}}</b>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <b>hi</b>
                            </div>

                            <div class="media">
                                <label>Mobile</label>
                                <b>{{$patientdetails->contact_number}}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-avatar img-fluid">
                    @if($patientdetails->blood_group == 'O+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/o+.png') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($patientdetails->blood_group == 'O-')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/o-.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($patientdetails->blood_group == 'B+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/b+.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($patientdetails->blood_group == 'B-')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/b-.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($patientdetails->blood_group == 'AB+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/ab+.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($patientdetails->blood_group == 'AB-')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/ab-.png') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($patientdetails->blood_group == 'A+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/a+.png') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($patientdetails->blood_group == 'A-')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/a-.png') }}" src="" style="height: 300px; width: 650px"/>
                    @endif
                </div>
                <div class="about-avatar img-fluid text-center">
                    <h2>{{($patientdetails->patient_name != '' ? $patientdetails->patient_name : $patientdetails->user->name)}} </h2>
                </div>
            </div>
        </div>

{{--        <div class="row ">--}}
{{--            <div class="col-lg-12 text-center">--}}
{{--                <div class="about-text go-to">--}}
{{--                    <h2 class="blood-color">Sent For Blood Donate Request</h2>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3"></div>--}}
{{--            <div class=" col-lg-6">--}}
{{--                <form class="user-login" action="" method="post" id="user-login" accept-charset="UTF-8" role="form">--}}
{{--                <form class="user-login" action="{{ route('donor_details',['slug'=>$donordetails->slug])  }}" method="post" id="user-login" accept-charset="UTF-8" role="form">--}}
{{--                    @csrf--}}
{{--                    @if (\Session::has('message'))--}}
{{--                        <div class="alert alert-danger text-center">--}}
{{--                            <h4>{!! \Session::get('message') !!}</h4>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="form-body">--}}
{{--                        <div class="form-wrapper" id="edit-credentials">--}}

{{--                            <div class="form-item form-group form-type-textfield form-item-name {{ $errors->has('contact_number') ? 'has-error' :'' }}">--}}
{{--                                <label > Contact Number <span class="form-required" ></span></label>--}}
{{--                                <input placeholder="Enter your Phone Number" type="text"  name="contact_number" class="form-text form-control"/>--}}
{{--                                @error('contact_number')--}}
{{--                                <span class="help-block text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="form-group row {{ $errors->has('donate_type') ? 'has-error' :'' }}">--}}
{{--                                <label class="col-sm-4 col-form-label">Donate Type <span class="text-danger">*</span></label>--}}

{{--                                <div class="col-sm-8">--}}

{{--                                    <div class="icheck-success d-inline">--}}
{{--                                        <input checked type="radio" id="active" name="donate_type" value="1"  {{ old('donate_type') == '1' ? 'checked' : '' }}>--}}
{{--                                        <label for="free">--}}
{{--                                            Free Blood Donate--}}
{{--                                        </label>--}}
{{--                                    </div>--}}

{{--                                    <div class="icheck-danger d-inline">--}}
{{--                                        <input type="radio" id="inactive" name="donate_type" value="0"  {{ old('donate_type') == '0' ? 'checked' : '' }}>--}}
{{--                                        <label for="purchase">--}}
{{--                                            Purchase--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    @error('status')--}}
{{--                                    <span class="help-block">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-actions form-wrapper" id="edit-actions">--}}
{{--                            <input type="submit" id="edit-submit" name="op" value="Submit" class="form-submit btn btn-default btn btn-danger" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <div class="col-lg-3"></div>--}}

{{--    </div>--}}

    </div>
@endsection
