
</div>
  <!-- end main-content -->
  <!-- Footer -->
  <footer id="footer" class="footer pb-0" data-bg-img="<?= asset_url(); ?>images/footer-bg.png" data-bg-color="#262E3B">
    <div class="container pt-60 pb-30">
      <div class="row multi-row-clearfix">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">شركاؤنا</h5>
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
            <h5 class="widget-title line-bottom">اتصال سريع</h5>
            <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" action="<?=base_url();?>sendQuickEmailAr" method="post" onsubmit="return validateData();">
              <div class="form-group">
                <input id="form_email" name="footer_form_email" class="form-control email" type="text" placeholder="أدخل البريد الإلكتروني">
                <label id="form_email_email" style="color: red; display: none">هذه الخانة مطلوبة.</label>
              </div>
              <div class="form-group">
                <textarea id="message_form" name="footer_form_message" class="form-control" placeholder="أدخل الرسالة" rows="3"></textarea>
                <label id="form_email_message" style="color: red; display: none">هذه الخانة مطلوبة.</label>
              </div>
              <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-default btn-transparent text-gray btn-xs btn-flat mt-0" data-loading-text="أرجو الإنتظار...">إرسال</button>
              </div>
            </form>
          </div>
        </div>
        <!--<div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">أحدث الأخبار</h5>
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
            <p class="font-12 mt-10 mb-10">تأسست جيوشي موتورز عام 1981 علي يد السيد / محي الدين جيوشيي، بخبرة اكثر من 36 عام في مجال السيارات. بدأت...</p>
            <a class="btn btn-default btn-transparent btn-xs btn-flat mt-5" href="<?=base_url();?>ar/about">اقرأ المزيد</a>
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
                <h5 class="text-white">اتصل بنا</h5>
                <p><a href="#">19927</a></p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-map font-36 mb-10"></i>
                <h5 class="text-white">العنوان</h5>
                <p>قطعة ١٨ و ١٩ تقسيم المروحة - القطامية - مدينة نصر - محافظة القاهرة</p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10"></i>
                <h5 class="text-white">البريد الإلكتروني</h5>
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
          <p class="text-white font-11 m-0">حقوق النشر&copy;<?= date("Y"); ?>  جيوشي موتورز. جميع الحقوق محفوظة. تم تطوير الموقع بواسطة <a href="http://www.platformhouse.com" style="color: #fff; font-weight: bold; font-size: 12px;">بلاتفورم هاوس</a></p>
        </div>
      </div>
</div>
    <!-- Quick Contact Form Validation-->
    <script type="text/javascript">
        function validateData(){
            var email = document.getElementById("form_email").value;
            var message = document.getElementById("message_form").value;
            //stop submit the form, we will post it manually.
            event.preventDefault();
            if (email==null || email==""){
                document.getElementById("form_email_email").style.display = "block";
            } else {
              document.getElementById("form_email_email").style.display = "none";
            }

            if (message==null || message==""){
                document.getElementById("form_email_message").style.display = "block";
            } else {
              document.getElementById("form_email_message").style.display = "none";
            }

            if ((email==null || email=="") || (message==null || message=="")){
                return false;
            }else{
                document.getElementById("form_email_email").style.display = "none";
                document.getElementById("form_email_message").style.display = "none";
                var form_btn = $("#footer_quick_contact_form").find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $("#footer_quick_contact_form").ajaxSubmit({
                dataType:  'json',
                success: function(data) {
                    if( data.status == 'true' ) {
                    $("#footer_quick_contact_form").find('.form-control').val('');
                    }
                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                    $(form_result_div).html(data.message).fadeIn('slow');
                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                }
                });
            }
        }
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