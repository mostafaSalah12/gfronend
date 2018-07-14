<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <ul class="nav nav-tabs" style="background: #fff">
              <li class="active"><a href="#login-tab" data-toggle="tab">Login</a></li>
              <li><a href="#register-tab" data-toggle="tab">Register</a></li>
            </ul>
            <div class="tab-content" style="background: #fff">
              <div class="tab-pane fade in active p-15" id="login-tab">
                <h4 class="text-gray mt-0 pt-5"> Login</h4>
                <hr>
                <form id="login-form" name="login-form" class="clearfix" action="<?=base_url();?>signin" method="post" onsubmit="return validateLogInData();">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_login_email">Email</label>
                      <input id="form_login_email" name="form_login_email" class="form-control" type="text">
                      <label id="form_login_email_error" style="color: red; display: none">This field is required.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_login_password">Password</label>
                      <input id="form_login_password" name="form_login_password" class="form-control" type="password">
                      <label id="form_login_password_error" style="color: red; display: none">This field is required.</label>
                    </div>
                  </div>
                  <!--<div class="clear pull-left pt-10">
                    <a class="text-theme-colored font-weight-600 font-12" href="#">Forgot Your Password?</a>
                  </div>-->
                  <div class="form-group pull-right mt-10">
                    <input name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-dark btn-sm" data-loading-text="Please wait...">Login</button>
                  </div>
                  <div class="clear text-center pt-10">
                    
                  </div>
                  <!--<div class="clear text-center pt-30">
                    <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15 facebook-login" href="#" data-bg-color="#3b5998">Login with facebook</a>
                    <a class="btn btn-dark btn-lg btn-block no-border google-login" href="#" data-bg-color="#00acee">Login with google</a>
                  </div>-->
                </form>
              </div>
              <div class="tab-pane fade in p-15" id="register-tab">
                <form id="reg-form" name="reg-form" class="register-form" method="post" action="<?=base_url();?>register" onsubmit="return validateSignUpData();">
                  <div class="icon-box mb-0 p-0">
                    <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                      <i class="pe-7s-users"></i>
                    </a>
                    <h4 class="text-gray pt-10 mt-0 mb-30">Don't have an Account? Register Now.</h4>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>First Name</label>
                      <input id="form_register_first_name" name="form_register_first_name" maxlength="20" class="form-control" type="text">
                      <label id="form_register_first_name_error" style="color: red; display: none">This field is required.</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Last Name</label>
                      <input id="form_register_last_name" name="form_register_last_name" maxlength="20" class="form-control" type="text">
                      <label id="form_register_last_name_error" style="color: red; display: none">This field is required.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label>Mobile Number</label>
                      <input id="form_register_mobile_number" name="form_register_mobile_number" class="form-control" type="text">
                      <label id="form_register_mobile_error" style="color: red; display: none">This field is required.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label>Email Address</label>
                      <input id="form_register_email" name="form_register_email" class="form-control" type="email">
                      <label id="form_register_email_error" style="color: red; display: none">This field is required.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="form_register_password">Create Password</label>
                      <input id="form_register_password" name="form_choose_password" maxlength="100" class="form-control" type="password">
                      <label id="form_register_password_error" style="color: red; display: none">This field is required.</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Confirm Password</label>
                      <input id="form_register_re_enter_password" name="form_re_enter_password" maxlength="100" class="form-control" type="password">
                      <label id="form_register_re_enter_password_error" style="color: red; display: none">This field is required.</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-dark btn-lg btn-block mt-15" type="submit" data-loading-text="Please wait...">Register Now</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        function validateLogInData(){
            var email = document.getElementById("form_login_email").value;
            var password = document.getElementById("form_login_password").value;
            //stop submit the form, we will post it manually.
            event.preventDefault();
            if (email==null || email==""){
                document.getElementById("form_login_email_error").style.display = "block";
            } else {
              document.getElementById("form_login_email_error").style.display = "none";
            }
            if (password==null || password==""){
                document.getElementById("form_login_password_error").style.display = "block";
            } else {
              document.getElementById("form_login_password_error").style.display = "none";
            }


            if ((email==null || email=="") || (password==null || password=="")){
                return false;
            } else {
                document.getElementById("form_login_email_error").style.display = "none";
                document.getElementById("form_login_password_error").style.display = "none";
                var form_btn = $("#login-form").find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                $("#login-form").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#login-form").ajaxSubmit({
                  dataType: "json",
                success: function(data) {
                    if( data.status == 'true' ) {
                      $("#login-form").find('.form-control').val('');
                      $("#form-result").removeClass('alert-danger');
                      $("#form-result").addClass('alert-success');
                      window.location.replace("<?= base_url(); ?>my-profile");
                    }else{
                      $("#form-result").removeClass('alert-success');
                      $("#form-result").addClass('alert-danger');
                    }
                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                    $(form_result_div).html(data.message).fadeIn('slow');
                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                }, 
                error: function(XMLHttpRequest, textStatus, errorThrown){
                  $("#form-result").removeClass('alert-success');
                  $("#form-result").addClass('alert-danger');
                  form_btn.prop('disabled', false).html(form_btn_old_msg);
                  $(form_result_div).html(textStatus+"\n"+errorThrown).fadeIn('slow');
                  setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                  console.warn(XMLHttpRequest.responseText);
                }
                });
            }
        }
        function validateSignUpData(){
          var fName = document.getElementById("form_register_first_name").value;
          var lName = document.getElementById("form_register_last_name").value;
          var mobile = document.getElementById("form_register_mobile_number").value;
          var email = document.getElementById("form_register_email").value;
          var password = document.getElementById("form_register_password").value;
          var cPassword = document.getElementById("form_register_re_enter_password").value;
          //stop submit the form, we will post it manually.
          event.preventDefault();

          if (fName == null || fName.replace(/\s+/g,'') == ""){
            document.getElementById("form_register_first_name_error").style.display = "block";
            document.getElementById('form_register_first_name_error').innerHTML = 'This field is required.';
          } else if (fName.length < 2 || fName.length > 20) {
            document.getElementById("form_register_first_name_error").style.display = "block";
            document.getElementById('form_register_first_name_error').innerHTML = 'First Name must be 2–20 characters long.';
          } else if (!validateUsername(fName)) {
            document.getElementById("form_register_first_name_error").style.display = "block";
            document.getElementById('form_register_first_name_error').innerHTML = 'Special characters are not allowed. Please try again.';
          } else if (lName == null || lName.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";

            document.getElementById("form_register_last_name_error").style.display = "block";
            document.getElementById('form_register_last_name_error').innerHTML = 'This field is required.';
          }  else if (lName.length < 2 || lName.length > 20) {
            document.getElementById("form_register_first_name_error").style.display = "none";

            document.getElementById("form_register_last_name_error").style.display = "block";
            document.getElementById('form_register_last_name_error').innerHTML = 'Last Name must be 2–20 characters long.';
          } else if (!validateUsername(lName)) {
            document.getElementById("form_register_first_name_error").style.display = "none";

            document.getElementById("form_register_last_name_error").style.display = "block";
            document.getElementById('form_register_last_name_error').innerHTML = 'Special characters are not allowed. Please try again.';
          } else if (mobile == null || mobile.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";

            document.getElementById("form_register_mobile_error").style.display = "block";
            document.getElementById('form_register_mobile_error').innerHTML = 'This field is required.';
          } else if (mobile.length != 11) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";

            document.getElementById("form_register_mobile_error").style.display = "block";
            document.getElementById('form_register_mobile_error').innerHTML = 'Mobile Number must be 11 characters long.';
          } else if (email == null || email.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";

            document.getElementById("form_register_email_error").style.display = "block";
            document.getElementById('form_register_email_error').innerHTML = 'This field is required.';
          } else if (!validateEmail(email)) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";

            document.getElementById("form_register_email_error").style.display = "block";
            document.getElementById('form_register_email_error').innerHTML = 'Invalid email address. Please make sure your email address is correct.';
          } else if (password==null || password.replace(/\s+/g,'')=="") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";

            document.getElementById("form_register_password_error").style.display = "block";
            document.getElementById('form_register_password_error').innerHTML = 'This field is required.';
          } else if (password.length < 6) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";

            document.getElementById("form_register_password_error").style.display = "block";
            document.getElementById('form_register_password_error').innerHTML = 'Your password must be at least 6 characters long.';
          } else if (password.includes(" ") || !validateUsername(password)) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";

            document.getElementById("form_register_password_error").style.display = "block";
            document.getElementById('form_register_password_error').innerHTML = 'Only alphanumeric characters (A-z, 0-9) are allowed. Please try again.';
          } else if (cPassword == null || cPassword.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";
            document.getElementById("form_register_password_error").style.display = "none";


            document.getElementById("form_register_re_enter_password_error").style.display = "block";
            document.getElementById('form_register_re_enter_password_error').innerHTML = 'This field is required.';
          } else if (password != cPassword) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";
            document.getElementById("form_register_password_error").style.display = "none";

            document.getElementById("form_register_re_enter_password_error").style.display = "block";
            document.getElementById('form_register_re_enter_password_error').innerHTML = 'Passwords do not match. Please make sure both passwords are identical.';
          } else {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_mobile_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";
            document.getElementById("form_register_password_error").style.display = "none";
            document.getElementById("form_register_re_enter_password_error").style.display = "none";
            var form_btn = $("#reg-form").find('button[type="submit"]');
            var form_result_div = '#form-result';
            $(form_result_div).remove();
            $("#reg-form").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
            var form_btn_old_msg = form_btn.html();
            form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
            $("#reg-form").ajaxSubmit({
              dataType: "json",
            success: function(data) {
                if( data.status == 'true' ) {
                  $("#reg-form").find('.form-control').val('');
                  $("#form-result").removeClass('alert-danger');
                  $("#form-result").addClass('alert-success');
                  window.location.replace("<?= base_url(); ?>my-profile");
                }else{
                  $("#form-result").removeClass('alert-success');
                  $("#form-result").addClass('alert-danger');
                }
                form_btn.prop('disabled', false).html(form_btn_old_msg);
                $(form_result_div).html(data.message).fadeIn('slow');
                setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
            }, 
            error: function(XMLHttpRequest, textStatus, errorThrown){
              $("#form-result").removeClass('alert-success');
              $("#form-result").addClass('alert-danger');
              form_btn.prop('disabled', false).html(form_btn_old_msg);
              $(form_result_div).html(textStatus+"\n"+errorThrown).fadeIn('slow');
              setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
              console.warn(XMLHttpRequest.responseText);
            }
            });
          }
        }
        function validateEmail(email) {
          email.replace(/\s+/g,'');
          return String(email).match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        }
        function validateUsername(username){
          username.replace(/\s+/g,'');
          return String(username).match(/^([A-Za-z0-9- ]+)*$/);
        }
    </script>
    </section>

    