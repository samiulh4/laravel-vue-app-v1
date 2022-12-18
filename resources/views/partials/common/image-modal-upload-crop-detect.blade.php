<link href="{{ asset('assets/common/plugins/croppie-2.6.5/croppie.css') }}" rel="stylesheet">
<style>
/**
    Custom CSS
**/
</style>


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
                <button type="button" class="btn btn-secondary" id="imageUploadModalCloseBtn" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark" id="imageUploadModalSaveBtn">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- End -:- Image Upload Modal -->

<script src="{{ asset('assets/common/plugins/croppie-2.6.5/croppie.js') }}"></script>
<script src="{{ asset('assets/common/plugins/jquery-facedetection/jquery.facedetection.min.js') }}"></script>
<script type="text/javascript">
    var image_upload_modal_id = 'image_upload_modal';
    var image_upload_modal_crop_area_id = 'image_upload_modal_crop_area';
    var image_upload_modal_img_id = 'image_upload_modal_img';
    var image_upload_modal_viewport_width = 300;
    var image_upload_modal_viewport_height = 300;
    var image_upload_modal_is_required = false;
    var image_upload_modal_face_detect = false;
    var image_upload_modal_input_field,
        image_upload_modal_img,
        image_upload_modal_raw_img,
        image_upload_modal_preview_img_id,
        image_upload_modal_base64_target_id,
        image_upload_modal_base64_id;

    function imageUploadWithCroppingAndDetect(input, img_preview_id, base64_value_target) {
        if (input.files && input.files[0]) {
            var mime_type = input.files[0].type;
            if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
                alert('Image format is not valid. Only PNG or JPEG or JPG type images are allowed !');
                return false;
            }
            // Configure dynamic data
            image_upload_modal_input_field = input;
            image_upload_modal_preview_img_id = img_preview_id;// img tag id
            image_upload_modal_base64_target_id = base64_value_target;// file input id


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
            var s =  document.getElementById(image_upload_modal_base64_target_id).value = response;
            console.log(s);
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
