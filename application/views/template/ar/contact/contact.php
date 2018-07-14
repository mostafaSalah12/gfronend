<!-- Divider: Contact -->
<section class="divider">
      <div class="container pt-0">
        <div class="row mb-60 bg-deep">
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center pt-60 pb-60">
              <i class="fa fa-phone font-36 mb-10 text-theme-colored"></i>
              <h4>اتصل بنا</h4>
              <h6 class="text-gray">19927</h6>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center  pt-60 pb-60 border-left">
              <i class="fa fa-map-marker font-36 mb-10 text-theme-colored"></i>
              <h4>العنوان</h4>
              <h6 class="text-gray">قطعة ١٨ و ١٩ تقسيم المروحة - القطامية - مدينة نصر - محافظة القاهرة</h6>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center  pt-60 pb-60">
              <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
              <h4>البريد الإلكتروني</h4>
              <h6 class="text-gray">contact@geyushimotors.com</h6>
            </div>
          </div>
        </div>
        <div class="row pt-10">
          <div class="col-md-5">
          <h4 class="mt-0 mb-30 line-bottom">ابحث عن موقعنا</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3394.9613649660955!2d31.35518309046603!3d29.982362526811603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583be106184501%3A0xbf82d4e0ba1f7742!2sGeyushi+Motors!5e0!3m2!1sen!2seg!4v1524103261048" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="col-md-7">
            <h4 class="mt-0 mb-30 line-bottom">مهتم بمناقشة؟</h4>
            <!-- Contact Form -->
            <form id="contact_form" name="contact_form" class="" action="<?=base_url();?>sendMailAr" onsubmit="return validateContactForm();" method="post">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">الاسم <small>*</small></label>
                    <input id="form_name" name="form_name" class="form-control" type="text" placeholder="Enter Name">
                    <label id="form_name_error" style="color: red; display: none">هذه الخانة مطلوبة.</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_email">البريد الإلكتروني <small>*</small></label>
                    <input id="form_email" name="form_email" class="form-control email" type="email" placeholder="Enter Email">
                    <label id="form_email_error" style="color: red; display: none">هذه الخانة مطلوبة.</label>
                  </div>
                </div>
              </div>                
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">الموضوع <small>*</small></label>
                    <input id="form_subject" name="form_subject" class="form-control" type="text" placeholder="Enter Subject">
                    <label id="form_subject_error" style="color: red; display: none">هذه الخانة مطلوبة.</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_phone">رقم الموبايل</label>
                    <input id="form_phone" name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="form_name">الرسالة <small>*</small></label>
                <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                <label id="form_message_error" style="color: red; display: none">هذه الخانة مطلوبة.</label>
              </div>
              <div class="form-group">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">إرسال</button>
                <button type="reset" class="btn btn-default btn-flat btn-theme-colored">إعادة التعيين</button>
              </div>
            </form>

            <!-- Contact Form Validation-->
    <script type="text/javascript">
              function validateContactForm(){
                    var name = document.getElementById("form_name").value;
                    var email = document.getElementById("form_email").value;
                    var subject = document.getElementById("form_subject").value;
                    var phone = document.getElementById("form_phone").value;
                    var message = document.getElementById("form_message").value;
                    //stop submit the form, we will post it manually.
                    event.preventDefault();

                    if (name==null || name=="") {
                        document.getElementById("form_name_error").style.display = "block";
                        $('#form_name').addClass('error');
                    }else {
                        document.getElementById("form_name_error").style.display = "none";
                        $('#form_name').removeClass('error'); 
                    }

                    if (email==null || email==""){
                        document.getElementById("form_email_error").style.display = "block";
                        $('#form_email').addClass('error');
                    }else {
                        document.getElementById("form_email_error").style.display = "none";
                        $('#form_email').removeClass('error');
                    }

                    if (subject==null || subject=="") {
                        document.getElementById("form_subject_error").style.display = "block";
                        $('#form_subject').addClass('error');
                    } else {
                        document.getElementById("form_subject_error").style.display = "none";
                        $('#form_subject').removeClass('error');
                    }

                    if (message==null || message==""){
                        document.getElementById("form_message_error").style.display = "block";
                        $('#form_message').addClass('error');
                    } else {
                        document.getElementById("form_message_error").style.display = "none";
                        $('#form_message').removeClass('error');
                    }

                    if ( (name==null || name=="") || (email==null || email=="") || (subject==null || subject=="") || (message==null || message=="")){
                        return false;
                    }else{
                        var form_btn = $("#contact_form").find('button[type="submit"]');
                        var form_result_div = '#form-result';
                        $(form_result_div).remove();
                        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                        var form_btn_old_msg = form_btn.html();
                        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                        $("#contact_form").ajaxSubmit({
                            dataType:  'json',
                            success: function(data) {
                            if( data.status == 'true' ) {
                                $("#contact_form").find('.form-control').val('');
                            }
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn('slow');
                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                            },failed: function(data) {
                            if( data.status == 'true' ) {
                                $("#contact_form").find('.form-control').val('');
                            }
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn('slow');
                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                            }
                        });
                    }
            }
            </script>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->