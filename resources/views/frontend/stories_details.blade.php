@extends('layouts.app')
@section('content')
    <div id="block-cbs-bootstrap-sass-content" class="block block-system block-system-main-block">
        <div class="content">
            <div data-history-node-id="1031898" class="node node--type-story node--view-mode-full ds-1col clearfix">
                <div class="container">
                    <h1>{{ $story->title }}</h1>
                    <div class="container">
                        <div class="lead">
                            <p>{{ $story->short_description }}</p>
                        </div>
                    </div>
                    <div class="container">
                         {{ $story->created_at->format('F d, Y') }}
                    </div>
                    <div class="row">
                        <div
                            class="embed-responsive embed-responsive-21by9 my-2 my-md-3 my-lg-4 style mx-auto paragraph paragraph--type-captioned-image paragraph--view-mode-caption-left paragraph-id-20573"
                            style="max-width:2000px;">
                            <div class="embed-responsive-item d-flex">
                                <div class="position-absolute order-0 order-lg-2">
                                    <div>
                                        <div class="field field--name-field-media-image field--type-image field--label-hidden field__item">
                                            <img class="img-fluid image-style-story-header"
                                                 src="{{ asset($story->full_image) }}"
                                                 width="2000" height="850"
                                                 alt="Cord blood donor Dominika Randell and her family on a couch"
                                                 typeof="foaf:Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-12 offset-md-1 col-md-10 offset-lg-3 col-lg-6">
                            {!! $story->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
