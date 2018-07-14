<!-- Section: inner-header -->
<!--<link rel="stylesheet" href="<?=asset_url();?>rater/jquery.rateyo.min.css"/>-->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?= $baseServerURL.$result->mainPic; ?>">
      <div class="container pt-90 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row"> 
            <div class="col-md-12">
              <h3 style="color:#fff;"class="title"><?=$result->carNameAr; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="product">
              <div class="col-md-5">
                  <!-- Portfolio Gallery Grid -->
                  <div id="grid" class="gallery-isotope grid-1 gutter clearfix">
                    <!-- Portfolio Item Start -->
                    <div class="gallery-item design">
                      <div class="thumb">
                        <div class="flexslider-wrapper">
                          <div class="flexslider">
                          <ul class="slides">
                              <li><a href="<?= $imagesBaseURL.$result->externalImage1; ?>" title="خارجي"><img src="<?= $imagesBaseURL.$result->externalImage1; ?>" alt=""></a></li>
                              <li><a href="<?= $imagesBaseURL.$result->externalImage2; ?>" title="خارجي"><img src="<?= $imagesBaseURL.$result->externalImage2; ?>" alt=""></a></li>
                              <li><a href="<?= $imagesBaseURL.$result->externalImage3; ?>" title="خارجي"><img src="<?= $imagesBaseURL.$result->externalImage3; ?>" alt=""></a></li>
                              <li><a href="<?= $imagesBaseURL.$result->internalImage1; ?>" title="داخلي"><img src="<?= $imagesBaseURL.$result->internalImage1; ?>" alt=""></a></li>
                              <li><a href="<?= $imagesBaseURL.$result->internalImage2; ?>" title="داخلي"><img src="<?= $imagesBaseURL.$result->internalImage2; ?>" alt=""></a></li>
                              <li><a href="<?= $imagesBaseURL.$result->internalImage3; ?>" title="داخلي"><img src="<?= $imagesBaseURL.$result->internalImage3; ?>" alt=""></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="overlay-shade"></div>
                        <div class="icons-holder">
                          <div class="icons-holder-inner">
                            <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                              <a href="#"><i class="fa fa-picture-o"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Portfolio Item End -->
                  </div>
                 
              </div>
              <div class="col-md-7 car-detail-custom">
                <div class="product-summary">
                  <h2 class="product-title"><?=$result->carNameAr; ?></h2>
                  <div class="product_review">
                    <ul class="review_text list-inline">
                    <!--<li style="padding-right: 0px;padding-left: 0px;">
                        <div id="rateYo"></div>
                      </li>
                      <li><a style="font-size: 18px"><span><?=$result->totalNumOfRatedUsers; ?></span> <i class="fa fa-user"></i></a></li>-->
                      <!--<li><a href="#">Add Rate</a></li> -->
                    </ul>
                  </div>
                  <!--<div class="short-description">
                    <p>Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut posuere mollis nulla ut consectetur.</p>
                  </div>-->
                  <div class="tags"><strong>ناقل الحركة: </strong><?=$result->transmission; ?></div>
                  <?php
                  if (strpos(strtolower($result->carNameEn), "faw x40") !== false) {
                  ?>
                  <br/><a class="btn btn-dark btn-theme-colored ajaxload-popup" style="float: right;" href="<?=base_url();?>ar/car-requests/request-test-drive/<?=$result->carId;?>/<?=$result->carNameEn;?>/<?=$result->carNameAr;?>">طلب اختبار القيادة</a>
                  <?php } ?>
                  <!--<div class="category"><strong>Category:</strong> <a href="#">Model Name</a>, <a href="#">Product Name</a></div>
                  <div class="tags"><strong>Tags:</strong> <a href="#">Product Name</a>, <a href="#">Product Name</a></div>-->
                  <!--<div class="cart-form-wrapper mt-30">
                    <form enctype="multipart/form-data" method="post" class="cart">
                      <input type="hidden" value="productID" name="add-to-cart">
                      <table class="table variations no-border">
                        <tbody>
                          <tr>
                            <td class="name">Size</td>
                            <td class="value">
                              <select class="form-control">
                                <option value="">Choose an option...</option>
                                <option value="large">Large</option>
                                <option selected="selected" value="medium">Medium</option>
                                <option value="small">Small</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td class="name">Amount</td>
                            <td class="value">
                              <div class="quantity buttons_added">
                                <input type="button" class="minus" value="-">
                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                <input type="button" class="plus" value="+">
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <button class="single_add_to_cart_button btn btn-theme-colored" type="submit">Add to cart</button>
                    </form>
                  </div>-->
                </div>
              </div>
              <div class="col-md-12">
                <div class="horizontal-tab product-tab">
                  <ul class="nav nav-tabs">
                    <!--<li ><a href="#tab1" data-toggle="tab">Description</a></li>-->
                    <li class="active"><a href="#tab1" data-toggle="tab">معلومات إضافية</a></li>
                    <!--<li><a href="#tab3" data-toggle="tab">Reviews</a></li>-->
                  </ul>
                  <div class="tab-content">
                    <!--<div class="tab-pane fade in active" id="tab1">
                      <h3>Product Description</h3>
                      <p>One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus voluptates nisi hic alias libero explicabo reiciendis sint ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae. One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus voluptates nisi hic alias libero explicabo reiciendis sint ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.</p>
                      <p>One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus voluptates nisi hic alias libero explicabo reiciendis sint ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.</p>
                    </div>-->
                    <div class="tab-pane fade in active" id="tab1">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>ناقل الحركة</th> 
                            <td><?=$result->transmission; ?></td>
                          </tr>
                          <tr>
                            <th>سعة المحرك</th> 
                            <td><?=$result->engineCapacity; ?></td>
                          </tr>
                          <tr>
                            <th>أقصى عزم دوران</th> 
                            <td><?=$result->maxTorque; ?></td>
                          </tr>
                          <tr>
                            <th>الطاقة القصوى</th> 
                            <td><?=$result->maxPower; ?></td>
                          </tr>
                          <tr>
                            <th>العرض</th>  
                            <td><?=$result->width; ?></td>
                          </tr>
                          <tr>
                            <th>الارتفاع</th>  
                            <td><?=$result->height; ?></td>
                          </tr>
                          <tr>
                            <th>الطول</th> 
                            <td><?=$result->length; ?></td>
                          </tr>
                          <tr>
                            <th>Curb Weight</th>
                            <td><?=$result->curbWeight; ?></td>
                          </tr>
                         
                          <tr>
                            <th>سعة شنطة السيارة </th> 
                            <td><?=$result->trunkCapacity; ?></td>
                          </tr>
                          <tr>
                            <th>ارتفاع السيارة عن الارض</th> 
                            <td><?=$result->groundClearance; ?></td>
                          </tr>
                          <tr>
                            <th>الوزن الإجمالي للسيارة</th> 
                            <td><?=$result->grossVehicleWeight; ?></td>
                          </tr>
                          <tr>
                            <th>سعة خزان الوقود</th> 
                            <td><?=$result->fuelTankCapacity; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--<div class="tab-pane fade" id="tab3">
                      <div class="reviews">
                        <ol class="commentlist">
                          <li class="comment">
                            <div class="media"> <a href="#" class="media-left"><img class="img-circle" alt="" src="https://placehold.it/75x75" width="75"></a>
                              <div class="media-body">
                                <ul class="review_text list-inline">
                                  <li>
                                    <div title="Rated 5.00 out of 5" class="star-rating"><span data-width="100%">5.00</span></div>
                                  </li>
                                  <li>
                                    <h5 class="media-heading meta"><span class="author">Tom Joe</span> – Mar 15, 2015:</h5>
                                  </li>
                                </ul>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                            </div>
                          </li>
                          <li class="comment">
                            <div class="media"> <a href="#" class="media-left"><img class="img-circle" alt="" src="https://placehold.it/75x75" width="75"></a>
                              <div class="media-body">
                                <ul class="review_text list-inline">
                                  <li>
                                    <div title="Rated 4.00 out of 5" class="star-rating"><span data-width="80%">4.00</span></div>
                                  </li>
                                  <li>
                                    <h5 class="media-heading meta"><span class="author">Mark Doe</span> – Jan 23, 2015:</h5>
                                  </li>
                                </ul>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                            </div>
                          </li>
                        </ol>
                      </div>
                    </div>-->
                  </div>
                </div>
              </div>
            </div>
            <!--<div class="col-md-12 mt-30">
              <h3 class="line-bottom">Related Products</h3>
              <div class="row multi-row-clearfix">
                <div class="products related">
                  <div class="col-sm-6 col-md-3 col-lg-3 mb-30">
                    <div class="product pb-0">
                      <span class="tag-sale">Sale!</span>
                      <div class="product-thumb"> 
                        <img alt="" src="http://placehold.it/320x360" class="img-responsive img-fullwidth">
                        <div class="overlay">
                          <div class="btn-add-to-cart-wrapper">
                            <a class="btn btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">Add To Cart</a>
                          </div>
                          <div class="btn-product-view-details">
                            <a class="btn btn-default btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">View detail</a>
                          </div>
                        </div>
                      </div>
                      <div class="product-details text-center bg-lighter pt-15 pb-10">
                        <a href="#"><h5 class="product-title mt-0">Product Name</h5></a>
                        <div class="star-rating" title="Rated 3.50 out of 5"><span data-width="80%">3.50</span></div>
                        <div class="price"><del><span class="amount">$165.00</span></del><ins><span class="amount">$160.00</span></ins></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3 mb-30">
                    <div class="product pb-0">
                      <span class="tag-sale">Sale!</span>
                      <div class="product-thumb"> 
                        <img alt="" src="http://placehold.it/320x360" class="img-responsive img-fullwidth">
                        <div class="overlay">
                          <div class="btn-add-to-cart-wrapper">
                            <a class="btn btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">Add To Cart</a>
                          </div>
                          <div class="btn-product-view-details">
                            <a class="btn btn-default btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">View detail</a>
                          </div>
                        </div>
                      </div>
                      <div class="product-details text-center bg-lighter pt-15 pb-10">
                        <a href="#"><h5 class="product-title mt-0">Product Name</h5></a>
                        <div class="star-rating" title="Rated 3.50 out of 5"><span data-width="60%">3.50</span></div>
                        <div class="price"><del><span class="amount">$70.00</span></del><ins><span class="amount">$55.00</span></ins></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3 mb-30">
                    <div class="product pb-0">
                      <div class="product-thumb"> 
                        <img alt="" src="http://placehold.it/320x360" class="img-responsive img-fullwidth">
                        <div class="overlay">
                          <div class="btn-add-to-cart-wrapper">
                            <a class="btn btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">Add To Cart</a>
                          </div>
                          <div class="btn-product-view-details">
                            <a class="btn btn-default btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">View detail</a>
                          </div>
                        </div>
                      </div>
                      <div class="product-details text-center bg-lighter pt-15 pb-10">
                        <a href="#"><h5 class="product-title mt-0">Product Name</h5></a>
                        <div class="star-rating" title="Rated 3.50 out of 5"><span data-width="75%">3.50</span></div>
                        <div class="price"><ins><span class="amount">$185.00</span></ins></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md3 col-lg-3 mb-30">
                    <div class="product pb-0">
                      <div class="product-thumb"> 
                        <img alt="" src="http://placehold.it/320x360" class="img-responsive img-fullwidth">
                        <div class="overlay">
                          <div class="btn-add-to-cart-wrapper">
                            <a class="btn btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">Add To Cart</a>
                          </div>
                          <div class="btn-product-view-details">
                            <a class="btn btn-default btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="#">View detail</a>
                          </div>
                        </div>
                      </div>
                      <div class="product-details text-center bg-lighter pt-15 pb-10">
                        <a href="#"><h5 class="product-title mt-0">Product Name</h5></a>
                        <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="100%">5.00</span></div>
                        <div class="price"><ins><span class="amount">$480.00</span></ins></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  <script>
$(function () {
 
  /*$("#rateYo").rateYo({
    starWidth: "20px",
    multiColor: true,
    readOnly: true,
    rtl: true,
    rating: <?=$result->averageRating?>
  });*/

  /* get rating 
  var rating = $rateYo.rateYo("rating");

  on select rate make it fullStar: true
 */
});
</script>
<script type="text/javascript" src="<?= asset_url();?>rater/jquery.rateyo.js"></script>
