@extends('layouts.admin')
@section('styles')
    @include('partials.steps-form')
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
@endsection
@section('content')
    <form id="user-register-form" method="POST" action=""
          enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}

        <div id="wizard">

            <!-- start -:- General Information -->
            <h2>General Information</h2>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>User Type</strong></label>
                            </div>
                            <select name="user_type_id" id="user_type_id" class="form-select">
                                <option value="">--Select User Type--</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                                <option value="4">Guest</option>
                            </select>
                            @if ($errors->has('user_type_id'))
                                <span class="text-danger"><strong>{{ $errors->first('user_type_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Name</strong></label>
                            </div>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="Enter Full Name"/>
                            @if ($errors->has('name'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>E-Mail</strong></label>
                            </div>
                            <input type="text" name="email" id="email" class="form-control "
                                   placeholder="Enter E-mail"/>
                            @if ($errors->has('email'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Username</strong></label>
                            </div>
                            <input type="text" name="username" id="username" class="form-control "
                                   placeholder="Enter Username"/>
                            @if ($errors->has('username'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Phone</strong></label>
                            </div>
                            <input type="text" name="phone_no" id="phone_no" class="form-control "
                                   placeholder="Enter Phone No"/>
                            @if ($errors->has('phone_no'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('phone_no') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Mobile</strong></label>
                            </div>
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control "
                                   placeholder="Enter Mobile No"/>
                            @if ($errors->has('mobile_no'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('mobile_no') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Date Of Birth</strong></label>
                            </div>
                            <input type="text" name="date_of_birth" id="date_of_birth"
                                   class="form-control dob-datepicker"
                                   placeholder=""/>
                            @if ($errors->has('date_of_birth'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>National ID</strong></label>
                            </div>
                            <input type="text" name="national_id" id="national_id" class="form-control "
                                   placeholder="Enter National ID"/>
                            @if ($errors->has('national_id'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('national_id') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Passport</strong></label>
                            </div>
                            <input type="text" name="national_id" id="passport_no" class="form-control "
                                   placeholder="Enter Passport No"/>
                            @if ($errors->has('passport_no'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('passport_no') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                </div><!-- ./row -->
            </fieldset>
            <!-- end -:- General Information -->

            <h2>Contact Information</h2>
            <fieldset>
                <div class="row">
                    <div class="col-md-6 offset-4 mt-4">
                        <div class="form-group d-flex">
                            <label class="input-group-text"><strong>Country</strong></label>
                            <select name="country_code" id="country_code" class="form-select">
                                <option value="">--Select Country--</option>
                                <option value="BD">Bangladesh</option>
                                <option value="PK">Pakistan</option>
                                <option value="IN">India</option>
                            </select>
                            @if ($errors->has('country_code'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('country_code') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 offset-4 mt-4">
                        <div class="form-group d-flex">
                            <label class="input-group-text"><strong>Phone</strong></label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                   placeholder="Enter Phone"/>
                            @if ($errors->has('phone'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>

            <h2>Upload Information</h2>
            <fieldset>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" name="picture" id="picture"
                                   onchange="imageUploadWithCroppingAndDetect(this, 'preview_picture', 'user_pic_base64')"
                            />
                            @if ($errors->has('picture'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('picture') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <figure>
                            <img src="{{ asset('assets/img/default.png') }}"
                                 class="img-thumbnail" alt="Profile Picture" width="200" height="200"
                                 id="preview_picture"/>
                        </figure>
                        <input type="hidden" id="user_pic_base64"
                               name="user_pic_base64"/>
                    </div>
                </div>
            </fieldset>
            <h2>Authenticate Information</h2>
            <fieldset>
                <div class="row">
                    <div class="col-md-6 offset-4 mt-4">
                        <div class="form-group d-flex">
                            <label class="input-group-text"><strong>Phone</strong></label>
                            <input type="text" name="password" id="password" class="form-control"
                                   placeholder="Enter Password"/>
                        </div>
                    </div>

                </div>
            </fieldset>

        </div><!-- #/wizard -->
        <form/>
        @endsection
        @section('scripts')
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "fieldset",
                        transitionEffect: "slideLeft",
                        labels:
                            {
                                next: "Next",
                                previous: "Previous",
                                finish: "Submit",
                                loading: "Loading ...",
                            },
                        onFinished: function (event, currentIndex) {
                            event.preventDefault();
                            var form = document.getElementById("user-register-form");
                            form.submit();
                        }
                    });
                    $('.dob-datepicker').datepicker(
                        {
                            maxDate: '0',
                            dateFormat: 'yy-mm-dd'
                        }
                    );
                });

                function jsPreviewUploadedImage(img_data, img_preview_id) {
                    let file = img_data.files[0];
                    let file_type = file.type;
                    let ext_list = ["image/jpeg", "image/png", "image/jpg"];
                    if (!((file_type == ext_list[0]) || (file_type == ext_list[1]) || (file_type == ext_list[2]))) {
                        alert('File must be jpeg/jpg/png !');
                        $('#' + img_preview_id).attr('src', '');
                    } else {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            $('#' + img_preview_id).attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }// end -:- jsPreviewUploadedImage()
            </script>
@endsection
@section('plugins')
    @include('partials.common.image-modal-upload-crop-detect')
@endsection
