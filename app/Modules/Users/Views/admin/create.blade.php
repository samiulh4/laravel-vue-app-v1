@extends('layouts.admin')
@section('styles')
    @include('partials.steps-form')
    <link href="{{ asset('assets/common/plugins/croppie-2.6.5/croppie.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/common/plugins/croppie-2.6.5/croppie.js') }}"></script>
    <script src="{{ asset('assets/common/plugins/jquery-facedetection/jquery.facedetection.min.js') }}"></script>
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
                                   onchange="imageUploadWithCroppingAndDetect(this, 'preview_picture', 'picture')"
                            />
                            @if ($errors->has('picture'))
                                <span class="text-danger fs-6">
                                                <strong>{{ $errors->first('picture') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <img src="{{ asset('assets/img/default.png') }}"
                             class="img-thumbnail" alt="Profile Picture" width="200" height="200"
                             id="preview_picture"/>
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

        <!-- Start -:- Image Upload Modal -->
        <div class="modal fade" id="image_upload_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="image_upload_modal_label" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="image_upload_modal_label">Image Uplaod Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="image_upload_modal_crop_area" class="center-block"></div>
                    </div><!-- ./modal-body -->
                    <div class="modal-footer">
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-spinner fa-pulse"></i> Please wait, Face detecting
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="imageUploadModalSaveBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -:- Image Upload Modal -->
        @endsection
        @section('scripts')
            <script type="text/javascript">
                var image_upload_modal_id = 'image_upload_modal';
                var image_upload_modal_crop_area_id = 'image_upload_modal_crop_area';
                var image_upload_modal_img_id = 'image_upload_modal_img';
                var image_upload_modal_viewport_width = 300;
                var image_upload_modal_viewport_height = 300;
                var image_upload_modal_is_required = false;
                var image_upload_modal_face_detect = false;
                var image_upload_modal_img, image_upload_modal_raw_img, image_upload_modal_preview_img_id,
                    image_upload_modal_base64_value_name,image_upload_modal_base64_id,
                    image_upload_modal_input_field;

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

                function imageUploadWithCroppingAndDetect(input, img_preview_id, base64_value_target) {
                    if (input.files && input.files[0]) {
                        var mime_type = input.files[0].type;
                        if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
                            alert('Image format is not valid. Only PNG or JPEG or JPG type images are allowed !');
                            return false;
                        }
                        // Configure dynamic data
                        image_upload_modal_input_field = input;
                        image_upload_modal_preview_img_id = img_preview_id;
                        image_upload_modal_base64_value_name = base64_value_target;
                        image_upload_modal_base64_id = image_upload_modal_input_field.id;
                        console.log(input);
                        // Configure viewport height, width from input
                        if (input.getAttribute('size')) {
                            var viewport_size = input.getAttribute('size').split('x');
                            image_upload_modal_viewport_width = parseInt(viewport_size[0]);
                            image_upload_modal_viewport_height = parseInt(viewport_size[1]);
                        }
                        // enable face detect
                        image_upload_modal_face_detect = true;
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            // Show modal
                            $('#' + image_upload_modal_id).modal('show');
                            // Create image element to face detect
                            document.getElementById(image_upload_modal_crop_area_id).innerHTML = "";
                            var img_elem = document.createElement("img");
                            img_elem.id = image_upload_modal_img_id;
                            img_elem.style.height = '100%';
                            img_elem.style.width = '100%';
                            img_elem.src = e.target.result;
                            document.getElementById(image_upload_modal_crop_area_id).appendChild(img_elem);
                            // End Create image element to face detect

                            // re-set upload cropping area
                            image_upload_modal_img = $('#' + image_upload_modal_img_id);
                            //console.log(image_upload_modal_img);
                            // Set raw image to use later
                            image_upload_modal_raw_img = e.target.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        alert('Uploaded input file not correct, please upload again !');
                    }
                }// end -:- imageUploadWithCroppingAndDetect()
                $('#' + image_upload_modal_id).on('shown.bs.modal', function (e) {
                    // If already croppie initiated, then destroy it
                    if (image_upload_modal_img.data('croppie')) {
                        image_upload_modal_img.croppie('destroy');
                    }
                    // Set viewport height, width for cropping
                    document.getElementById(image_upload_modal_crop_area_id).style.width = (image_upload_modal_viewport_width + 50) + "px";
                    document.getElementById(image_upload_modal_crop_area_id).style.height = (image_upload_modal_viewport_height + 50) + "px";
                    if (image_upload_modal_face_detect) {
                        setTimeout(function () {
                            image_upload_modal_img.faceDetection({
                                complete: function (faces) {
                                    if (faces.length > 0) {
                                        //console.log(image_upload_modal_img);
                                        image_upload_modal_img.croppie({
                                            viewport: {
                                                width: image_upload_modal_viewport_width,
                                                height: image_upload_modal_viewport_height,
                                                type: 'square'
                                            },
                                            enforceBoundary: true, // Restricts zoom so image cannot be smaller than viewport
                                            enableResize: false, // Enable or disable support for resizing the viewport area
                                        });
                                        console.log('faceDetection.complete');
                                    } else {
                                        alert('Given image is not valid , (Can\'t recognize any face) !');
                                        document.getElementById(image_upload_modal_img_id).remove();
                                        $('#' + image_upload_modal_id).modal('hide');
                                    }
                                }
                            });
                        }, 3000);
                    } else {
                        image_upload_modal_img.croppie({
                            viewport: {
                                width: image_upload_modal_viewport_height,
                                height: image_upload_modal_viewport_height,
                                type: 'square'
                            },
                            enforceBoundary: true, // Restricts zoom so image cannot be smaller than viewport
                            enableResize: false, // Enable or disable support for resizing the viewport area
                        });
                        // Bind raw image to croppie
                        image_upload_modal_img.croppie('bind', {
                            url: image_upload_modal_raw_img
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });
                    }
                });// end -:- Image Modal Show Event
                $('#imageUploadModalSaveBtn').on('click', function (ev) {
                    image_upload_modal_img.croppie('result', {
                        type: 'base64',
                        format: 'jpeg',
                        size: {
                            width: image_upload_modal_viewport_width,
                            height: image_upload_modal_viewport_height
                        }
                    }).then(function (response) {
                        document.getElementById(image_upload_modal_preview_img_id).setAttribute('src', response);
                        document.getElementById(image_upload_modal_base64_id).value = response;
                        document.getElementById(image_upload_modal_base64_id.id).setAttribute('disabled', true);
                        // Create reset button
                        var preview_parent_div = document.getElementById(image_upload_modal_preview_img_id).parentNode.parentNode;
                        var btn_elem = document.createElement("button");
                        btn_elem.type = 'button';
                        btn_elem.id = 'reset_image_'.concat(image_upload_modal_base64_id.id);
                        btn_elem.innerHTML = 'Reset image';
                        btn_elem.className = 'btn btn-warning btn-xs';
                        btn_elem.value = [image_upload_modal_base64_id.id, image_upload_modal_base64_id, image_upload_modal_preview_img_id];
                        btn_elem.onclick = function () {
                            //resetImage(btn_elem.value, this);
                        };
                        preview_parent_div.parentNode.insertBefore(btn_elem, preview_parent_div.nextSibling);
                        // End Create reset button

                        $('#' + image_upload_modal_id).modal('hide');
                    });
                    image_upload_modal_img.croppie('destroy');
                });
            </script>
@endsection
