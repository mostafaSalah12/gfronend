 <!-- Section: Experts Details -->
 <section>
     <?php /*$this->session->unset_userdata('user_info');*/ ?>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-3">
              <div class="thumb">
                <?php
                if ($this->session->has_userdata('user_info')){
                    $user_info = $this->session->userdata('user_info');
                    $_fName = $user_info->user->firstName;
                    $_lName = $user_info->user->lastName;
                    ?>
                    <div class="row"> <div class="col-md-8"><img src="<?php 
                    if ( $user_info->user->profilePic == null) 
                        echo asset_url().'images/X-Default-Profile.jpg';
                    else echo $imagesBaseURL.$user_info->user->profilePic;
                    
                    ?>" alt="" style="border-radius: 50%;border: 1px solid #eee;"><br/><br/></div></div>
                    <h4 class="name font-22 mt-0 mb-0"><?= $_fName.' '.$_lName; ?></h4><br/>
                    <h5 class="mt-5">Contact:</h5>
                    <p><span>Mobile: </span> <?=$user_info->user->mobile; ?></p>
                    <p><span>Email: </span> <?=$user_info->user->email; ?> </p>
                    <a class="btn btn-dark btn-theme-colored ajaxload-popup" style="float: left;" href="<?=base_url();?>my-profile/edit-profile">Edit</a>
                    <a class="btn btn-dark btn-theme-colored" style="float: left; margin-left: 5px;" href="<?=base_url();?>my-profile/logout">Log out</a>
                <?php } else {
                    header("Location: ".base_url()."home");
                } ?>
              </div>
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                    <h4 class="name font-24 mt-0 mb-0 pull-left line-bottom">My Cars</h4>
                    <a class="btn btn-dark btn-theme-colored pull-right ajaxload-popup" href="<?=base_url();?>my-profile/add-car">Add Car</a>
                </div>
              </div>
              <div class="row">
                <hr>
              </div>
              <!--<p><?php /*echo $user_info->token;*/ ?> </p>-->
              <?php
                if(!isset($userCars) || sizeof($userCars) <= 0){
                    ?>
                        <h5 style="text-align: center;">There is no cars in your account.</h5>
                        <br/>
                    <?php 
                } else {
                    echo '<div class="row">';
                    foreach($userCars as $userCar){
                        echo ' <!-- Portfolio Gallery Grid -->
                        <div class="col-md-4" style="padding-right: 0px; padding-left: 5px;">
                        <div id="grid" class="gallery-isotope grid-1 gutter clearfix">';
                        ?>
                            <!-- Portfolio Item Start -->
                            <div class="gallery-item photography">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="<?=asset_url()?>images/cars/my-car-icon.jpg" alt="project">
                                    <div class="overlay-shade"></div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a class="ajaxload-popup" href="<?=base_url();?>my-profile/car-details/<?= $userCar->userCarId; ?>"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="hover-link" data-lightbox="image" href="<?=asset_url()?>images/cars/my-car-icon.jpg">View more</a>
                                </div>
                                <h4><?= $userCar->brandName.' - '.$userCar->modelName; ?></h4>
                            </div>
                            <!-- Portfolio Item End -->
                        <?php
                        echo '</div></div>';
                    }
                    echo '</div>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>