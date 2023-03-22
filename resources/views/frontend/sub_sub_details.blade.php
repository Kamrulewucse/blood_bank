@extends('layouts.app')
@section('content')
    <div id="block-cbs-bootstrap-sass-content" class="block block-system block-system-main-block">
        <div class="content">
            <nav role="navigation" aria-label="breadcrumb">
                <ol class="breadcrumb"><li><span class="fontawesome-icon-inline text-secondary"><span class="fa-arrow-left fas"></span></span></li>
                        <li class="breadcrumb-item">
                        <a class="text-cbs-plasma" href="123">{{ $subSubCategory->category->name }}</a>
                      </li>
                        <li class="breadcrumb-item">
                        <a class="text-cbs-plasma" href="">{{ $subSubCategory->subcategory->name }}</a>
                      </li>
                    </ol>
              </nav>
            <div class="row col-md-12">
                    <div class="col-md-7">
                        <h1 class="title"><span property="schema:name" class="field field--name-title field--type-string field--label-hidden pr-5">{{ $subSubCategory->short_description }}</span></h1>
                        <div class="pb-1">
                            <p>{!! $subSubCategory->description !!}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img width="100%" height="100%" src="{{ asset($subSubCategory->thumbs) }}" alt="No Image">
                    </div>
            </div><br><br>
            <div class="cbs-blood-bg py-2 paragraph paragraph--type-myaccount-search paragraph--view-mode-default paragraph-id-14234">
                <div class="container">
                    <div id="block-cbsgoogleplacessearchblock"
                         class="block block-cbs-google-places-search-form block-cbs-google-places-search-block">
                        <div class="content">
                            <div class="row fixed-banner">
                                <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0">
                                    <h2 class="h5 font-weight-bold text-white mb-0">Book now to donate
                                        blood</h2>
                                    <p class="font-weight-bold text-white mb-0"><a
                                            href="en/blood/am-i-eligible-donate-blood.html">Am I eligible?&nbsp;&nbsp;<span
                                                class="fontawesome-icon-inline"><span
                                                    class="fa-arrow-right fas"></span></span></a></p>
                                </div>
                                <div
                                    class="col-10 offset-1 col-md-6 offset-md-3 offset-lg-0 col-lg-6 py-2 cbs-google-places-search-form">
                                    <form class="cbs-google-places-search-form-autocomplete d-block d-lg-flex"
                                          data-drupal-selector="cbs-google-places-search-form-autocomplete"
                                          action="https://www.blood.ca/en" method="post"
                                          id="cbs-google-places-search-form-autocomplete"
                                          accept-charset="UTF-8">
                                        <div
                                            class="js-form-item js-form-type-search form-type-search js-form-item-cbs-google-places-search form-item-cbs-google-places-search form-no-label form-group col-auto col-lg-8 mb-lg-0 pr-0">
                                            <label for="edit-cbs-google-places-search"
                                                   class="sr-only js-form-required form-required">Location or
                                                web code</label>
                                            <input
                                                class="location-input w-100 border border-white cbs-google-places-search-form-input form-autocomplete form-search required form-control"
                                                data-drupal-selector="edit-cbs-google-places-search"
                                                data-autocomplete-path="/en/cbs-google-search?minCharacters=3"
                                                type="search" id="edit-cbs-google-places-search"
                                                name="cbs_google_places_search" value="" size="60"
                                                maxlength="128" required="required" aria-required="true"
                                                placeholder="Location or web code"/>
                                        </div>
                                        <input
                                            class="btn-adapts bg-dark border border-dark px-2 button js-form-submit form-submit btn btn-primary form-control"
                                            data-drupal-selector="edit-submit" type="submit" id="edit-submit"
                                            name="op" value="Start booking"/>
                                        <input autocomplete="off"
                                               data-drupal-selector="form-huc43zchaslddrm9rxgzqgospvw2jmfymb3l0ctezai"
                                               type="hidden" name="form_build_id"
                                               value="form-huC43ZchasLDdrm9rXgZqgoSpvW2JmFymb3L0cteZAI"
                                               class="form-control"/>
                                        <input
                                            data-drupal-selector="edit-cbs-google-places-search-form-autocomplete"
                                            type="hidden" name="form_id"
                                            value="cbs_google_places_search_form_autocomplete"
                                            class="form-control"/>
                                        <div class="url_1-textfield js-form-wrapper form-group"
                                             style="display: none !important;">
                                            <div
                                                class="js-form-item js-form-type-textfield form-type-textfield js-form-item-url-1 form-item-url-1 form-group col-auto">
                                                <label for="edit-url-1">Leave this field blank</label>
                                                <input autocomplete="off" data-drupal-selector="edit-url-1"
                                                       type="text" id="edit-url-1" name="url_1" value=""
                                                       size="20" maxlength="128"
                                                       class="form-text form-control"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0 d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-6 offset-md-0 text-right">
                                            <a href="https://itunes.apple.com/app/id804765636">
                                                <div>
                                                    <div
                                                        class="field field--name-field-media-image field--type-image field--label-visually_hidden">
                                                        <div class="field__label visually-hidden">Image</div>
                                                        <div class="field__item"><img class="img-fluid"
                                                                                      srcset="{{ asset('img/app_store.png') }}"
                                                                                      sizes="(min-width: 1290px) 1290px, 100vw"
                                                                                      src="{{ asset('img/app_store.png') }}"
                                                                                      alt="Download on the App Store"
                                                                                      typeof="foaf:Image"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6 offset-md-0 text-left">
                                            <a href="https://play.google.com/store/apps/details?id=ca.blood.giveblood">
                                                <div>
                                                    <div
                                                        class="field field--name-field-media-image field--type-image field--label-visually_hidden">
                                                        <div class="field__label visually-hidden">Image</div>
                                                        <div class="field__item"><img class="img-fluid"srcset="{{ asset('img/play_store.png') }}"sizes="(min-width: 1290px) 1290px, 100vw"
                                                                                      src="{{ asset('img/play_store.png') }}"
                                                                                      alt="Android app on Google Play"
                                                                                      typeof="foaf:Image"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <div class="view-content container">

                @if(count($SubSubCategoryFaqs)>0)
                <div class="container pt-3 pb-3 pt-md-5 pb-md-5">
                    <div class="col-md-12">
                      <h4>Reasons why you may not be eligible:</h4>
                    </div>
                    </div>
                @endif

                @foreach($SubSubCategoryFaqs as $SubSubCategoryFaq)
                <div class="col-12 mt-2 views-row">
                    <div class="views-field views-field-field-faq">
                      <div class="field-content"><a id="acupuncture" class="hashlink"></a>
                        <details class="faqfield-details">
                          <summary class="faqfield-question">
                            {{-- <h4 class="h6">How You Doning</h4> --}}
                          <h4 class="h6">{{ $SubSubCategoryFaq->question }}</h4>
                          </summary>
                          <div class="faqfield-answer">
                            {{-- <p>I Am Fine</p> --}}
                            <p>{!!  $SubSubCategoryFaq->answer !!}</p>
                          </div>
                        </details>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
        </div>
    </div>
@endsection

