<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="tab-content" style="background: #fff">
                    <div class="tab-pane fade in active p-15" id="car-info-tab">
                        <form id="add_car_form" name="add_car_form" class="reservation-form" method="post" onsubmit="return validateAddCarForm();" action="<?=base_url();?>ar/my-profile/add-car-form">
                            <h4 class="text-gray mt-0 pt-5" style="text-align: right"> إضافة سيارة جديدة</h4>
                            <hr>
                            <?php if ($carBrands == null || $carModels == null)  { 
                                echo '<p>حدث خطأ! يرجى المحاولة في وقت لاحق.</p>';
                            } else {
                            ?>
                            <div class="row">
                                <div class="reservation-first-step">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label style="display: block; text-align: right;">ماركة السيارة</label>
                                            <div class="styled-select">
                                                <select id="car_brand_select" name="car_brand_select" class="form-control" onchange="getModels()">
                                                    <option value="">- إختار ماركة السيارة -</option>
                                                    <?php foreach ($carBrands["result"] as $brand) {
                                                       echo ' <option value="'.$brand->brandId.'">'.$brand->brandNameAr.'</option>';
                                                    } ?>
                                                </select>
                                                <label id="car_brand_select_error" style="text-align: right; color: red; display: none;">هذه الخانة مطلوبة.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label style="display: block; text-align: right;">طراز السيارة</label>
                                            <div class="styled-select">
                                                <select id="car_model_select" name="car_model_select" class="form-control" disabled="disabled" >
                                                    <option value="">- إختار طراز السيارة -</option>
                                                    <?php foreach ($carModels["result"] as $model) {
                                                       echo ' <option value="'.$model->modelId.'">'.$model->modelNameAr.'</option>';
                                                    } ?>
                                                </select>
                                                <label id="car_model_select_error" style="text-align: right;color: red; display: block;">يجب إختيار ماركة السيارة اولاً.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label style="display: block; text-align: right;">رقم الشاسيه</label>
                                            <input placeholder="رقم الشاسيه" type="text" id="car_chase_number" name="car_chase_number" class="form-control" style="text-align: right;">
                                            <label id="car_chase_number_error" style="text-align: right;color: red; display: none">هذه الخانة مطلوبة.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label style="display: block; text-align: right;">رقم لوحة السيارة</label>
                                            <input placeholder="رقم لوحة السيارة" type="text" id="car_plate_number" name="car_plate_number" class="form-control" style="text-align: right;">
                                            <label id="car_plate_number_error" style="text-align: right;color: red; display: none">هذه الخانة مطلوبة.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-30">
                                            <label style="display: block; text-align: right;">الاسم المتواجد في رخصة السيارة</label>
                                            <input placeholder="الاسم المتواجد في رخصة السيارة" type="text" id="license_name" name="license_name" class="form-control" style="text-align: right;">
                                            <label id="license_name_error" style="text-align: right;color: red; display: none">هذه الخانة مطلوبة.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center mb-0 mt-20">
                                    <input name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="برجاء الإنتظار...">إضافة</button>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function getModels(){
            
            var brandId = $('#car_brand_select').find(":selected").val();
            if (brandId == null || brandId == ""){
                $("#car_model_select").prop( "disabled", true );
                document.getElementById("car_brand_select_error").style.display = "block";
                document.getElementById("car_model_select_error").style.display = "block";
                document.getElementById('car_brand_select_error').innerHTML = 'هذه الخانة مطلوبة.';
                document.getElementById('car_model_select_error').innerHTML = 'يجب إختيار ماركة السيارة اولاً.';
            }else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText != "null") {
                            document.getElementById("car_brand_select_error").style.display = "none";
                            document.getElementById("car_model_select_error").style.display = "none";
                            $("#car_model_select").prop( "disabled", false );
                            var jsonResponse = JSON.parse(this.responseText);
                            var models = '<option value="">- إختار طراز السيارة -</option>';
                            var i;
                            for (i = 0; i < jsonResponse.length; i++) { 
                                models += '<option value="'+jsonResponse[i].modelId+'">'+jsonResponse[i].modelNameAr+'</option>';
                            }
                            document.getElementById('car_model_select').innerHTML = models;
                        }else {
                            document.getElementById('car_model_select_error').innerHTML = 'حدث خطأ في الخادم! يرجى الاتصال بمزود الخدمة.';
                            $("#car_model_select").prop( "disabled", true );
                        }
                    }
                };
                xhttp.open("GET", "<?= base_url().'ar/my-profile/add-car/';?>"+brandId, true);
                xhttp.send();

            }
        }

        function validateAddCarForm(){
            var brandId = $('#car_brand_select').find(":selected").val();
            var modelId = $('#car_model_select').find(":selected").val();
            var chaseNumber = document.getElementById("car_chase_number").value;
            var plateNumber = document.getElementById("car_plate_number").value;
            var licenseName = document.getElementById("license_name").value;

            //stop submit the form, we will post it manually.
            event.preventDefault();

            if(brandId == null || brandId == ""){
                document.getElementById("car_brand_select_error").style.display = "block";
                document.getElementById('car_brand_select_error').innerHTML = 'هذه الخانة مطلوبة.';
            } else if (modelId == null || modelId == "") {
                document.getElementById("car_brand_select_error").style.display = "none";

                document.getElementById("car_model_select_error").style.display = "block";
                document.getElementById('car_model_select_error').innerHTML = 'هذه الخانة مطلوبة.';
            } else if (chaseNumber == null || chaseNumber == "") {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";

                document.getElementById("car_chase_number_error").style.display = "block";
                document.getElementById('car_chase_number_error').innerHTML = 'هذه الخانة مطلوبة.';
            } else if (chaseNumber.length < 3) {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";

                document.getElementById("car_chase_number_error").style.display = "block";
                document.getElementById('car_chase_number_error').innerHTML = 'يجب أن يكون رقم الشاسيه 3 أحرف على الأقل.';
            } else if (plateNumber == null || plateNumber == "") {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";
                document.getElementById("car_chase_number_error").style.display = "none";
                
                document.getElementById("car_plate_number_error").style.display = "block";
                document.getElementById('car_plate_number_error').innerHTML = 'هذه الخانة مطلوبة.';
            } else if (plateNumber.length < 3) {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";
                document.getElementById("car_chase_number_error").style.display = "none";
                
                document.getElementById("car_plate_number_error").style.display = "block";
                document.getElementById('car_plate_number_error').innerHTML = 'يجب أن تكون لوحة السيارة 3 أحرف على الأقل.';
            } else if (licenseName == null || licenseName == "") {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";
                document.getElementById("car_chase_number_error").style.display = "none";
                document.getElementById("car_plate_number_error").style.display = "none";
                
                document.getElementById("license_name_error").style.display = "block";
                document.getElementById('license_name_error').innerHTML = 'يجب أن يكون الاسم المتواجد في رخصة السيارة 3 أحرف على الأقل.';
            } else {
                var form_btn = $("#add_car_form").find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                $("#add_car_form").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;text-align:right;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#add_car_form").ajaxSubmit({
                dataType: "json",
                success: function(data) {
                    if ( data.status == 'true' ) {
                        $("#add_car_form").find('.form-control').val('');
                        $("#form-result").removeClass('alert-danger');
                        $("#form-result").addClass('alert-success');
                        window.location.replace("<?= base_url(); ?>ar/my-profile");
                    } else {
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
                        console.warn(XMLHttpRequest.responseText);
                    }
                });
            }

        }
    </script>
</section>