@extends('layouts.app')
@section('content')
    <div id="block-cbs-bootstrap-sass-page-title" class="mt-4 block block-core block-page-title-block">
        <div class="content">
            <div class="container d-flex">
                <h1 class="title col-md-7 col-lg-8"><span property="schema:name" class="field field--name-title field--type-string field--label-hidden pr-5">Stories from Blood Services</span>
                </h1>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($stories as $story)
                    <div class="col-12 col-md-6 col-lg-4 border-bottom border-light" style="width: 33.333333333333%;">
                        <div  class="card bg-white h-100 node node--type-story node--view-mode-teaser ds-1col clearfix">
                            <div  class="card-img-top img-fluid">
                                <div class="view view-story-teaser-image-category-image view-id-story_teaser_image_category_image view-display-id-block_1 js-view-dom-id-ac23d977f6f258c2ff7ea967c590ef87dc504673550b6788c6dc9b007412c640">
                                    <div class="view-content row">
                                        <div class="col views-row">
                                            <div class="views-field views-field-field-teaser-image card-img-top"><div class="field-content">
                                                    <div class="media media--blazy media--image">
                                                        <img alt="Cord blood donor Manny Ford and her family on the front porch" title="Stories-Teaser-Baby-Tristan-Family-min.jpg" class="media__image media__element b-lazy" data-src="/sites/default/files/styles/story_teaser/public/Stories-Teaser-Baby-Tristan-Family-min.jpg?itok=_wpUh753" src="{{ asset($story->thumbs) }}" width="650" height="360" typeof="foaf:Image" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  class="card-body">
                                <div class="field field--name-node-title field--type-ds field--label-hidden field__item"><h4 class="text-primary card-title">
                                        <a href="{{ route('stories_details',['slug'=>$story->slug]) }}">{{ $story->title }}</a>
                                    </h4>
                                </div>
                                <div  class="card-text">
                                    <p  class="mb-0" style="white-space:pre-line">{{ $story->short_description }}</p>
                                </div>
                            </div>
                            <div class="mx-4"><span class="fa-chevron-circle-right fas rounded-circle text-secondary pr-1"></span>
                                <a href="{{ route('stories_details',['slug'=>$story->slug]) }}" hreflang="en">Read full story</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
