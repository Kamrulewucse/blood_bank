@extends('layouts.app')
@section('content')
<div class="bg-light paragraph paragraph--type-_-col-articles-stories paragraph--view-mode-default paragraph-id-14244">
    <div class="container py-4">
        <div class="row my-4">
            <div class="col-12 col-lg-9">
                <h2>
                    Our latest updates
                </h2>
            </div>
            <div class="col-12 col-lg-3">
                <div class="float-lg-right">
                    <a class="btn btn-default btn-adapts btn-sm"
                       href="#">
                        <i></i>
                        Read all news
                    </a>
                    <a class="btn btn-default btn-adapts btn-sm" href="#">
                        <i></i>
                        Read all stories
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($stories as $story)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
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
                                                <img alt="a smiling blood donor wearing a mask"
                                                     title="StoriesTeaser-smilingdonor.png"
                                                     class="media__image media__element b-lazy"
                                                     data-src="{{ asset($story->thumbs) }}"
                                                     src="data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D&#039;http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg&#039;%20viewBox%3D&#039;0%200%20650%20360&#039;%2F%3E"
                                                     width="650" height="360" typeof="foaf:Image"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-3 pt-4">
                        <h4 class="card-title pb-3 font-weight-bold">
                            <a href="{{ route('stories_details',['slug'=>$story->slug]) }}"
                               hreflang="en">{{ $story->title }}</a>
                        </h4>
                        <hr class="cbs-separator-blood">
                        <div class="card-text">
                            {{ $story->short_description }}
                        </div>
                        <div
                            class="field field--name-extra-field-readmore-extrafield field--type-extra-field field--label-hidden field__item">
                            <div class="jump-r">
                                <a href="{{ route('stories_details',['slug'=>$story->slug]) }}"
                                   class="readmore-extrafield-link font-weight-bold">Read full story<span
                                        class="visually-hidden">{{ $story->short_description }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<a id="14246" name="14246" class="hashlink"></a>

@endsection
