<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <ul class="nav nav-tabs" style="background: #fff">
              <li class="active"><a href="#login-tab" data-toggle="tab" style="margin-right: 0px;margin-left: -2px;">تسجيل الدخول</a></li>
              <li><a href="#register-tab" data-toggle="tab" style="margin-right: 0px;margin-left: -2px;">إنشاء حساب جديد</a></li>
            </ul>
            <div class="tab-content" style="background: #fff">
              <div class="tab-pane fade in active p-15" id="login-tab">
                <h4 class="text-gray mt-0 pt-5" style="text-align: right;"> تسجيل الدخول</h4>
                <hr>
                <form id="login-form" name="login-form" class="clearfix" action="<?=base_url();?>ar/signin" method="post" onsubmit="return validateLogInData();">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_login_email" class="pull-right">البريد الإلكتروني</label>
                      <input id="form_login_email" name="form_login_email" class="form-control" type="text">
                      <label id="form_login_email_error" style="color: red; display: none;text-align: right;">هذه الخانة مطلوبة.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_login_password" class="pull-right">كلمة السر</label>
                      <input id="form_login_password" name="form_login_password" class="form-control" type="password">
                      <label id="form_login_password_error" style="color: red; display: none;text-align: right;">هذه الخانة مطلوبة.</label>
                    </div>
                  </div>
                  <!--<div class="clear pull-right pt-10">
                    <a class="text-theme-colored font-weight-600 font-12" href="#">نسيت كلمة السر؟</a>
                  </div>-->
                  <div class="form-group pull-left mt-10">
                    <input name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-dark btn-sm" data-loading-text="أرجو الإنتظار...">تسجيل الدخول</button>
                  </div>
                  <div class="clear text-center pt-10">
                    
                  </div>
                  <!--<div class="clear text-center pt-30">
                    <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15 facebook-login" href="#" data-bg-color="#3b5998">تسجيل الدخول باستخدام الفيسبوك</a>
                    <a class="btn btn-dark btn-lg btn-block no-border google-login" href="#" data-bg-color="#00acee">تسجيل الدخول باستخدام جوجل</a>
                  </div>-->
                </form>
              </div>
              <div class="tab-pane fade in p-15" id="register-tab">
                <form id="reg-form" name="reg-form" class="register-form" method="post" action="<?=base_url();?>ar/register" onsubmit="return validateSignUpData();">
                  <div class="icon-box mb-0 p-0">
                    <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-right mb-0 ml-10">
                      <i class="pe-7s-users"></i>
                    </a>
                    <h4 class="text-gray pt-10 mt-0 mb-30" style="text-align: right;">مستخدم جديد؟ إنشاء حساب.</h4>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="pull-right">الاسم الأول</label>
                      <input id="form_register_first_name" name="form_register_first_name" maxlength="20" class="form-control" type="text">
                      <label id="form_register_first_name_error" style="color: red; display: none;text-align: right;">هذه الخانة مطلوبة.</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-right">اسم العائلة</label>
                      <input id="form_register_last_name" name="form_register_last_name" maxlength="20" class="form-control" type="text">
                      <label id="form_register_last_name_error" style="color: red; display: none;text-align: right;">هذه الخانة مطلوبة.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label class="pull-right">رقم الموبايل</label>
                      <input id="form_register_mobile_number" name="form_register_mobile_number" class="form-control" type="text">
                      <label id="form_register_mobile_error" style="color: red; display: none">هذه الخانة مطلوبة.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label class="pull-right">البريد الإلكتروني</label>
                      <input id="form_register_email" name="form_register_email" class="form-control" type="email">
                      <label id="form_register_email_error" style="color: red; display: none;text-align: right;">هذه الخانة مطلوبة.</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="form_register_password" class="pull-right">إنشاء كلمة السر</label>
                      <input id="form_register_password" name="form_choose_password" maxlength="100" class="form-control" type="password">
                      <label id="form_register_password_error" style="color: red; display: none;text-align: right;">هذه الخانة مطلوبة.</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="pull-right">تأكيد كلمة السر</label>
                      <input id="form_register_re_enter_password" name="form_re_enter_password" maxlength="100" class="form-control" type="password">
                      <label id="form_register_re_enter_password_error" style="color: red; display: none;text-align: right;">هذه الخانة مطلوبة.</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-dark btn-lg btn-block mt-15" type="submit" data-loading-text="أرجو الإنتظار...">إنشاء حساب</button>
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
                $("#login-form").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none; text-align: right"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#login-form").ajaxSubmit({
                  dataType: "json",
                success: function(data) {
                    if( data.status == 'true' ) {
                      $("#login-form").find('.form-control').val('');
                      $("#form-result").removeClass('alert-danger');
                      $("#form-result").addClass('alert-success');
                      window.location.replace("<?= base_url(); ?>ar/my-profile"); 
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
            document.getElementById('form_register_first_name_error').innerHTML = 'هذه الخانة مطلوبة.';
          } else if (fName.length < 2 || fName.length > 20) {
            document.getElementById("form_register_first_name_error").style.display = "block";
            document.getElementById('form_register_first_name_error').innerHTML = 'الاسم الأول يجب أن يكون 2–20 حرفًا.';
          } else if (!validateUsername(fName)) {
            document.getElementById("form_register_first_name_error").style.display = "block";
            document.getElementById('form_register_first_name_error').innerHTML = 'لا يسمح بالرموز. يرجى إعادة المحاولة.';
          } else if (lName == null || lName.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";

            document.getElementById("form_register_last_name_error").style.display = "block";
            document.getElementById('form_register_last_name_error').innerHTML = 'هذه الخانة مطلوبة.';
          }  else if (lName.length < 2 || lName.length > 20) {
            document.getElementById("form_register_first_name_error").style.display = "none";

            document.getElementById("form_register_last_name_error").style.display = "block";
            document.getElementById('form_register_last_name_error').innerHTML = 'اسم العائلة يجب أن يكون 2–20 حرفًا.';
          } else if (!validateUsername(lName)) {
            document.getElementById("form_register_first_name_error").style.display = "none";

            document.getElementById("form_register_last_name_error").style.display = "block";
            document.getElementById('form_register_last_name_error').innerHTML = 'لا يسمح بالرموز. يرجى إعادة المحاولة.';
          } else if (mobile == null || mobile.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";

            document.getElementById("form_register_mobile_error").style.display = "block";
            document.getElementById('form_register_mobile_error').innerHTML = 'هذه الخانة مطلوبة.';
          } else if (mobile.length != 11) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";

            document.getElementById("form_register_mobile_error").style.display = "block";
            document.getElementById('form_register_mobile_error').innerHTML = 'يجب أن يكون رقم الموبايل 11 حرف.';
          } else if (email == null || email.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";

            document.getElementById("form_register_email_error").style.display = "block";
            document.getElementById('form_register_email_error').innerHTML = 'هذه الخانة مطلوبة.';
          } else if (!validateEmail(email)) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";

            document.getElementById("form_register_email_error").style.display = "block";
            document.getElementById('form_register_email_error').innerHTML = 'البريد الإلكتروني غير صحيح. يرجى التأكد من البريد الإلكتروني.';
          } else if (password==null || password.replace(/\s+/g,'')=="") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";

            document.getElementById("form_register_password_error").style.display = "block";
            document.getElementById('form_register_password_error').innerHTML = 'هذه الخانة مطلوبة.';
          } else if (password.length < 6) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";

            document.getElementById("form_register_password_error").style.display = "block";
            document.getElementById('form_register_password_error').innerHTML = 'يجب أن تكون كلمة السر 6 أحرف على الأقل.';
          } else if (password.includes(" ") || !validateUsername(password)) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";

            document.getElementById("form_register_password_error").style.display = "block";
            document.getElementById('form_register_password_error').innerHTML = 'لا يسمح إلا بالأحرف الأبجدية و الأرقام، يرجى إعادة المحاولة.';
          } else if (cPassword == null || cPassword.replace(/\s+/g,'') == "") {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";
            document.getElementById("form_register_password_error").style.display = "none";


            document.getElementById("form_register_re_enter_password_error").style.display = "block";
            document.getElementById('form_register_re_enter_password_error').innerHTML = 'هذه الخانة مطلوبة.';
          } else if (password != cPassword) {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";
            document.getElementById("form_register_password_error").style.display = "none";

            document.getElementById("form_register_re_enter_password_error").style.display = "block";
            document.getElementById('form_register_re_enter_password_error').innerHTML = 'كلمات السر غير متطابقة. يرجى التأكد من تطابق كلمتَي السر.';
          } else {
            document.getElementById("form_register_first_name_error").style.display = "none";
            document.getElementById("form_register_last_name_error").style.display = "none";
            document.getElementById("form_register_email_error").style.display = "none";
            document.getElementById("form_register_password_error").style.display = "none";
            document.getElementById("form_register_re_enter_password_error").style.display = "none";
            var form_btn = $("#reg-form").find('button[type="submit"]');
            var form_result_div = '#form-result';
            $(form_result_div).remove();
            $("#reg-form").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;text-align: right"></div>');
            var form_btn_old_msg = form_btn.html();
            form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
            $("#reg-form").ajaxSubmit({
              dataType: "json",
            success: function(data) {
                if( data.status == 'true' ) {
                  $("#reg-form").find('.form-control').val('');
                  $("#form-result").removeClass('alert-danger');
                  $("#form-result").addClass('alert-success');
                  window.location.replace("<?= base_url(); ?>ar/my-profile");
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

    