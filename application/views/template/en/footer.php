</div>
  <!-- end main-content -->
  <!-- Footer -->
  <footer id="footer" class="footer pb-0" data-bg-img="<?= asset_url(); ?>images/footer-bg.png" data-bg-color="#262E3B">
    <div class="container pt-60 pb-30">
      <div class="row multi-row-clearfix">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Our Partners</h5>
            <div id="flickr-feed" class="clearfix">
                <div class="flickr_badge_image" id="flickr_badge_image4">
                    <a href="#">
                      <img src="<?= asset_url(); ?>images/partners/peugeot_logo.jpg" style="height: 85px; width: 120px;">
                    </a>
                </div>
                <div class="flickr_badge_image" id="flickr_badge_image5">
                    <a href="#">
                        <img src="<?= asset_url(); ?>images/logo/opel.jpg" style="height: 85px; width: 120px;">
                    </a>
                </div>
                <div class="flickr_badge_image" id="flickr_badge_image4">
                    <a href="#">
                      <img src="<?= asset_url(); ?>images/partners/chevrolet_logo.jpg" style="height: 85px; width: 120px;">
                    </a>
                </div>
                <div class="flickr_badge_image" id="flickr_badge_image4">
                    <a href="#">
                      <img src="<?= asset_url(); ?>images/partners/FAW_log.jpg" style="height: 85px; width: 120px;">
                    </a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Contact</h5>
            <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" action="<?=base_url();?>sendQuickEmail" method="post">
              <div class="form-group">
                <input id="form_email" name="footer_form_email" class="form-control required email" type="text" required="" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <textarea name="footer_form_message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-default btn-transparent text-gray btn-xs btn-flat mt-0" data-loading-text="Please wait...">Send Message</button>
              </div>
            </form>
          </div>
        </div>
        <!--<div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Latest News</h5>
            <div class="latest-posts">
              <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Sustainable Construction</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="#"><img src="" alt=""></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
            </div>
          </div>
        </div>-->
        <div class="col-sm-6 col-md-3">
          <div class="widget dark"> <img alt="" src="<?= asset_url(); ?>images/logo/logo_original_white.png">
            <p class="font-12 mt-10 mb-10">Geyushi Motors was founded by Mr. Mohy El Din Geyushi and other partners in 1981, having 35 years of experience in the automotive industry...</p>
            <a class="btn btn-default btn-transparent btn-xs btn-flat mt-5" href="<?=base_url();?>about">Read more</a>
            <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-20">
                <li><a href="https://www.facebook.com/geyushimotors/" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="https://www.linkedin.com/company/9372097/" target="_blank"><i class="fa fa-linkedin text-white"></i></a></li>
                <!--
                <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                -->
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="horizontal-contact-widget mt-30 pt-30 text-center">
            <div class="col-sm-12 col-sm-4">
              <div class="each-widget"> <i class="pe-7s-phone font-36 mb-10"></i>
                <h5 class="text-white">Call Us</h5>
                <p><a href="#">19927</a></p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-map font-36 mb-10"></i>
                <h5 class="text-white">Address</h5>
                <p>Al Shaheed Axis, Takseem Al Marwa7a, Kattameya, Nasr City, Cairo.</p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10"></i>
                <h5 class="text-white">Email</h5>
                <p><a href="#">contact@geyushimotors.com</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="list-inline styled-icons icon-hover-theme-colored icon-gray icon-circled text-center mt-30 mb-10">
                <li><a href="https://www.facebook.com/geyushimotors/" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="https://www.linkedin.com/company/9372097/" target="_blank"><i class="fa fa-linkedin text-white"></i></a></li>
                <!--
                <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                -->
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-theme-colored p-20">
      <div class="row text-center">
        <div class="col-md-12">
          <p class="text-white font-11 m-0">Copyright &copy;<?= date("Y"); ?> Geyushi Motors. All Rights Reserved. Powered by <a href="http://www.platformhouse.com" style="color: #fff; font-weight: bold; font-size: 12px;">Platform House</a></p>
        </div>
      </div>
    </div>
    <!-- Quick Contact Form Validation-->
            <script type="text/javascript">
              $("#footer_quick_contact_form").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="<?= asset_url(); ?>js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>
</html>