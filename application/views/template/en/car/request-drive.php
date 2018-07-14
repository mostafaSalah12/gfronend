<?php
    $user_info = $this->session->userdata('user_info');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="tab-content" style="background: #fff">
                    <div class="tab-pane fade in active p-15" id="car-info-tab">
                        <form id="request_drive" name="request_drive" class="reservation-form" method="post" onsubmit="return validateRequestTestDriveForm();" action="<?=base_url();?>car-requests/request-test-drive/send-request">
                            <h4 class="text-gray mt-0 pt-5"> Request test drive</h4>
                            <hr>
                            <div class="row">
                                <div class="reservation-first-step">
                                    <div class="form-group col-md-12">
                                        <label>Full Name</label>
                                        <input type="text" id="full_name" name="full_name" value="<?php if($user_info !== null) {echo $user_info->user->firstName.' '.$user_info->user->lastName;} ?>" class="form-control">
                                        <label id="full_name_error" style="display: none;"></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="mobile">Mobile Number</label>
                                        <input id="mobile" name="mobile" class="form-control" value="<?php if($user_info !== null) {echo $user_info->user->mobile;} ?>" type="text">
                                        <label id="mobile_error" style="color: red; display: none"></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email">Email Address</label>
                                        <input id="email" name="email" class="form-control" value="<?php if($user_info !== null) { echo $user_info->user->email;} ?>" type="text">
                                        <label id="email_error" style="color: red; display: none"></label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Additional Notes</label>
                                        <div class="form-group">
                                            <textarea rows="5" class="form-control" name="form_notes" id="form_notes" aria-required="true"></textarea>
                                        </div>
                                        <label id="form_notes_error" style="display: none; color: red;"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center mb-0 mt-20">
                                    <input name="form_botcheck" class="form-control" type="hidden" value="">
                                    <input name="car_id" class="form-control" type="hidden" value="<?=$carId;?>">
                                    <input name="car_name_en" class="form-control" type="hidden" value="<?=$carNameEn;?>">
                                    <input name="car_name_ar" class="form-control" type="hidden" value="<?=$carNameAr;?>">
                                    <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="Please wait...">Send Request</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function validateRequestTestDriveForm(){
            var fullName = document.getElementById("full_name").value;
            var mobile = document.getElementById("mobile").value;
            var email = document.getElementById("email").value;

            //stop submit the form, we will post it manually.
            event.preventDefault();

            if(fullName == null || fullName == ""){
                document.getElementById("full_name_error").style.display = "block";
                document.getElementById('full_name_error').innerHTML = 'This field is required.';
            } else if (fullName.length < 4) {
                document.getElementById("email_error").style.display = "block";
                document.getElementById('email_error').innerHTML = 'Full Name must be 4 or more characters long.';
            } else if (mobile == null || mobile == "") {
                document.getElementById("full_name_error").style.display = "none";

                document.getElementById("mobile_error").style.display = "block";
                document.getElementById('mobile_error').innerHTML = 'This field is required.';
            } else if (mobile.length != 11) {
                document.getElementById("full_name_error").style.display = "none";
                document.getElementById("email_error").style.display = "none";
                
                document.getElementById("mobile_error").style.display = "block";
                document.getElementById('mobile_error').innerHTML = 'Mobile Number must be 11 characters long.';
            } else if (email == null || email == "") {
                document.getElementById("full_name_error").style.display = "none";
                document.getElementById("mobile_error").style.display = "none";

                document.getElementById("email_error").style.display = "block";
                document.getElementById('email_error').innerHTML = 'This field is required.';
            } else {
                document.getElementById("full_name_error").style.display = "none";
                document.getElementById("mobile_error").style.display = "none";
                document.getElementById("email_error").style.display = "none";
                var form_btn = $("#request_drive").find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                $("#request_drive").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#request_drive").ajaxSubmit({
                dataType: "json",
                success: function(data) {
                    if ( data.status == 'true' ) {
                        $("#form-result").removeClass('alert-danger');
                        $("#form-result").addClass('alert-success');
                    } else {
                        $("#form-result").removeClass('alert-success');
                        $("#form-result").addClass('alert-danger');
                    }
                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                    $(form_result_div).html(data.message).fadeIn('slow');
                }, 
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                        $("#form-result").removeClass('alert-success');
                        $("#form-result").addClass('alert-danger');
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(textStatus+"\n"+errorThrown).fadeIn('slow');
                        console.warn(XMLHttpRequest.responseText);
                    }
                });
            }

        }
    </script>
</section>
