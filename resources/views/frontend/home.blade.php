@extends('layouts.app')
@section('style')
    <style>
        .media-item-bg-tem-slider{
            background-color: #FFFFFF !important;
            background-repeat: no-repeat !important;
            background-attachment: scroll !important;
            background-position: left top !important;
            z-index: auto;
            background-size: cover !important;
            -webkit-background-size: cover !important;
            -moz-background-size: cover !important;
            -o-background-size: cover !important;
        }
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
        .btn-color{
            background-color: #08b308;
            color: white !important;
        }

        .top-margin{
            margin-top: 10px;
        }
        .counter{
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            width: 210px;
            min-height: 246px;
            padding: 25px 0 0;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        .counter:after{
            content: '';
            background: linear-gradient(to right, #eff0f2, #fefefe);
            height: 152px;
            width: 152px;
            border-radius: 15px;
            border: 3px solid #E7131A;
            box-shadow: 5px 0 8px rgba(0, 0, 0, 0.2);
            transform: translateX(-50%) rotate(45deg);
            position: absolute;
            top: 25px;
            left: 50%;
            z-index: -1;
        }
        .counter .counter-value{
            background:#E7131A;
            font-size: 25px;
            font-weight: 600;
            letter-spacing: 2px;
            width: 20%;
            padding: 10px 0 6px;
            border-radius: 10px;
            box-shadow: inset 0 0 6px rgba(0,0,0,0.6),0 0 0 2px #fff;
            position: absolute;
            left: 40%;
            bottom: 0;
            z-index: -1;
        }
        .counter .counter-icon{
            background: linear-gradient(to right,#4D4D4D,#4D4D4D);
            font-size: 30px;
            line-height: 60px;
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            border-radius: 50%;
            border: 2px solid #E7131A;
            box-shadow: 4px 4px 4px rgba(0,0,0,0.4);
        }
        .counter h3{
            color: #4D4D4D;
            font-size: 25px;
            font-weight: 500;
            text-transform: capitalize;
            line-height: 56px;
            padding: 0 30px;
            margin: 0 0 15px;
        }
        .counter.green .counter-value{ background: #01c700; }
        .counter.green .counter-icon{ background: linear-gradient(to right,#01c700,#019b01); }
        .counter.green h3{ color: #019b01; }
        @media screen and (max-width:990px){
            .counter{ margin-bottom: 40px; }
        }
        .bloodimages{
            height: 150px;
            width: 200px;
            margin:auto;
        }

    </style>
@endsection
@section('content')


    <div id=" block-cbs-bootstrap-sass-content" class="top-margin block block-system block-system-main-block">
        <div class="content">
            <div data-history-node-id="1018196" class="node node--type-page node--view-mode-full ds-1col clearfix" typeof="schema:WebPage">
                <div class="container-fluid">
                    <div class="cbs-blood-bg py-2 paragraph paragraph--type-myaccount-search paragraph--view-mode-default paragraph-id-14234">
                        <div class="container">
                            <div id="block-cbsgoogleplacessearchblock"
                                 class="block block-cbs-google-places-search-form block-cbs-google-places-search-block">
                                <div class="content">
                                    <div class="row fixed-banner">
                                        <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0">
                                            <h2 class="h5 font-weight-bold text-white mb-0"></h2>
                                            <p class="font-weight-bold text-white mb-0"><a href="#"></a></p>
                                        </div>
                                        <div
                                            class="col-10 offset-1 col-md-6 offset-md-3 offset-lg-0 col-lg-6 py-2 cbs-google-places-search-form">
                                            <form target="_blank"  class="cbs-google-places-search-form-autocomplete d-block d-lg-flex" action="{{ route('donor_list') }}" method="get" id="" accept-charset="UTF-8">
                                                <div class="js-form-item js-form-type-search form-type-search js-form-item-cbs-google-places-search form-item-cbs-google-places-search form-no-label form-group col-auto col-lg-8 mb-lg-0 pr-0">
                                                    <label for="edit-cbs-google-places-search" class="sr-only js-form-required form-required">Location or web code</label>
                                                    <input class="location-input w-100 border border-white cbs-google-places-search-form-input form-autocomplete form-search required form-control"  name="search" value="" size="60" maxlength="128" required="required" aria-required="true" placeholder="Search for blood"/>
                                                </div>
                                                <input class="btn-adapts bg-dark border border-dark px-2 button js-form-submit form-submit btn btn-primary form-control" type="submit"  value="Search"/>

                                            </form>
                                        </div>
                                        <div
                                            class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0 d-flex align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a id="14246" name="14246" class="hashlink"></a>
                    <div class=" px-4 px-xl-0 paragraph paragraph--type-blood-inventory paragraph--view-mode-default paragraph-id-14246">
                        <div
                            class="field field--name-field-national-inventory-block field--type-block-field field--label-hidden field__item">
                            <div id="block-bloodinventory"
                                 class="block block-cbs-blood-inventory-block block-blood-inventory-block">
                                <div class="content">
                                    <section class="inventory-bg">
                                        <article class="container-fluid pt-5 pb-5 mt-5">
                                            <div class="container">
                                                <header id="national-inventory-header" class="row pb-3">
                                                    <div class="counter">
                                                        <div class="counter-content">
                                                            <div class="counter-icon">
                                                                <i class="fa fa-users"></i>
                                                            </div>
                                                            <h3>Total Members</h3>
                                                        </div>
                                                        <span class="counter-value">{{$users_count}}</span>
                                                    </div>
                                                </header>
                                                <ul class="inventory-wrapper row pl-0 pr-0 pb-3"
                                                    aria-describedby="national-inventory-header">
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$ABPositiveCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>AB<span aria-hidden="true">+</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$ABNegativeCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>AB<span aria-hidden="true">-</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$APositiveCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>A<span aria-hidden="true">+</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$ANegativeCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>A<span aria-hidden="true">-</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$OPositiveCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>O<span aria-hidden="true">+</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$ONegativeCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>O<span aria-hidden="true">-</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$BPositiveCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>B<span aria-hidden="true">+</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-4 col-sm-3 col-md inventory-level">
                                                        <figure id="fig-7a80b46d" tabindex="0" data-toggle="inventory-popover" class="fig-blood-type" role="figure" aria-describedby="inventory-msg-7a80b46d inventory-status-7a80b46d fig-popover-7a80b46d" aria-labelledby="fig-caption-7a80b46d">
                                                            <div id="inventory-status-7a80b46d" class="inventory-status mb-2 mt-1"><em class="visually-hidden">Good supply</em></div>
                                                            <div class="inventory-toggle">
                                                                <img src="{{ asset('themes/frontend/modules/custom/cbs_blood_inventory_block/assets/icons/icon-inventory-drop.svg') }}" class="inventory-image" alt="">
                                                                <div class="inventory-level-mask" style="height: 100%;"></div>
                                                                <span class="inventory-percent-target counter-value">{{$BNegativeCount}}<br>Donors</span>
                                                            </div>
                                                            <figcaption  class="pt-4 text-center font-weight-bold" role="heading">
                                                                <h4>B<span aria-hidden="true">-</span></h4>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                </ul>

                                            </div>
                                        </article>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


                    <a id="14244" name="14244" class="hashlink"></a>
                    <div class="bg-light paragraph paragraph--type-_-col-articles-stories paragraph--view-mode-default paragraph-id-14244">
                        <div class="container py-2">
                            <div class="row my-4">
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
                            <div class="row my-4">
                                <div class="col-12 col-lg-12">
                                    <div class="float-lg-right">
                                        <a class="btn btn-default btn-adapts btn-lg"
                                           href="{{route('donor_list')}}">
                                            See All Donor
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.counter-value').each(function(){
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                },{
                    duration: 3500,
                    easing: 'swing',
                    step: function (now){
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    </script>
@endsection



