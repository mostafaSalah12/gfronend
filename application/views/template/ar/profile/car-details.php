<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <ul class="nav nav-tabs" style="background: #fff;padding-right:2px">
              <li class="active"><a href="#car-info-tab" data-toggle="tab" >معلومات السيارة</a></li>
              <li><a href="#maintenance-tab" data-toggle="tab">طلب صيانة</a></li>
            </ul>
            <div class="tab-content" style="background: #fff">
            <?php if (!isset($userCar)) {
                echo '<p>There is no car with the requesting id, please try again later.</p>';
            } else {
                ?>
                    <div class="tab-pane fade in active p-15" id="car-info-tab">
                        <h4 class="text-gray mt-0 pt-5" style="text-align: right"> معلومات السيارة</h4>
                        <hr>
                        <table class="table table-striped table-bordered tbl-shopping-cart">
                            <tbody>
                                <tr>
                                    <td style="text-align: right">ماركة السيارة</td>
                                    <td style="text-align: right"><?=$userCar->brandName; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">طراز السيارة</td>
                                    <td style="text-align: right"><?=$userCar->modelName; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">رقم الشاسيه</td>
                                    <td style="text-align: right"><?=$userCar->chaseNumber; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">الاسم المتواجد في رخصة السيارة</td>
                                    <td style="text-align: right"><?=$userCar->nameInLicenseNumber; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade in p-15" id="maintenance-tab">
                            <!-- Reservation Form Start-->
                        <form id="reservation_form" name="reservation_form" class="reservation-form" method="post" onsubmit="return validateRequestMaintenance();" action="<?=base_url();?>ar/my-profile/car-details/request-maintenance">
                            <h4 class="text-gray mt-0 pt-5" style="text-align: right"> طلب صيانة</h4>  
                            <hr>
                            <div class="row">
                                <div class="reservation-first-step">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label style="text-align: right; display: block">كيلومترات السيارة</label>
                                            <input placeholder="عدد الكيلومترات الحالي" type="number" id="car_kilometers" name="car_kilometers" class="form-control">
                                            <input type="hidden" value="<?=$userCar->userCarId; ?>" id="user_car_id" name="user_car_id">
                                            <label id="car_kilometers_error" style="display: none;color: red; text-align: right"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label style="text-align: right; display: block">نوع الخدمة</label>
                                            <div class="styled-select">
                                                <select id="car_service_select" name="car_service_select" class="form-control">
                                                    <option value="">- اختر نوع الخدمة الخاص بك -</option>
                                                    <?php 
                                                        if(isset($services)){
                                                            foreach($services as $service){
                                                                ?>
                                                                    <option value="<?= $service->serviceId; ?>"><?= $service->serviceTypeName; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <label id="car_service_select_error" style="display: none;color: red;text-align: right"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label style="text-align: right; display: block">ملاحظات إضافية</label>
                                        <div class="form-group">
                                            <textarea rows="5" class="form-control required" name="form_notes" id="form_notes" aria-required="true"></textarea>
                                        </div>
                                        <label id="form_notes_error" style="display: none; color: red;text-align: right"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center mb-0 mt-20">
                                        <input name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="برجاء الإنتظار...">إرسال الطلب</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Reservation Form End-->
                    </div>
                <?php 
            }?>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        function validateRequestMaintenance(){
          var carKilometers = document.getElementById("car_kilometers").value;
          var serviceType = $('#car_service_select').find(":selected").val();
          var notes = document.getElementById("form_notes").value;
          //stop submit the form, we will post it manually.
          event.preventDefault();

          if (carKilometers == null || carKilometers.replace(/\s+/g,'') == ""){
            document.getElementById("car_kilometers_error").style.display = "block";
            document.getElementById('car_kilometers_error').innerHTML = 'هذه الخانة مطلوبة.';
          } else if (carKilometers.length <= 0 || carKilometers <= 0) {
            document.getElementById("car_kilometers_error").style.display = "block";
            document.getElementById('car_kilometers_error').innerHTML = 'عدد كيلومترات السيارة يجب ان تكون اكبر من 0.';
          } else if (serviceType == null || serviceType == "") {
            document.getElementById("car_kilometers_error").style.display = "none";

            document.getElementById("car_service_select_error").style.display = "block";
            document.getElementById('car_service_select_error').innerHTML = 'هذه الخانة مطلوبة.';
          }  else {
            document.getElementById("car_kilometers_error").style.display = "none";
            document.getElementById("car_service_select_error").style.display = "none";
            var form_btn = $("#reservation_form").find('button[type="submit"]');
            var form_result_div = '#form-result';
            $(form_result_div).remove();
            $("#reservation_form").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;text-align:right;"></div>');
            var form_btn_old_msg = form_btn.html();
            form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
            $("#reservation_form").ajaxSubmit({
              dataType: "json",
            success: function(data) {
                if( data.status == 'true' ) {
                  $("#reservation_form").find('.form-control').val('');
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
    </script>
</section>