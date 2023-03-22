@extends('layouts.app')
@section('content')
<div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
    <div id="page-wrapper">
      <div id="page">
        <div id="main-wrapper" class="layout-main-wrapper clearfix">
          <div id="main" class="container-fluid px-0 bg-header-image">
            <div>
              <div id="block-cbs-bootstrap-sass-breadcrumbs" class="block block-system block-system-breadcrumb-block">


                <div class="content">


                  <nav role="navigation" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li><span class="fontawesome-icon-inline text-secondary"><span
                            class="fa-arrow-left fas"></span></span></li>
                      <li class="breadcrumb-item">
                        <a class="text-cbs-plasma" href="../blood.html">{{ $subCategory->category->name }}</a>
                      </li>
                    </ol>
                  </nav>

                </div>
              </div>
              <div data-drupal-messages-fallback class="hidden"></div>

              <div class="row row-offcanvas row-offcanvas-left clearfix">
                <main class="main-content col" id="content" role="main">
                  <section class="section">
                    <a id="main-content" tabindex="-1"></a>
                    <div id="block-tempcssrule" class="block block-simple-block block-simple-blocktemp-css-rule">

                    </div>
                    <div id="block-cbs-bootstrap-sass-content" class="block block-system block-system-main-block">
                      <div class="content">
                        <div data-history-node-id="329"
                          class="node node--type-page node--view-mode-full ds-1col clearfix" typeof="schema:WebPage">
                          <div class="container-fluid">
                            <a id="67" name="67" class="hashlink"></a>
                            <div class="bg-header-image paragraph paragraph--type-impact-header-w-sub-navigation paragraph--view-mode-default paragraph-id-67">
                              <div class="field field--name-field-background-image field--type-image field--label-hidden field__item">
                              </div>
                              <div class="container impact-height">

                                <div class="row">
                                    <div class="col-md-7">
                                        <h1 class="title"><span property="schema:name" class="field field--name-title field--type-string field--label-hidden pr-5">{{ $subCategory->short_description }}</span></h1>
                                        <div class="pb-1">
                                            <p>{!! $subCategory->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <img width="100%" height="100%" src="{{ asset($subCategory->thumbs) }}" alt="No Image">
                                    </div>
                            </div><br><br>
                                <hr class="cbs-blood-bg">
                                <div>

                                  <div class="col-md-6">
                                    <a id="864" name="864" class="hashlink"></a>
                                    <div
                                      class=" h-100 d-flex align-items-center paragraph paragraph--type-local-navigation paragraph--view-mode-default paragraph-id-864">

                                      <div>

                                        <div>
                                          <h4 class="font-weight-bold"> All topics in Am I eligible?</h4>
                                        </div>

                                        <div>
                                          <ul class="clearfix jump">
                                             @foreach($subCategory->subSubCategories as $subSubCategory)
                                                <li class="nav-item menu-item--collapsed">
                                                <a href="{{ route('sub_sub_details',['slug'=>$subSubCategory->slug]) }}"
                                                    aria-label="ABCs of blood donation eligibility"
                                                    data-drupal-link-system-path="node/330">{{  $subSubCategory->name }}</a>
                                                </li>
                                                @endforeach
                                          </ul>


                                        </div>




                                      </div>


                                    </div>



                                  </div>

                                </div>


                              </div>


                            </div>


                            <a id="12430" name="12430" class="hashlink"></a>
                            <div
                              class="cbs-blood-bg py-2 paragraph paragraph--type-myaccount-search paragraph--view-mode-default paragraph-id-12430">



                              <div class="container">

                                <div id="block-cbsgoogleplacessearchblock"
                                  class="block block-cbs-google-places-search-form block-cbs-google-places-search-block">


                                  <div class="content">
                                    <div class="row fixed-banner">
                                      <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0">
                                        <h2 class="h5 font-weight-bold text-white mb-0">Book now to donate blood</h2>
                                        <p class="font-weight-bold text-white mb-0"><a
                                            href="am-i-eligible-donate-blood.html">Am I eligible?&nbsp;&nbsp;<span
                                              class="fontawesome-icon-inline"><span
                                                class="fa-arrow-right fas"></span></span></a></p>
                                      </div>
                                      <div
                                        class="col-10 offset-1 col-md-6 offset-md-3 offset-lg-0 col-lg-6 py-2 cbs-google-places-search-form">
                                        <form class="cbs-google-places-search-form-autocomplete d-block d-lg-flex"
                                          data-drupal-selector="cbs-google-places-search-form-autocomplete"
                                          action="https://www.blood.ca/en/blood/am-i-eligible-donate-blood"
                                          method="post" id="cbs-google-places-search-form-autocomplete"
                                          accept-charset="UTF-8">




                                          <div
                                            class="js-form-item js-form-type-search form-type-search js-form-item-cbs-google-places-search form-item-cbs-google-places-search form-no-label form-group col-auto col-lg-8 mb-lg-0 pr-0">
                                            <label for="edit-cbs-google-places-search"
                                              class="sr-only js-form-required form-required">Location or web
                                              code</label>
                                            <input
                                              class="location-input w-100 border border-white cbs-google-places-search-form-input form-autocomplete form-search required form-control"
                                              data-drupal-selector="edit-cbs-google-places-search"
                                              data-autocomplete-path="/en/cbs-google-search?minCharacters=3"
                                              type="search" id="edit-cbs-google-places-search"
                                              name="cbs_google_places_search" value="" size="60" maxlength="128"
                                              required="required" aria-required="true"
                                              placeholder="Location or web code" />

                                          </div>
                                          <input
                                            class="btn-adapts bg-dark border border-dark px-2 button js-form-submit form-submit btn btn-primary form-control"
                                            data-drupal-selector="edit-submit" type="submit" id="edit-submit" name="op"
                                            value="Start booking" />
                                          <input autocomplete="off"
                                            data-drupal-selector="form-hmcyevjpjfh1txxwg-9ap0gfhavpbxy7hbesjj8q49c"
                                            type="hidden" name="form_build_id"
                                            value="form-HMCyevJpjfh1TxxwG-9Ap0GfHavPbxy7HBesJJ8q49c"
                                            class="form-control" />
                                          <input data-drupal-selector="edit-cbs-google-places-search-form-autocomplete"
                                            type="hidden" name="form_id"
                                            value="cbs_google_places_search_form_autocomplete" class="form-control" />
                                          <div class="url_1-textfield js-form-wrapper form-group"
                                            style="display: none !important;">



                                            <div
                                              class="js-form-item js-form-type-textfield form-type-textfield js-form-item-url-1 form-item-url-1 form-group col-auto">
                                              <label for="edit-url-1">Leave this field blank</label>
                                              <input autocomplete="off" data-drupal-selector="edit-url-1" type="text"
                                                id="edit-url-1" name="url_1" value="" size="20" maxlength="128"
                                                class="form-text form-control" />

                                            </div>
                                          </div>

                                        </form>

                                      </div>
                                      <div
                                        class="col-10 offset-1 col-md-6 offset-md-3 col-lg-3 offset-lg-0 d-flex align-items-center">
                                        <div class="row">
                                          <div class="col-6 offset-md-0 text-right"><a
                                              href="https://itunes.apple.com/app/id804765636">
                                              <div>


                                                <div
                                                  class="field field--name-field-media-image field--type-image field--label-visually_hidden">
                                                  <div class="field__label visually-hidden">Image</div>
                                                  <div class="field__item"> <img class="img-fluid"
                                                      srcset="/sites/default/files/styles/max_325x325/public/app_store.png?itok=bZ3_p4Hu 325w, /sites/default/files/styles/max_650x650/public/app_store.png?itok=JXw-GSl9 562w"
                                                      sizes="(min-width: 1290px) 1290px, 100vw"
                                                      src="../../sites/default/files/styles/max_325x325/public/app_store8d9f.png?itok=bZ3_p4Hu"
                                                      alt="Download on the App Store" typeof="foaf:Image" />


                                                  </div>
                                                </div>

                                              </div>

                                            </a></div>

                                          <div class="col-6 offset-md-0 text-left"><a
                                              href="https://play.google.com/store/apps/details?id=ca.blood.giveblood">
                                              <div>


                                                <div
                                                  class="field field--name-field-media-image field--type-image field--label-visually_hidden">
                                                  <div class="field__label visually-hidden">Image</div>
                                                  <div class="field__item"> <img class="img-fluid"
                                                      srcset="/sites/default/files/styles/max_325x325/public/2018-09/play_store.png?itok=K1iIU9x_ 280w"
                                                      sizes="(min-width: 1290px) 1290px, 100vw"
                                                      src="../../sites/default/files/styles/max_325x325/public/2018-09/play_store0c58.png?itok=K1iIU9x_"
                                                      alt="Android app on Google Play" typeof="foaf:Image" />


                                                  </div>
                                                </div>

                                              </div>

                                            </a></div>
                                        </div>
                                      </div>
                                    </div>



                                  </div>
                                </div>



                              </div>



                            </div>


                            <a id="788" name="788" class="hashlink"></a>
                            <div
                              class="paragraph paragraph--type-content-w-image-link-right paragraph--view-mode-default paragraph-id-788">




                              <div class="row">
                                <div
                                  class="col-12 col-sm-8 order-1 order-sm-0 cbs-p-extend-left cbs-blood-bg p-4 pl-md-1 pr-md-4 py-md-4">

                                  <div class="row h-100 align-items-center">
                                    <div class="offset-md-2 col-md-9">
                                      <a id="786" name="786" class="hashlink"></a>
                                      <div
                                        class="cbs-blood-bg h-100 d-flex flex-row align-items-center paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-default paragraph-id-786">




                                        <div class="w-100">

                                          <div class="w-100">
                                            <h4><strong>New to donating blood?</strong></h4>

                                            <p><br />
                                              If you are considering donating blood for the first time you must be: </p>

                                            <ul>
                                              <li>In good general health</li>
                                              <li>Able to perform your normal day-to-day activities</li>
                                              <li>At least 17 years old</li>
                                              <li>Meet our <strong><a
                                                    href="am-i-eligible-donate-blood/abcs-eligibility.html#weight">height
                                                    and weight requirements if you are between 17 and 23 years
                                                    old</a></strong>.  </li>
                                            </ul>

                                          </div>



                                        </div>


                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <div class="col-12 col-sm-4 p-0 cbs-p-extend-right bg-white">

                                  <div class="d-flex align-items-center h-100">
                                    <div class="img-fluid mx-0 pt-0">




                                      <div class="media media--blazy media--image">
                                        <img alt="Image of male donor" class="media__image media__element b-lazy"
                                          data-src="/sites/default/files/2018-09/IMG_1168x1080.jpg"
                                          src="data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D&#039;http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg&#039;%20viewBox%3D&#039;0%200%201168%201080&#039;%2F%3E"
                                          width="1168" height="1080" typeof="foaf:Image" />



                                      </div>


                                    </div>

                                  </div>

                                </div>


                              </div>


                            </div>


                            <a id="792" name="792" class="hashlink"></a>
                            <div
                              class="paragraph paragraph--type-content-w-image-link-left paragraph--view-mode-default paragraph-id-792">




                              <div class="row">
                                <div class="col-12 col-md-6 col-lg-5 col-xl-4 p-0 cbs-p-extend-left bg-white">

                                  <div class="d-flex align-items-center h-100">
                                    <div class="img-fluid mx-0 pt-0">




                                      <div class="media media--blazy media--image">
                                        <img alt="Stefanie" class="media__image media__element b-lazy"
                                          data-src="/sites/default/files/styles/max_650x650/public/2021-12/M2442-blood.ca-blood-am-i-eligible-stefanie.jpg?itok=qMzoE4gB"
                                          src="data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D&#039;http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg&#039;%20viewBox%3D&#039;0%200%20600%20576&#039;%2F%3E"
                                          width="600" height="576" typeof="foaf:Image" />



                                      </div>


                                    </div>

                                  </div>

                                </div>

                                <div
                                  class="col-12 col-md-6 col-lg-7 col-xl-8 cbs-p-extend-right cbs-white-bg p-4 pl-md-4 pr-md-1 py-md-4">

                                  <div class="row h-100 align-items-center">
                                    <div class="offset-1 col-10 col-md-8">
                                      <a id="790" name="790" class="hashlink"></a>
                                      <div
                                        class="cbs-white-bg h-100 d-flex flex-row align-items-center paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-default paragraph-id-790">




                                        <div class="w-100">

                                          <div class="w-100">
                                            <h4><strong>Donated before?</strong></h4>

                                            <p><br />
                                              On the day of your donation, it is important that you are hydrated, have
                                              eaten, had adequate sleep and in good general health. </p>

                                            <p>If you are a frequent donor, remember that the number of
                                              donation appointments you can make depends on the type of donation you are
                                              making. You can donate: </p>

                                            <ul>
                                              <li>Whole blood every 56 days for males, every 84 days for females. </li>
                                              <li>Plasma every 6–14 days, depending on the donor program</li>
                                              <li>Platelets every 14 days. </li>
                                            </ul>

                                          </div>



                                        </div>


                                      </div>

                                    </div>

                                  </div>

                                </div>


                              </div>


                            </div>


                            <a id="990" name="990" class="hashlink"></a>
                            <div
                              class="cbs-blood-bg h-100 paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-standalone paragraph-id-990">




                              <div class="container">

                                <div class="row">

                                  <div class="col-12 p-4 px-md-1 py-md-4">

                                    <div class="w-100">
                                      <h4><strong>Changes to our donation criteria </strong></h4>

                                      <p><br />
                                        We have recently updated our eligibility criteria for blood donation. Visit
                                        our <strong><a
                                            href="am-i-eligible/changes-donation-criteria-blood-donation.html">Recent
                                            Changes for Donors</a></strong> page for a summary of our changes. If you
                                        did not meet our eligibility criteria in the past, you might now be eligible to
                                        donate! </p>

                                      <p>Keep checking our website for up-to-date information on donor eligibility. </p>

                                    </div>



                                  </div>

                                </div>

                              </div>


                            </div>


                            <a id="996" name="996" class="hashlink"></a>
                            <div
                              class="bg-light cbs-bg-image row cbs-bg-image-tall   paragraph paragraph--type-_-col-split-content-left-and-rig paragraph--view-mode-full-background-image paragraph-id-996">




                              <div class="container">

                                <div class="row">
                                  <div class="col-md-6 p-3 d-flex align-items-center">

                                    <a id="992" name="992" class="hashlink"></a>
                                    <div
                                      class="w-100 paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-vertical-center paragraph-id-992">




                                      <div class="pt-5 pb-5 pl-3 pr-3">

                                        <div>
                                          <h4><strong>Donor centre locations and hours </strong></h4>

                                          <p><br />
                                            We recruit and collect blood, plasma and platelet donations at over 13,000
                                            donation events every year. We have 35 permanent donor centres and over 4000
                                            mobile donor centres across Canada.</p>

                                        </div>



                                      </div>


                                    </div>




                                  </div>

                                  <div class="col-md-6 p-5 d-flex align-items-center">

                                    <a id="994" name="994" class="hashlink"></a>
                                    <div
                                      class="w-100 paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-vertical-center paragraph-id-994">




                                      <div class="pt-5 pb-5 pl-3 pr-3">

                                        <div>
                                          <p class="text-align-center"><a class="btn btn-primary"
                                              href="clinic-hours%23blood.html">Find a donor centre</a></p>

                                        </div>



                                      </div>


                                    </div>




                                  </div>


                                </div>

                              </div>

                              <div
                                class="field field--name-field-background-image field--type-image field--label-hidden field__item">
                              </div>


                            </div>


                            <a id="47" name="47" class="hashlink"></a>
                            <div
                              class="cbs-blood-bg h-100 paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-standalone paragraph-id-47">




                              <div class="container">

                                <div class="row">

                                  <div class="col-12 p-4 px-md-1 py-md-4">

                                    <div class="w-100">
                                      <h4><strong>Can I donate to Canadian Blood Services if I’m from Quebec?</strong>
                                      </h4>

                                      <p><br />
                                        Residents of Quebec can donate at any Canadian Blood Services donor centre in
                                        Canada, though we do not operate centres within the province of Quebec. If you
                                        make a blood donation at a Héma-Québec donor centre, your donation will be
                                        acknowledged as part of your Canadian Blood Services donation count.</p>

                                      <p> </p>

                                    </div>


                                    <div>

                                      <div class="jump-r">
                                        <a href="https://www.hema-quebec.qc.ca/">Learn more about Héma-Québec.</a>
                                      </div>


                                    </div>


                                  </div>

                                </div>

                              </div>


                            </div>


                            <a id="7283" name="7283" class="hashlink"></a>
                            <div
                              class="cbs-white-bg pt-5 pb-5 paragraph paragraph--type-_-col-related-content paragraph--view-mode-default paragraph-id-7283">



                              <div class="body-container">

                                <div class="row">
                                  <h3 class="p-0">
                                    Related information</h3>

                                </div>

                              </div>

                              <div class="body-container">

                                <div class="row row-eq-height">
                                  <div class="col-md-4">
                                    <a id="7277" name="7277" class="hashlink"></a>
                                    <div
                                      class="card h-100  paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-card paragraph-id-7277">




                                      <div class="pt-5 pr-5 pl-5 card-body h-100">

                                        <h4 class="w-100 pb-2 font-weight-bold">
                                          Donating blood</h4>


                                        <hr class="cbs-separator">

                                        <div class="w-100">
                                          <p>It only takes about an hour of your time to change someone’s life. If you
                                            are in good health and meet our eligibility criteria, you can
                                            donate blood as frequently as every 56 days for males and every 84 days for
                                            females.</p>

                                        </div>



                                      </div>
                                      <div class="pr-5 pl-5 pb-5">

                                        <div class="jump-r font-weight-bold">
                                          <a href="donating-blood.html">Donating Blood</a>
                                        </div>


                                      </div>



                                    </div>

                                  </div>
                                  <div class="col-md-4">
                                    <a id="7279" name="7279" class="hashlink"></a>
                                    <div
                                      class="card h-100  paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-card paragraph-id-7279">




                                      <div class="pt-5 pr-5 pl-5 card-body h-100">

                                        <h4 class="w-100 pb-2 font-weight-bold">
                                          Donating plasma</h4>


                                        <hr class="cbs-separator">

                                        <div class="w-100">
                                          <p>If you are in good health and meet out eligibility criteria, you can donate
                                            plasma as frequently as every seven days. To become a plasma donor, having a
                                            history of making regular blood donations helps, but is not always
                                            necessary.</p>

                                        </div>



                                      </div>
                                      <div class="pr-5 pl-5 pb-5">

                                        <div class="jump-r font-weight-bold">
                                          <a href="../plasma.html">Donating Plasma</a>
                                        </div>


                                      </div>



                                    </div>

                                  </div>
                                  <div class="col-md-4">
                                    <a id="7281" name="7281" class="hashlink"></a>
                                    <div
                                      class="card h-100  paragraph paragraph--type-title-text-link-bg-image paragraph--view-mode-card paragraph-id-7281">




                                      <div class="pt-5 pr-5 pl-5 card-body h-100">

                                        <h4 class="w-100 pb-2 font-weight-bold">
                                          Donating platelets</h4>


                                        <hr class="cbs-separator">

                                        <div class="w-100">
                                          <p>When a blood vessel is damaged, platelets cluster together and stick to
                                            the opening of the broken vessel to plug the hole. If you are in good health
                                            and meet our eligibility criteria, you can donate platelets as frequently
                                            as every 14 days.</p>

                                        </div>



                                      </div>
                                      <div class="pr-5 pl-5 pb-5">

                                        <div class="jump-r font-weight-bold">
                                          <a href="donating-platelets.html">Donating Platelets</a>
                                        </div>


                                      </div>



                                    </div>

                                  </div>

                                </div>

                              </div>



                            </div>




                          </div>



                        </div>


                      </div>
                    </div>

                  </section>
                </main>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

{{--    <input tabindex="0" id="fixed_bottom_checkbox" type="checkbox" name="fixed-bottom-checkbox" value="value"--}}
{{--      class="visually-hidden">--}}
{{--    <div id="fixed-bottom">--}}
{{--      <div class="d-flex align-items-center flex-column">--}}
{{--        <ul class="trapezoid mb-0 pl-0">--}}
{{--          <li><label tabindex="0" for="fixed_bottom_checkbox" class="mb-0" name="Book your donation"> Book your--}}
{{--              donation</label></li>--}}
{{--        </ul>--}}
{{--        <div class="w-100 bg-primary py-4" id="fixed_bottom_form">--}}
{{--          <div class="container pb-5">--}}
{{--            <section class="row region region-fixed-banner-bottom">--}}
{{--              <div id="block-cbsgoogleplacessearchblockonecolumn"--}}
{{--                class="w-100 block block-cbs-google-places-search-form block-cbs-google-places-search-block-one-col">--}}


{{--                <div class="content">--}}
{{--                  <div class="row fixed-banner">--}}
{{--                    <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 py-2 cbs-google-places-search-form">--}}
{{--                      <form class="cbs-google-places-search-form-autocomplete d-block d-lg-flex"--}}
{{--                        data-drupal-selector="cbs-google-places-search-form-autocomplete"--}}
{{--                        action="https://www.blood.ca/en/blood/am-i-eligible-donate-blood" method="post"--}}
{{--                        id="cbs-google-places-search-form-autocomplete" accept-charset="UTF-8">--}}




{{--                        <div--}}
{{--                          class="js-form-item js-form-type-search form-type-search js-form-item-cbs-google-places-search form-item-cbs-google-places-search form-no-label form-group col-auto col-lg-8 mb-lg-0 pr-0">--}}
{{--                          <label for="edit-cbs-google-places-search"--}}
{{--                            class="sr-only js-form-required form-required">Location or web code</label>--}}
{{--                          <input--}}
{{--                            class="location-input w-100 border border-white cbs-google-places-search-form-input form-autocomplete form-search required form-control"--}}
{{--                            data-drupal-selector="edit-cbs-google-places-search"--}}
{{--                            data-autocomplete-path="/en/cbs-google-search?minCharacters=3" type="search"--}}
{{--                            id="edit-cbs-google-places-search" name="cbs_google_places_search" value="" size="60"--}}
{{--                            maxlength="128" required="required" aria-required="true"--}}
{{--                            placeholder="Location or web code" />--}}

{{--                        </div>--}}
{{--                        <input--}}
{{--                          class="btn-adapts bg-dark border border-dark px-2 button js-form-submit form-submit btn btn-primary form-control"--}}
{{--                          data-drupal-selector="edit-submit" type="submit" id="edit-submit--4" name="op"--}}
{{--                          value="Start booking" />--}}
{{--                        <input autocomplete="off"--}}
{{--                          data-drupal-selector="form-0yfjefrojcvlwvmjmblzfydod9io6fg0-aeev7myyyw" type="hidden"--}}
{{--                          name="form_build_id" value="form-0YFJEfroJCvLWvmjmblZFydOD9io6FG0_AEEV7myYYw"--}}
{{--                          class="form-control" />--}}
{{--                        <input data-drupal-selector="edit-cbs-google-places-search-form-autocomplete" type="hidden"--}}
{{--                          name="form_id" value="cbs_google_places_search_form_autocomplete" class="form-control" />--}}
{{--                        <div class="url_1-textfield js-form-wrapper form-group" style="display: none !important;">--}}



{{--                          <div--}}
{{--                            class="js-form-item js-form-type-textfield form-type-textfield js-form-item-url-1 form-item-url-1 form-group col-auto">--}}
{{--                            <label for="edit-url-1">Leave this field blank</label>--}}
{{--                            <input autocomplete="off" data-drupal-selector="edit-url-1" type="text" id="edit-url-1"--}}
{{--                              name="url_1" value="" size="20" maxlength="128" class="form-text form-control" />--}}

{{--                          </div>--}}
{{--                        </div>--}}

{{--                      </form>--}}

{{--                    </div>--}}
{{--                  </div>--}}

{{--                </div>--}}
{{--              </div>--}}

{{--            </section>--}}

{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

  </div>
@endsection

