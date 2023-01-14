<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Orders</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="<?=site_url('productlist')?>">Shop</a></li>
                    <li>Orders</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="http://localhost/ocake/assets/css/order.css" rel="stylesheet">
        <link href="http://localhost/ocake/assets/css/orderdetails.css" rel="stylesheet">

<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <div class="p-3 text-center text-white text-lg  rounded-top" style="background-color:#d10f94"><span class="text-uppercase">Your Orders </span></div>
            
            <div class="cart-single-list">
                <div class="row">
                    <div>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
                        <div class="container padding-bottom-3x">
                            <div class="text-center cart-single-list flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Items</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Price</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-12">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-12">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Status</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Details</p>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($status as $data) {?>
                                <div class="pt-3 pb-3 text-center cart-single-list flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-2 col-12">
                                        <p><?php echo $data->items;?> 
                                            <?php if ($cart_count > 1){
                                                echo "Items";
                                            }else{
                                                echo "Item";
                                            }?>
                                        </p>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-12">
                                            <p><?php echo '&#8369;' . number_format ($data->total_price); ?></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12"> 
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-12">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $data->stat; ?></p>
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-12">
                                            <a class="btn btn-primary" href="<?=site_url('orderdetails')?>" role="button">View Details</a>
                                        </div>
                                        <!-- <div class="col-lg-3 col-md-2 col-12">
                                            <a class="btn btn-primary" href="<?//php echo site_url('orderdetails/view/')/*.$data->order_code*/; ?>" role="button">View Details</a>
                                        </div> -->
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/tiny-slider.js"></script>
<script src="assets/js/glightbox.min.js"></script>
<!-- <script src="assets/js/main.js"></script>
<script src="assets/js/order.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/owl.carousel.min.js"></script>
<script src="assets/slick.min.js"></script>
<script src="assets/waypoints.min.js"></script> -->

<?php echo view('admin/include/photo-script'); ?>
<?php echo view('admin/include/script'); ?>
</body>

</html>
