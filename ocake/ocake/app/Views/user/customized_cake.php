 <!-- End Header Area -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"><?//php echo $occasion?> Your Designs</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="javascript:void(0)">Customization</a></li>
                        <li>Your Designs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="product-grids section">
        <div class="container">
            <div class="p-3 text-center text-white text-lg  rounded-top" style="background-color:#d10f94"><span class="text-uppercase">Your Customized Designs </span></div>
            <div class="cart-single-list">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="product-grids-head">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                    aria-labelledby="nav-grid-tab">
                                    <div class="row">
                                        <?php $num = 1;     
                                        foreach ($product as $data) { ?>
                                            <div class="col-lg-3 col-md-5 col-12">
                                                <div class="single-product">
                                                    <div class="product-image">
                                                            <?php if($data->is_customized == 0) {?>
                                                                <img src="http://localhost/ocake/uploads/<?php echo $data->image;?>"
                                                                alt="#">
                                                            <?php }else{?>
                                                                <img src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                                <?php }?>
                                                        <div class="button">
                                                            <form action="<?=site_url('add_cart')?>" method="POST">
                                                            <!-- <input type="hidden" name="uid" value=""> -->
                                                                <input type="hidden" name="occasion"
                                                                    value="<?=$data->occasion;?>">
                                                                <input type="hidden" name="flavor" value="<?=$data->flavor;?>">
                                                                <input type="hidden" name="price" value="<?=$data->price;?>">
                                                                <input type="hidden" name="pid" value="<?=$data->id;?>">
                                                                <!-- <input type="hidden" name="img" value="<?//=$data->image;?>"> -->
                                                                <button type="submit" class="btn"><i class="lni lni-cart"></i>
                                                                    Add to Cart</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <!-- <a class="btn btn-outline-primary btn-rounded btn-sm" style="float:right" 
                                                            href="<?//=site_url('productdetails')?>">View Details
                                                        </a> -->
                                                        <h4 class="title">
                                                            <a href="product-grids.html"><?php echo $data->occasion; ?> Cake</a>
                                                        </h4>
                                                        <span class="category"> Flavor: <?php echo $data->flavor; ?></span>
                                                        <span class="category"> Design by: <?php echo $data->firstname; ?> (You)</span>
                                                        <!-- <ul class="review">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star"></i></li>
                                                            <li><span>4.0 Review(s)</span></li>
                                                        </ul> -->
                                                        <div class="price">
                                                            <span>&#8369 <?php echo $data->price; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- <div class="pagination left">
                                            <ul class="pagination-list">
                                                <li><a href="<?=site_url('1')?>">1</a></li>
                                                <li class="active"><a href="<?=site_url('2')?>">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
