@extends('layouts.app')
@section('style')
    <style>
        .top-margin{
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="bg-light paragraph paragraph--type-_-col-articles-stories paragraph--view-mode-default paragraph-id-14244">
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
                                <form class="cbs-google-places-search-form-autocomplete d-block d-lg-flex" action="{{ route('all_post') }}" method="get" id="" accept-charset="UTF-8">
                                    <div class="js-form-item js-form-type-search form-type-search js-form-item-cbs-google-places-search form-item-cbs-google-places-search form-no-label form-group col-auto col-lg-8 mb-lg-0 pr-0">
                                        <label for="edit-cbs-google-places-search" class="sr-only js-form-required form-required">Location or web code</label>
                                        <input class="location-input w-100 border border-white cbs-google-places-search-form-input form-autocomplete form-search required form-control"  name="search" value="" size="60" maxlength="128" required="required" aria-required="true" placeholder="Search for blood"/>
                                    </div>
                                    <input class="btn-adapts bg-dark border border-dark px-2 button js-form-submit form-submit btn btn-primary form-control" type="submit"  value="Search"/>

                                </form>
                            </div>
                            <div
                                class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0 d-flex align-items-center">
{{--                                <div class="row">--}}
{{--                                    <div class="col-6 offset-md-0 text-right">--}}
{{--                                        <a href="https://itunes.apple.com/app/id804765636">--}}
{{--                                            <div>--}}
{{--                                                <div--}}
{{--                                                    class="field field--name-field-media-image field--type-image field--label-visually_hidden">--}}
{{--                                                    <div class="field__label visually-hidden">Image</div>--}}
{{--                                                    <div class="field__item"><img class="img-fluid" srcset="{{ asset('img/app_store.png') }}" sizes="(min-width: 1290px) 1290px, 100vw" src="{{ asset('img/app_store.png') }}" alt="Download on the App Store" typeof="foaf:Image"/>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 offset-md-0 text-left">--}}
{{--                                        <a href="https://play.google.com/store/apps/details?id=ca.blood.giveblood">--}}
{{--                                            <div>--}}
{{--                                                <div--}}
{{--                                                    class="field field--name-field-media-image field--type-image field--label-visually_hidden">--}}
{{--                                                    <div class="field__label visually-hidden">Image</div>--}}
{{--                                                    <div class="field__item"><img class="img-fluid" srcset="{{ asset('img/play_store.png') }}" sizes="(min-width: 1290px) 1290px, 100vw" src="{{ asset('img/play_store.png') }}" alt="Android app on Google Play" typeof="foaf:Image"/>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-2">
            <div class="row my-2">
                <div class="col-12 col-lg-9">
                    <h2>
                        All Request Post
                        <hr class="cbs-separator-blood">
                    </h2>

                </div>
                <div class="col-12 col-lg-3">
                    <div class="float-lg-right">
                        <a class="btn btn-default btn-adapts btn-lg"
                           href="{{route('add_post')}}">
                            <i></i>
                            Create Post
                        </a>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($allPosts as $allPost)
                    <div class="col-12 col-md-6  col-lg-4 mb-4">
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
                                                        @if($allPost->blood_group == 'O+')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/o+.png') }}" src="" style="height: 300px; width: 650px"/>
                                                            @elseif($allPost->blood_group == 'O-')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/o-.jpg') }}" src="" style="height: 300px; width: 650px"/>
                                                            @elseif($allPost->blood_group == 'B+')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/b+.jpg') }}" src="" style="height: 300px; width: 650px"/>
                                                             @elseif($allPost->blood_group == 'B-')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/b-.jpg') }}" src="" style="height: 300px; width: 650px"/>
                                                            @elseif($allPost->blood_group == 'AB+')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/ab+.jpg') }}" src="" style="height: 300px; width: 650px"/>
                                                            @elseif($allPost->blood_group == 'AB-')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/ab-.png') }}" src="" style="height: 300px; width: 650px"/>
                                                            @elseif($allPost->blood_group == 'A+')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/a+.png') }}" src="" style="height: 300px; width: 650px"/>
                                                            @elseif($allPost->blood_group == 'A-')
                                                                <img alt="" class="media__image media__element b-lazy" data-src="{{ asset('blood_group/a-.png') }}" src="" style="height: 300px; width: 650px"/>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column ">
                                @if($allPost->patient_name != '')
                                <h5 class="card-title font-weight-bold">
                                    Patient: <a href="" hreflang="en">{{ $allPost->patient_name }}</a>
                                    <hr class="cbs-separator-blood">
                                </h5>
                                @else
                                    <h5 class="card-title font-weight-bold">
                                        Patient: <a href="" hreflang="en">{{ $allPost->user->name }}</a>
                                        <hr class="cbs-separator-blood">
                                    </h5>
                                @endif

                                <div class="row">
                                    <div class=" col-6">
                                        <p><b>District:</b> {{ $allPost->district->name }}</p>
                                    </div>
                                    <div class=" col-6">
                                        <p><b>Address:</b> {{ $allPost->address }}</p>
                                    </div>
                                </div>
                                    <div class="row">

                                        <div class="col-12 mt-3 pl-500"  >
                                            <a class="btn btn-default btn-adapts btn-lg"  href="{{route('patient_details',['slug'=>$allPost->slug]) }}">
                                                Do you want to donate?
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection

