@extends('layouts.app')
@section('style')
    <style>
        .top-margin{
            margin-top: 10px;
        }
        .btn-color{
            background-color: #08b308;
            color: #0a0e14 !important;
        }
        .bloodimages{
            height: 150px;
            width: 200px;
            margin:auto;
        }
    </style>
@endsection
@section('content')
    <div class="top-margin cbs-blood-bg py-2 paragraph paragraph--type-myaccount-search paragraph--view-mode-default paragraph-id-14234">
        <div class="container">
            <div id="block-cbsgoogleplacessearchblock"
                 class="block block-cbs-google-places-search-form block-cbs-google-places-search-block">
                <div class="content">
                    <div class="row fixed-banner">
                        <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0">
                            <h2 class="h5 font-weight-bold text-white mb-0"></h2>
                            <p class="font-weight-bold text-white mb-0">
                                <a href="#"></a></p>
                        </div>
                        <div
                            class="col-10 offset-1 col-md-6 offset-md-3 offset-lg-0 col-lg-6 py-2 cbs-google-places-search-form">
                            <form class="cbs-google-places-search-form-autocomplete d-block d-lg-flex" action="{{ route('donor_list') }}" method="get" id="" accept-charset="UTF-8">
                                <div class="js-form-item js-form-type-search form-type-search js-form-item-cbs-google-places-search form-item-cbs-google-places-search form-no-label form-group col-auto col-lg-8 mb-lg-0 pr-0">
                                    <label for="edit-cbs-google-places-search" class="sr-only js-form-required form-required">Location or web code</label>
                                    <input class="location-input w-100 border border-white cbs-google-places-search-form-input form-autocomplete form-search required form-control"  name="search" value="" size="60" maxlength="128" required="required" aria-required="true" placeholder="Search for blood"/>
                                </div>
                                <input class="btn-adapts bg-dark border border-dark px-2 button js-form-submit form-submit btn btn-primary form-control" type="submit"  value="Search"/>

                            </form>
                        </div>
                        <div
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="14244" name="14244" class="hashlink"></a>
    <div class="bg-light paragraph paragraph--type-_-col-articles-stories paragraph--view-mode-default paragraph-id-14244">
        <div class="container py-2">
            <div class="row my-2">
                <div class="col-12 col-lg-9">
                    <h2>
                        All Donor List
                        <hr class="cbs-separator-blood">
                    </h2>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="float-lg-right">
                        <a class="btn btn-default btn-adapts btn-lg"
                           href="{{route('request_to_all_donor')}}">
                            Blood Request
                        </a>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($userDetails as $userDetail)

                    <div class="col-12 col-md-6  col-lg-3 mb-4">
                        <div data-history-node-id="1031720"
                             class="h-100 card bg-white node node--type-story node--view-mode-teaser-card ds-1col clearfix">
                            <div class="card-img-top img-fluid">
                                <div
                                    class="view view-story-teaser-image-category-image view-id-story_teaser_image_category_image view-display-id-block_1 js-view-dom-id-3d06d3d33d959c7bc45826067a06b4bb1fa319845353a739a76c3303c33f74bb">
                                    <div class="view-content row">
                                        <div class="col views-row">
                                            <div
                                                class="views-field views-field-field-teaser-image card-img-top">
                                                <div class="field-content">
                                                    <div class="media media--blazy media--image">
                                                        @if($userDetail->blood_group == 'O+')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/o+.png') }}" src="" />
                                                        @elseif($userDetail->blood_group == 'O-')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/o-.jpg') }}" src="" />
                                                        @elseif($userDetail->blood_group == 'B+')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/b+.jpg') }}" src="" />
                                                        @elseif($userDetail->blood_group == 'B-')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/b-.jpg') }}" src="" />
                                                        @elseif($userDetail->blood_group == 'AB+')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/ab+.jpg') }}" src="" />
                                                        @elseif($userDetail->blood_group == 'AB-')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/ab-.png') }}" src=""/>
                                                        @elseif($userDetail->blood_group == 'A+')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/a+.png') }}" src="" />
                                                        @elseif($userDetail->blood_group == 'A-')
                                                            <img alt="" class="media__image media__element b-lazy bloodimages" data-src="{{ asset('blood_group/a-.png') }}" src="" />
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column ">
                                <h4 class="card-title font-weight-bold">
                                    <a href=""
                                       hreflang="en">{{ $userDetail->user->name }}</a>
                                    <hr class="cbs-separator-blood">
                                </h4>

                                <div class="row">
                                    <div class=" col-12">
                                        <h6><b>Age :</b> {{ $userDetail->age }}</h6>
                                    </div>
                                    <div class=" col-12">
                                        <h6><b>District :</b> {{ $userDetail->district->name?? '' }}</h6>
                                    </div>

                                </div>
                                @php
                                    $old = strtotime($userDetail->last_blood_donate);
                                   $difference = time()- $old;
                                   $days = round($difference / 86400);
                                @endphp
                                @if($days >=90)
                                    <div class="row">
                                        <div class="col-4 card-text ">
                                            <h2>{{ $userDetail->blood_group }}</h2>
                                        </div>
                                        <div class="col-8 mt-2 pl-500"  >
                                            <a class="btn btn-default btn-color btn-md">
                                                Blood Available
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class=" col-4 card-text ">
                                            <h2>{{ $userDetail->blood_group }}</h2>
                                        </div>
                                        <div class="col-8 mt-3 pl-500"  >
                                            <a class=" disabled btn btn-default btn-adapts btn-lg">
                                                Not Available
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection

