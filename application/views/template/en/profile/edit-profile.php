<?php
    $user_info = $this->session->userdata('user_info');
?>
<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="tab-content" style="padding: 0px;">
                <ul class="nav nav-tabs" style="background: #fff">
                <li class="active"><a href="#edit-tab" data-toggle="tab">User Profile</a></li>
                <li><a href="#change-tab" data-toggle="tab">Change Password</a></li>
                </ul>
            <div class="tab-content" style="background: #fff">
                    <div class="tab-pane active fade in p-15" id="edit-tab">
                        <h4 class="text-gray mt-0 pt-5"> Edit user profile</h4>  
                        <hr>
                        <!-- Edit Profile Form Start-->
                        <form id="edit_profile" name="edit_profile" class="reservation-form" method="post" enctype="multipart/form-data" onsubmit="return validateEditProfile();" action="<?=base_url().'my-profile/edit-profile/edit';?>">
                            <div class="row">
                                <div class="reservation-first-step">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-30">
                                            <label>Profile Picture</label>
                                            <input type="file" id="profilePic" name="profilePic">
                                            <label id="profile_picture_error" style="display: none;"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label>First Name</label>
                                            <input type="text" id="firstName" name="firstName" value="<?= $user_info->user->firstName; ?>" class="form-control">
                                            <label id="first_name_error" style="display: none;"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label>Last Name</label>
                                            <input type="text" id="lastName" name="lastName" value="<?= $user_info->user->lastName; ?>" class="form-control">
                                            <label id="last_name_error" style="display: none;"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="mobile">Mobile Number</label>
                                        <input id="mobile" name="mobile" class="form-control" value="<?= $user_info->user->mobile; ?>" type="text">
                                        <label id="mobile_error" style="color: red; display: none"></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" class="form-control" value="<?= $user_info->user->email; ?>" type="text">
                                        <input id="userLanguage" name="userLanguage" type="hidden" value="EN"/>
                                        <label id="email_error" style="color: red; display: none"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center mb-0 mt-20">
                                        <input name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="Please wait...">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Edit Profile Form End-->
                    </div>
                    <div class="tab-pane fade in p-15" id="change-tab">
                        <h4 class="text-gray mt-0 pt-5">Change Password</h4>
                        <hr>
                        <!-- Edit Profile Form Start-->
                        <form id="change_password" name="change_password" class="reservation-form" method="post" enctype="multipart/form-data" onsubmit="return validateChangePassword();" action="<?=base_url().'my-profile/edit-profile/change-password';?>">
                            <div class="row">
                                <div class="reservation-first-step">
                                    
                                    <div class="form-group col-md-12">
                                        <label for="current_password">Current Password</label>
                                        <input id="current_password" name="current_password" class="form-control" plaseholder="Enter your current password" type="password">
                                        <label id="current_password_error" style="color: red; display: none"></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="new_password">New Password</label>
                                        <input id="new_password" name="new_password" class="form-control" plaseholder="Enter your new password" type="password">
                                        <label id="new_password_error" style="color: red; display: none"></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input id="confirm_password" name="confirm_password" class="form-control" plaseholder="Confirm your password" type="password">
                                        <label id="confirm_password_error" style="color: red; display: none"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center mb-0 mt-20">
                                        <input name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="Please wait...">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Edit Profile Form End-->

                    </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        function validateEditProfile(){
            var firstName = document.getElementById("firstName").value;
            var lastName = document.getElementById("lastName").value;
            //stop submit the form, we will post it manually.
            event.preventDefault();
            if (firstName == null || lastName == null) {
                //todo
            } else {
                var form_btn = $("#edit_profile").find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                $("#edit_profile").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#edit_profile").ajaxSubmit({
                dataType: "json",
                success: function(data) {
                    if( data.status == 'true' ) {
                    $("#edit_profile").find('.form-control').val('');
                    $("#form-result").removeClass('alert-danger');
                    $("#form-result").addClass('alert-success');
                    window.location.replace("<?= base_url(); ?>my-profile");
                    }else{
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


        function validateChangePassword(){
            var currentPassword = document.getElementById("current_password").value;
            var newPassword = document.getElementById("new_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            //stop submit the form, we will post it manually.
            event.preventDefault();
            if (currentPassword==null || currentPassword.replace(/\s+/g,'')=="") {
                document.getElementById("current_password_error").style.display = "block";
                document.getElementById('current_password_error').innerHTML = 'This field is required.';
            } else if (currentPassword.includes(" ") || !validateUsername(currentPassword)) {
                document.getElementById("current_password_error").style.display = "block";
                document.getElementById('current_password_error').innerHTML = 'Only alphanumeric characters (A-z, 0-9) are allowed. Please try again.';
            } else if (newPassword == null || newPassword.replace(/\s+/g,'') == "") {
                document.getElementById("current_password_error").style.display = "none";

                document.getElementById("new_password_error").style.display = "block";
                document.getElementById('new_password_error').innerHTML = 'This field is required.';
            } else if (newPassword.length < 6) {
                document.getElementById("current_password_error").style.display = "none";

                document.getElementById("new_password_error").style.display = "block";
                document.getElementById('new_password_error').innerHTML = 'Your new password must be at least 6 characters long.';
            } else if (newPassword.includes(" ") || !validateUsername(newPassword)) {
                document.getElementById("current_password_error").style.display = "none";

                document.getElementById("new_password_error").style.display = "block";
                document.getElementById('new_password_error').innerHTML = 'Only alphanumeric characters (A-z, 0-9) are allowed. Please try again.';
            } else if (confirmPassword == null || confirmPassword.replace(/\s+/g,'') == "") {
                document.getElementById("current_password_error").style.display = "none";
                document.getElementById("new_password_error").style.display = "none";

                document.getElementById("confirm_password_error").style.display = "block";
                document.getElementById('confirm_password_error').innerHTML = 'This field is required.';
            } else if (newPassword != confirmPassword) {
                document.getElementById("current_password_error").style.display = "none";
                document.getElementById("new_password_error").style.display = "none";

                document.getElementById("confirm_password_error").style.display = "block";
                document.getElementById('confirm_password_error').innerHTML = 'Passwords do not match. Please make sure both passwords are identical.';
            } else {
                var form_btn = $("#change_password").find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                $("#change_password").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#change_password").ajaxSubmit({
                dataType: "json",
                success: function(data) {
                    if( data.status == 'true' ) {
                        $("#change_password").find('.form-control').val('');
                        $("#form-result").removeClass('alert-danger');
                        $("#form-result").addClass('alert-success');
                    }else{
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

        function validateUsername(username){
          username.replace(/\s+/g,'');
          return String(username).match(/^([A-Za-z0-9- ]+)*$/);
        }
    </script>
</section>    