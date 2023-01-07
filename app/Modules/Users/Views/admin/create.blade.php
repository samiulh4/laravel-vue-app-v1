@extends('layouts.admin')
@section('styles')
    @include('partials.steps-form')
    <style>
        /*select.error {*/
        /*    border: 1px solid #CC0000*/
        /*}*/
        select.form-control.error {
            background: rgb(251, 227, 228);
            border: 1px solid #fbc2c4;
            color: #8a1f11;
        }
    </style>
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
    <form id="user-create-edit-step-form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}

        <div id="wizard">

            <!-- start -:- Basic Information -->
            <h2>Basic Information</h2>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <span class="text-danger errorMessage"><strong></strong></span>
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="text-danger errorMessage"><strong></strong></span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="name" class="input-group-text"><strong>Name</strong></label>
                            </div>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="Enter Full Name"/>
                            @if ($errors->has('name'))
                                <span class="text-danger fs-6 errorMessage"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <span class="text-danger errorMessage"></span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="email" class="input-group-text"><strong>E-Mail</strong></label>
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
                                   class="form-control dob-datepicker" placeholder=""/>
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
                    <div class="col-md-6 mt-4">
                        <span class="text-danger errorMessage"><strong></strong></span>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="password" class="input-group-text"><strong>Password</strong></label>
                            </div>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Enter Password"/>
                            @if ($errors->has('passport_no'))
                                <span class="text-danger fs-6">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Confirm Password</strong></label>
                            </div>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                   placeholder="Enter Confirm Password"/>
                            @if ($errors->has('passport_no'))
                                <span class="text-danger fs-6">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                </div><!-- ./row -->
            </fieldset>
            <!-- end -:- Basic Information -->

            <!-- start -:- General Information -->
            <h2>General Information</h2>
            <fieldset>
                <div class="row">

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Country</strong></label>
                            </div>
                            <select name="country_code" id="country_code" class="form-select">
                                <option value="">--Select Country--</option>
                                <option value="BD">Bangladesh</option>
                                <option value="PK">Pakistan</option>
                                <option value="IN">India</option>
                            </select>
                            @if ($errors->has('country_code'))
                                <span class="text-danger"><strong>{{ $errors->first('country_code') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><strong>Address</strong></label>
                            </div>
                            <textarea class="form-control" id="address" rows="3"></textarea>
                            @if ($errors->has('passport_no'))
                                <span class="text-danger fs-6">
                            <strong>{{ $errors->first('passport_no') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>


                </div>
            </fieldset>
            <!-- end -:- General Information -->


            <h2>Upload Information</h2>
            <fieldset>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" name="picture" id="picture"
                                   onchange="imageUploadWithCroppingAndDetect(this, 'preview_picture', 'user_pic_base64')"/>
                            @if ($errors->has('picture'))
                                <span class="text-danger fs-6">
                            <strong>{{ $errors->first('picture') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <figure>
                            <img src="{{ asset('assets/img/default.png') }}" class="img-thumbnail" alt="Profile Picture"
                                 width="200" height="200" id="preview_picture"/>
                        </figure>
                        <input type="hidden" id="user_pic_base64" name="user_pic_base64"/>
                    </div>
                </div>
            </fieldset>

            <!-- Work & Education -->
            <h2>Work & Education</h2>
            <fieldset>
                <div class="row">
                    <h3>User Educational Information</h3>
                    <table class="table" id="user_education_info">
                        <thead>
                        <th>Tile</th>
                        <th>Result</th>
                        <th>Institution</th>
                        <th>
                            <butto class="btn btn-sm btn-secondary" id="add_row">+</butto>
                        </th>
                        </thead>
                        <tbody>
                        <tr id='addr0' date-id="0">
                            <td data-name="education_title[]"><input type="text" class="form-control"
                                                                     name="education_title"/></td>
                            <td data-name="education_result[]"><input type="text" class="form-control"
                                                                      name="education_result"/></td>
                            <td data-name="education_institution[]"><input type="text" class="form-control"
                                                                           name="education_institution"/></td>
                            <td data-name="del">
                                <button type="button" class="btn btn-sm btn-danger row-remove">-</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>


                </div>
            </fieldset>
            <!-- Work & Education -->

        </div><!-- #/wizard -->
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('assets/common/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/common/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script type="text/javascript">
        var formName = '#user-create-edit-step-form';
        var formEl = $(formName);
        var formData = new FormData(document.querySelector(formName));

        //var formTag = document.getElementById('user-create-edit-step-form');
        var error = $('.errorMessage', formEl);




        $(document).ready(function () {
            formEl.validate({
                errorPlacement: function(error, element) {
                    // if(element.attr("name") === "name") {
                    //     error.appendTo(".errorMessage");
                    // }
                    $(element).parent().siblings('.errorMessage').html(error);
                },
                rules:{
                    user_type_id: {
                        required: true,
                    },
                    name : "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },messages:{
                    user_type_id : "Please enter user type !",
                    name : "Please enter name !",
                    email : "Please enter email !",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                },invalidHandler: function(form, validator) {
                    //error.show();
                    //var errors = validator.numberOfInvalids();
                },submitHandler:function(form){
                    //alert('Sumit');
                }
            });
            $("#wizard").steps({
                headerTag: "h2",
                bodyTag: "fieldset",
                transitionEffect: "slideLeft",
                labels: {
                    next: "Next",
                    previous: "Previous",
                    finish: "Submit",
                    loading: "Loading ...",
                },
                onStepChanging: function (event, currentIndex, newIndex){
                    formEl.validate().settings.ignore = ":disabled,:hidden";
                    return formEl.valid();
                },
                onStepChanged: function(event, currentIndex, newIndex) {

                },
                onFinished: function (event, currentIndex) {
                    event.preventDefault();
                    /*formEl.validate().settings.ignore = ":disabled,:hidden";
                    if(formTag.valid() == false){
                        return false;
                    }*/
                    if (confirm("Are you sure ?")) {
                        var formData = new FormData(document.querySelector('#user-create-edit-step-form'));
                        submitUserStoreOrUpdateStepForm(formData);
                    } else {
                        return false;
                    }
                }
            }); // end -:- Step Form
            $('.dob-datepicker').datepicker({
                maxDate: '0',
                dateFormat: 'yy-mm-dd'
            });
            $('#user-create-edit-step-form').validate({
                rules: {
                    field: {
                        required: true,
                        step: 1
                    }
                }
            });

            $("#add_row").on("click", function (e) {
                e.preventDefault();
                let newid = 0;
                $.each($("#user_education_info tr"), function () {
                    if (parseInt($(this).data("id")) > newid) {
                        newid = parseInt($(this).data("id"));
                    }
                });
                newid++;
                let tr = $("<tr></tr>", {
                    id: "addr" + newid,
                    "data-id": newid
                });
                $.each($("#user_education_info tbody tr:nth(0) td"), function () {
                    let td;
                    let cur_td = $(this);
                    let children = cur_td.children();
                    if ($(this).data("name") !== undefined) {
                        td = $("<td></td>", {"data-name": $(cur_td).data("name")});
                        let c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                        c.attr("name", $(cur_td).data("name") + newid);
                        c.appendTo($(td));
                        td.appendTo($(tr));
                    } else {
                        td = $("<td></td>", {
                            'text': $('#user_education_info tr').length
                        }).appendTo($(tr));
                    }
                });
                // add the new row
                $(tr).appendTo($('#user_education_info'));
                $(tr).find("td button.row-remove").on("click", function() {
                    $(this).closest("tr").remove();
                });
            });

        });// end -:- Document Ready

        function submitUserStoreOrUpdateStepForm(formData) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.user.store') }}",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {

                },
                success: function (response) {
                    if(response.status == true)
                        console.log(response);
                },
                error: function (response) {
                    alert('Error is occored !');
                    console.log(response);
                },
                complete: function () {

                }
            }); // end -:- Ajax
        } // end -:- submitUserStoreOrUpdateStepForm()
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
        } // end -:- jsPreviewUploadedImage()
        function isValidPhoneDigits(val) {
            var intRegex = /^\d+$/;
            var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

            if(intRegex.test(val) || floatRegex.test(val)) {
                return true;
            } else {return false}

            if(intRegex.test(val) || floatRegex.test(val)) {
                return true;
            } else {return false}
        }
    </script>
@endsection
@section('plugins')
    @include('partials.common.image-modal-upload-crop-detect')
@endsection
