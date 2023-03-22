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
        <div class="row mar-top flex-row-reverse">
            <div class="col-lg-7">
                <div class="about-text go-to">
                    <h3 class="blood-color">Profile</h3>
                    {{--                    <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6>--}}

{{--                    <p class="text-dark"> <b>I am  O+ donor from</b> </p>--}}
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label>Blood</label>
                                <b>{{$userdetails->blood_group}}</b>
                            </div>
                            <div class="media">
                                <label>Age</label>
                                <b>{{$userdetails->age}}</b>
                            </div>
                            <div class="media">
                                <label>Weight</label>
                                <b>{{$userdetails->weight}}</b>
                            </div>
                            <div class="media">
                                <label>District</label>
                                <b>{{$userdetails->district->name}}</b>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <b>{{$userdetails->user->email}}</b>
                            </div>
                            <div class="media">
                                <label>Date of birth</label>
                                <b>{{$userdetails->date_of_birth}}</b>
                            </div>
                            <div class="media">
                                <label>Phone No</label>
                                <b>{{$userdetails->phone}}</b>
                            </div>
                            <div class="media">
                                <label>Last Donate Date</label>
                                <b>{{$userdetails->last_blood_donate}}</b>
                            </div>
                        </div>
                    </div>

                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="count-data text-center">
                                <h6 class="count h2" >{{$userdetails->donate_count}}</h6>
                                <h5 class="m-0px font-w-600 blood-color">Times Donate</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-data text-center">
                                <h6 class="count h2">{{$userdetails->take_count}}</h6>
                                <h5 class="m-0px font-w-600 blood-color">Times Receive</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-avatar img-fluid">
                    @if($userdetails->blood_group == 'O+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/o+.png') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($userdetails->blood_group == 'O-')
                        <img alt="" class="media__image media__element b-lazy " data-src="{{ asset('blood_group/o-.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($userdetails->blood_group == 'B+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/b+.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($userdetails->blood_group == 'B-')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/b-.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($userdetails->blood_group == 'AB+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/ab+.jpg') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($userdetails->blood_group == 'AB-')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/ab-.png') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($userdetails->blood_group == 'A+')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/a+.png') }}" src="" style="height: 300px; width: 650px"/>
                    @elseif($userdetails->blood_group == 'A-')
                        <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/a-.png') }}" src="" style="height: 300px; width: 650px"/>
                    @endif
           </div>
                <div class="about-avatar img-fluid text-center">
                    <h2>{{$userdetails->user->name}}</h2>
                </div>
            </div>
        </div>

    </div>
@endsection
