<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="tab-content" style="background: #fff">
                    <div class="tab-pane fade in active p-15" id="car-info-tab">
                        <form id="add_car_form" name="add_car_form" class="reservation-form" method="post" onsubmit="return validateAddCarForm();" action="<?=base_url();?>my-profile/add-car-form">
                            <h4 class="text-gray mt-0 pt-5"> Add New Car</h4>
                            <hr>
                            <?php if ($carBrands == null || $carModels == null)  { 
                                echo '<p>Known Error! Please try again later.</p>';
                            } else {
                            ?>
                            <div class="row">
                                <div class="reservation-first-step">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label>Car Brand</label>
                                            <div class="styled-select">
                                                <select id="car_brand_select" name="car_brand_select" class="form-control" onchange="getModels()">
                                                    <option value="">- Select Your Car Brand -</option>
                                                    <?php foreach ($carBrands["result"] as $brand) {
                                                       echo ' <option value="'.$brand->brandId.'">'.$brand->brandNameEn.'</option>';
                                                    } ?>
                                                </select>
                                                <label id="car_brand_select_error" style="color: red; display: none">This field is required.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label>Car Model</label>
                                            <div class="styled-select">
                                                <select id="car_model_select" name="car_model_select" class="form-control" disabled="disabled" >
                                                    <option value="">- Select Your Car Model -</option>
                                                    <?php foreach ($carModels["result"] as $model) {
                                                       echo ' <option value="'.$model->modelId.'">'.$model->modelNameEn.'</option>';
                                                    } ?>
                                                </select>
                                                <label id="car_model_select_error" style="color: red;">Please select car brand first.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label>Chassis Number</label>
                                            <input placeholder="Car Chassis Number" type="text" id="car_chase_number" name="car_chase_number" class="form-control" >
                                            <label id="car_chase_number_error" style="color: red; display: none">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <label>Plate Number</label>
                                            <input placeholder="Car Plate Number" type="text" id="car_plate_number" name="car_plate_number" class="form-control" >
                                            <label id="car_plate_number_error" style="color: red; display: none">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-30">
                                            <label>License Name</label>
                                            <input placeholder="Personal License Name" type="text" id="license_name" name="license_name" class="form-control" >
                                            <label id="license_name_error" style="color: red; display: none">This field is required.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-center mb-0 mt-20">
                                    <input name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="Please wait...">Add Car</button>
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
                document.getElementById('car_brand_select_error').innerHTML = 'This field is required.';
                document.getElementById('car_model_select_error').innerHTML = 'Please select car brand first.';
            }else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText != "null") {
                            document.getElementById("car_brand_select_error").style.display = "none";
                            document.getElementById("car_model_select_error").style.display = "none";
                            $("#car_model_select").prop( "disabled", false );
                            var jsonResponse = JSON.parse(this.responseText);
                            var models = '<option value="">- Select Your Car Model -</option>';
                            var i;
                            for (i = 0; i < jsonResponse.length; i++) { 
                                models += '<option value="'+jsonResponse[i].modelId+'">'+jsonResponse[i].modelNameEn+'</option>';
                            }
                            document.getElementById('car_model_select').innerHTML = models;
                        }else {
                            document.getElementById('car_model_select_error').innerHTML = 'Server Error! Please call the service provider.';
                            $("#car_model_select").prop( "disabled", true );
                        }
                    }
                };
                xhttp.open("GET", "<?= base_url().'my-profile/add-car/';?>"+brandId, true);
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
                document.getElementById('car_brand_select_error').innerHTML = 'This field is required.';
            } else if (modelId == null || modelId == "") {
                document.getElementById("car_brand_select_error").style.display = "none";

                document.getElementById("car_model_select_error").style.display = "block";
                document.getElementById('car_model_select_error').innerHTML = 'This field is required.';
            } else if (chaseNumber == null || chaseNumber == "") {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";

                document.getElementById("car_chase_number_error").style.display = "block";
                document.getElementById('car_chase_number_error').innerHTML = 'This field is required.';
            } else if (chaseNumber.length < 3) {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";

                document.getElementById("car_chase_number_error").style.display = "block";
                document.getElementById('car_chase_number_error').innerHTML = 'Chassis Number must be 3 or more characters long.';
            } else if (plateNumber == null || plateNumber == "") {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";
                document.getElementById("car_chase_number_error").style.display = "none";
                
                document.getElementById("car_plate_number_error").style.display = "block";
                document.getElementById('car_plate_number_error').innerHTML = 'This field is required.';
            } else if (plateNumber.length < 3) {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";
                document.getElementById("car_chase_number_error").style.display = "none";
                
                document.getElementById("car_plate_number_error").style.display = "block";
                document.getElementById('car_plate_number_error').innerHTML = 'Plate Number must be 3 or more characters long.';
            } else if (licenseName == null || licenseName == "") {
                document.getElementById("car_brand_select_error").style.display = "none";
                document.getElementById("car_model_select_error").style.display = "none";
                document.getElementById("car_chase_number_error").style.display = "none";
                document.getElementById("car_plate_number_error").style.display = "none";
                
                document.getElementById("license_name_error").style.display = "block";
                document.getElementById('license_name_error').innerHTML = 'License Name must be 3 or more characters long.';
            } else {
                var form_btn = $("#add_car_form").find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                $("#add_car_form").before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#add_car_form").ajaxSubmit({
                dataType: "json",
                success: function(data) {
                    if ( data.status == 'true' ) {
                        $("#add_car_form").find('.form-control').val('');
                        $("#form-result").removeClass('alert-danger');
                        $("#form-result").addClass('alert-success');
                        window.location.replace("<?= base_url(); ?>my-profile");
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