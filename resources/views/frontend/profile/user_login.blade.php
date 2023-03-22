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

    </style>
@endsection
@section('content')

<div class="">
    <div class="">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="cbs-metronic-repage-content-regular">
                <div class="cbs-metronic-page-content">
                    <div class="cbs-metronic-page-content-inner">


                        <div class="page-title-wrapper-outer page-title-default-location">
                            <div class="page-title-wrapper">
                                <div class="page-title-wrapper-inner">
                                    <div class="page-title-content">
                                        <!-- BEGIN PAGE TITLE-->
                                        <h1 class="page-title text-center">
                                            Sign in or create an account                  </h1>
                                        <!-- END PAGE TITLE-->
                                    </div>
                                </div>
                            </div>
                        </div><br><br>

                        <!-- END PAGE HEADER-->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="region region-content">
                                    <div id="block-system-main" class="block block-system">
                                        <div class="content">
                                            <div class="panel-bootstrap panels-bootstrap-dwp_basic_2_column_6_6_">
                                                <div  id="panel-bootstrap-row-3"  class="row panels-bootstrap-row panels-bootstrap-row-dwp_basic_2_column_6_6_-3 row-inside-first clearfix inside">
                                                    <div  id="panel-bootstrap-column-4"  class="column panels-bootstrap-column col-xs-12 col-sm-12 col-md-12 col-lg-12 panels-bootstrap-column-dwp_basic_2_column_6_6_-4 column-inside-first column-inside-last inside">
                                                        <div  id="panel-bootstrap-region-top"  class="panels-bootstrap-region panels-bootstrap-region-dwp_basic_2_column_6_6_-top region-inside-first region-inside-last inside">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div  id="panel-bootstrap-row-main"  class="row panels-bootstrap-row-dwp_basic_2_column_6_6_-main">
                                                    <div  id="panel-bootstrap-column-1"  class="column panels-bootstrap-column col-md-6 col-lg-6 col-sm-12 panels-bootstrap-column-dwp_basic_2_column_6_6_-1 column-inside-first inside">
                                                        <div  id="panel-bootstrap-region-column_1"  class="panels-bootstrap-region panels-bootstrap-region-dwp_basic_2_column_6_6_-column_1 region-inside-first region-inside-last inside">
                                                            <div class="panel-pane pane-custom pane-1 user-login-lead-in"  >
                                                                <div class="pane-content text-center">
                                                                    <h2>Sign in</h2>
                                                                </div>
                                                            </div>
                                                            <div clss="panel-separator"></div><div class="panel-pane pane-block pane-cbs-wss-login-cbs-wss-block-form-user-login"  >

                                                                <div class="pane-content ml-4">
                                                                    <form class="user-login" action="{{ route('login_home') }}" method="post" id="user-login" accept-charset="UTF-8" role="form">
                                                                        @csrf
                                                                        <div class="form-body">
                                                                            <div class="form-wrapper" id="edit-credentials">
                                                                                <div class="form-item form-group form-type-textfield form-item-name {{ $errors->has('email') ? 'has-error' :'' }}">
                                                                                    <label for="edit-name">User Email <span class="form-required" ></span></label>
                                                                                    <input placeholder="Enter your email" type="email" id="edit-name" name="email" value="" size="60" maxlength="128" class="form-text required form-control"/>
                                                                                    @error('email')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-item form-group form-type-password form-item-pass {{ $errors->has('password') ? 'has-error' :'' }}">
                                                                                    <label for="edit-pass">Password <span class="form-required" ></span></span></label>
                                                                                    <input placeholder="Password" type="password" id="edit-pass" name="password" size="60" maxlength="128" class="form-text required form-control" />
                                                                                    @error('password')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div><input type="hidden" name="form_build_id" value="form-zWouHDmD7fLhMDYg-bWp6CoImTk_XAYrux0TuZAz784" />
                                                                            <input type="hidden" name="form_id" value="user_login" />
                                                                            <div class="form-actions form-wrapper" id="edit-actions"><input type="submit" id="edit-submit" name="op" value="Log in" class="form-submit btn btn-default btn btn-danger" /></div><div class="item-list"><ul class="cbs-user-login-help-text"><li class="first"><a id="createaccount" href="/en/user/register">Don't have an account?</a></li>
                                                                                    <li><a href="/en/user/username">Forgot username</a></li>
                                                                                    <li class="last"><a id="forgotpassword" href="/en/user/password">Forgot password</a></li>
                                                                                </ul></div>
                                                                            </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div  id="panel-bootstrap-column-2"  class="column panels-bootstrap-column col-md-6 col-lg-6 col-sm-12 panels-bootstrap-column-dwp_basic_2_column_6_6_-2 column-inside-last inside">
                                                        <div  id="panel-bootstrap-region-column_2"  class="panels-bootstrap-region panels-bootstrap-region-dwp_basic_2_column_6_6_-column_2 region-inside-first region-inside-last inside">
                                                            <div class="panel-pane pane-custom pane-2 user-registration-lead-in">
                                                                <div class="pane-content text-center">
                                                                    <h2>Create an account</h2>
                                                                </div>
                                                            </div>
                                                            <div class="panel-separator"></div>
                                                            <div class="panel-pane pane-block pane-cbs-wss-registration-cbs-wss-reg-bk-form-partner-reg"  >
                                                                <div class="pane-content ml-4 mr-4">
                                                                    <form class="cbs-wss-registration-form-personal-information" action="{{ route('user_register') }}" enctype="multipart/form-data" method="post" id="-cbs-wss-registration-form-partner-registration" accept-charset="UTF-8" role="form">
                                                                        @csrf
                                                                        <div class="form-body">
                                                                           <div class="personal-information-blurb form-wrapper" id="edit-personal-information-blurb"></div>
                                                                           <div class="personal-information-col-1 form-wrapper" id="edit-personal-information-col-1">

                                                                                <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('name') ? 'has-error' :'' }}">
                                                                                    <label for="edit-first-name">Name <span class="form-required" ></span></label>
                                                                                    <input autocomplete="given-name" type="text" placeholder="Enter Your Name" name="name" value="{{old('name')}}" size="60" maxlength="128" class="form-text form-control" />
                                                                                    @error('name')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                               <div class="form-item form-group form-type-textfield form-item-email {{ $errors->has('email') ? 'has-error' :'' }}">
                                                                                   <label for="edit-email">Email address<span class="form-required" ></span></label>
                                                                                   <input autocomplete="email" type="email" id="edit-email" name="email" value="{{old('email')}}" size="60" maxlength="128" class="form-text form-control" />
                                                                                   @error('email')
                                                                                   <span class="help-block text-danger">{{ $message }}</span>
                                                                                   @enderror
                                                                               </div>
                                                                                <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('date_of_birth') ? 'has-error' :'' }}">
                                                                                    <label for="edit-first-name">Date Of Birth <span class="form-required" ></span></label>
                                                                                    <input autocomplete="given-name" type="date"  name="date_of_birth" value="{{old('date_of_birth')}}" size="60" maxlength="128" class="form-text required form-control" />
                                                                                    @error('date_of_birth')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('blood_group') ? 'has-error' :'' }}">
                                                                                    <label for="edit-first-name">Blood Group <span class="form-required" ></span></label>
                                                                                    <select id="blood_group" class="form-control " name="blood_group">
                                                                                        <option value="">Select Your Blood Group</option>
                                                                                        <option {{ old('blood_group') == 'A+' ? 'selected' : '' }} value="A+">A+</option>
                                                                                        <option {{ old('blood_group') == 'A-' ? 'selected' : '' }}  value="A-">A-</option>
                                                                                        <option {{ old('blood_group') == 'B+' ? 'selected' : '' }}  value="B+">B+</option>
                                                                                        <option {{ old('blood_group') == 'B-' ? 'selected' : '' }}  value="B-">B-</option>
                                                                                        <option {{ old('blood_group') == 'O+' ? 'selected' : '' }}  value="O+">O+</option>
                                                                                        <option {{ old('blood_group') == 'O-' ? 'selected' : '' }}  value="O-">O-</option>
                                                                                        <option {{ old('blood_group') == 'AB+' ? 'selected' : '' }}  value="AB+">AB+</option>
                                                                                        <option {{ old('blood_group') == 'AB-' ? 'selected' : '' }}  value="AB-">AB-</option>
                                                                                      </select>
                                                                                      @error('blood_group')
                                                                                      <span class="help-block text-danger">{{ $message }}</span>
                                                                                      @enderror
                                                                                </div>

                                                                               <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('last_blood_donate') ? 'has-error' :'' }}">
                                                                                   <label for="edit-first-name">Last Blood Donate Date </label>
                                                                                   <input autocomplete="given-name" type="date" placeholder="Enter Last Donate Date" name="last_blood_donate" value="{{old('last_blood_donate')}}" size="60" maxlength="128" class="form-text required form-control" />
                                                                                   @error('last_blood_donate')
                                                                                   <span class="help-block text-danger">{{ $message }}</span>
                                                                                   @enderror
                                                                               </div>

                                                                                <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('age') ? 'has-error' :'' }}">
                                                                                    <label for="edit-first-name">You Age <span class="form-required" ></span></label>
                                                                                    <input autocomplete="given-name" type="text" placeholder="Enter Your Age" name="age" value="{{old('age')}}" size="60" maxlength="128" class="form-text required form-control" />
                                                                                    @error('age')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-item form-group form-type-textfield form-item-first-name {{ $errors->has('weight') ? 'has-error' :'' }}">
                                                                                    <label for="edit-first-name">Your Weight  <span class="form-required" ></span></label>
                                                                                    <input autocomplete="given-name" type="text" placeholder="Enter Your Weight" name="weight" value="{{old('weight')}}" size="60" maxlength="128" class="form-text required form-control" />
                                                                                    @error('weight')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-item form-group form-type-textfield form-item-first-name">
                                                                                    <label for="division">Division <span class="form-required" ></span></label>

                                                                                    <select class="form-control" id="division" name="division" >
                                                                                        <option value="">Select Division</option>
                                                                                        @foreach ($divisions as $division)
                                                                                        <option value="{{ $division->id }}" {{ old('division') == $division->id ? 'selected' : '' }} >{{ $division->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-item form-group form-type-textfield form-item-first-name">
                                                                                    <label for="district">District <span class="form-required" ></span></label>
                                                                                    <select class="form-control" id="district" name="district" >
                                                                                        <option value="">Select District</option>
                                                                                    </select>
                                                                                    @error('district')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-item form-group form-type-textfield form-item-first-name">
                                                                                    <label for="thana">Thana <span class="form-required" ></span></label>
                                                                                    <select class="form-control" id="thana" name="thana" >
                                                                                        <option value="">Select Upazila</option>
                                                                                    </select>
                                                                                    @error('thana')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-item form-group form-type-telfield form-item-phone-number {{ $errors->has('phone') ? 'has-error' :'' }}">
                                                                                    <label for="edit-phone-number">Phone number <span class="form-required" ></span></label>
                                                                                    <input autocomplete="" type="text" placeholder="Your Phone Number" name="phone" value="{{old('phone')}}" size="20" maxlength="64" class="form-text form-tel required form-control" />
                                                                                    @error('phone')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                 <div class="form-item form-group form-type-password form-item-pass {{ $errors->has('password') ? 'has-error' :'' }}">
                                                                                        <label for="edit-pass">Password <span class="form-required" ></span></span></label>
                                                                                        <input placeholder="Password" type="password" id="edit-pass" name="password" size="60" maxlength="128" class="form-text required form-control" />
                                                                                        @error('password')
                                                                                        <span class="help-block text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                 </div>

                                                                                 <div  class="form-wrapper"><div class="form-item form-group form-type-password form-item-password">
                                                                                    <label for="edit-password"> Confirm Password <span class="form-required" ></span></label>
                                                                                    <input type="password"  name="password_confirmation" size="60" maxlength="128" class="form-text required form-control" placeholder="Enter Confirm Password" />
                                                                                    @error('name')
                                                                                    <span class="help-block text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                </div><input type="submit" id="edit-next" name="op" value="Register" class="form-submit btn btn-default btn btn-danger" /></div><input type="hidden" name="context" value="" />
                                                                            <input type="hidden" name="form_build_id" value="form-jEEkfk7tO3k2KBcuicQ6QJRKvIYA8zA6zRlFKHmqGSw" />
                                                                            <input type="hidden" name="form_id" value="_cbs_wss_registration_form_partner_registration" />
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div  id="panel-bootstrap-row-5"  class="row panels-bootstrap-row panels-bootstrap-row-dwp_basic_2_column_6_6_-5 row-inside-last clearfix inside">
                                                    <div  id="panel-bootstrap-column-6"  class="column panels-bootstrap-column col-xs-12 col-sm-12 col-md-12 col-lg-12 panels-bootstrap-column-dwp_basic_2_column_6_6_-6 column-inside-first column-inside-last inside">
                                                        <div  id="panel-bootstrap-region-bottom"  class="panels-bootstrap-region panels-bootstrap-region-dwp_basic_2_column_6_6_-bottom region-inside-first region-inside-last inside">
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
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler" role="button" aria-label="Toggle quick sidebar">
        <i class="icon-login"></i>
    </a>
    <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
        <div class="page-quick-sidebar">

            <ul class="nav nav-tabs">
                <!-- BEGIN SIDEBAR TABS -->
                <!-- END SIDEBAR TABS -->
            </ul>
            <div class="tab-content">
                <!-- BEGIN SIDEBAR TABS CONTENT -->
                <!-- END SIDEBAR TABS CONTENT -->
            </div>


        </div>
    </div>
    <!-- END QUICK SIDEBAR -->
</div>

@endsection
@section('script')
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
    <script>

        $(function () {
            var districtSelected = '{{ old('district') }}';

            $('#division').change(function () {
                var divisionId = $(this).val();

                $('#district').html('<option value="">Select District</option>');

                if (divisionId != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_district') }}",
                        data: { divisionId: divisionId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (districtSelected == item.id)
                                $('#district').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#district').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        $('#district').trigger('change');
                    });

                }

            });

            $('#division').trigger('change');

            var thanaSelected = '{{ old('thana') }}';


            $('#district').change(function () {
                var districtId = $(this).val();

                $('#sub_sub_category').html('<option value="">Select Thana</option>');

                if (districtId != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_thana') }}",
                        data: { districtId: districtId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (thanaSelected == item.id)
                                $('#thana').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#thana').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });

                    });
                }
            });
            $('#district').trigger('change');
        });
    </script>
@endsection


