<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Your Orders</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                    <!-- <li><a href="<?//=site_url('productlist')?>">Shop</a></li> -->
                    <li>Your Orders</li>
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
        
<div class="btn-group mt-3 " style="margin-left:8%">
  <a href="<?=site_url('orders')?>" class="btn btn-primary" role="button">Orders</a>
  <a href="<?=site_url('completedorder')?>" class="btn btn-primary" role="button" style="background-color:#d10f94; border-color:#d10f94">Completed</a>
  <a href="<?=site_url('cancelledorder')?>" class="btn btn-primary" role="button">Cancelled</a>
</div>

<div class="mt-5 mb-5">
    <div class="container">
        <div class="cart-list-head">
            <div class="p-3 text-center text-white text-lg  rounded-top" style="background-color:#d10f94"><span class="text-uppercase">Completed Orders </span></div>
            
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
                            <?php if(empty($status)){
								echo '
                                    <div class="d-flex flex-wrap justify-content-xl-between" >
                                        <div class="col-lg-12 col-md-12 col-12">
											<div class ="text-muted" style="font-size:25px; text-align:center; margin-top:7%; margin-bottom:5%">
												No completed orders found.
											</div>
										</div>
									</div>
                                ';
							}?>
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
                                            <div style="text-align:center">
                                                    <input class="btn" type="button" 
                                                    style="justify-content:center; border-radius:5px; color:#ffffff;
                                                        <?php if($data->stat=="Pending"){
                                                            echo "background-color:#25b831; border-color:#25b831";
                                                        }elseif($data->stat=="Confirmed"){
                                                            echo "background-color:#A7F432; border-color:#A7F432";
                                                        }elseif($data->stat=="Processing"){
                                                            echo "background-color:orange; border-color:orange";
                                                        }elseif($data->stat=="Shipped"){
                                                            echo "background-color:#03adfc; border-color:#03adfc";
                                                        }elseif($data->stat=="Delivered"){
                                                            echo "background-color:#F25278; border-color:#F25278";
                                                        }elseif($data->stat=="Completed"){
                                                            echo "background-color:#034efc; border-color:#034efc";
                                                        }elseif($data->stat=="Cancelled"){
                                                            echo "background-color:#ed2f2f; border-color:#ed2f2f";
                                                        } ?>
                                                    " value="<?=$data->stat;?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-12">
                                            <form action="<?=site_url('orderdetails')?>" method="POST">
                                                <input type="hidden" name="details" value="<?=$data->order_code;?>">
                                                <input type="submit" role="button" value="View" class="btn btn-primary">
                                            </form>
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
