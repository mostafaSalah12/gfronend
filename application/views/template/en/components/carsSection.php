<section>
    <div class="container pb-0">
    <div class="section-title text-center mb-30">
        <div class="row">
        <div class="col-md-12">
            <h2 class="mt-0 mb-5">Cars</h2>
        </div>
        </div>
    </div>
    <div class="row multi-row-clearfix">
        <div class="col-md-12">
        <div class="products">
        <?php
        if (!isset($result))
            $this->load->view("template/en/noData");
        else
            foreach($result as $car){
        ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-30">
            <div class="product">
                <!--<span class="tag-sale">Sale!</span>-->
                <div class="product-thumb" style="min-height: 215px; padding-top: 20px; background: #eee;"> 
                    <img alt="" src="<?php echo $imagesBaseURL.$car->brandImage ?>" class="img-responsive img-fullwidth" style="margin: auto auto;">
                    <div class="overlay">
                        <div class="btn-product-view-details">
                            <a class="btn btn-default btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?php echo base_url().'car/'.$car->brandNameEn; ?>">View detail</a>
                        </div>
                    </div>
                </div>
                <div class="product-details text-center">
                    <a href="<?php echo base_url().'car/'.$car->brandNameEn; ?>"><h5 class="product-title"><?php echo $car->brandNameEn ?></h5></a>
                </div>
            </div>
            </div>
            <?php } ?>
        </div>
        </div>
    </div>
    </div>
</section>