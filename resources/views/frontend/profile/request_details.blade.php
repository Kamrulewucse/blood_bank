@extends('layouts.app')
<style type="text/css">
    body{
        color: #6F8BA4;
        margin-top:20px;
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


    .
    .about-list label {
        color: #EB1C22;
        font-weight: 600;
        width: 88px;
        margin: 0;
        position: relative;
    }
    .about-list label:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        right: 11px;
        width: 1px;
        height: 12px;
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

    .blood-color {
        color: #EB1C22;
    }
    .mar_top{
        margin-top: 20px;
    }

</style>
@section('content')
    <div class="container">
        <div class="row mar_top">
            <div class="col-lg-12 text-center">
                <div class="about-text go-to">
                    <h2 class="blood-color">Thank You </h2>
                </div>
                <div class="about-text go-to">
                    <h6 class="">Request sent successfully ! </h6>
                </div>
            </div>

            </div>
    </div>
@endsection
