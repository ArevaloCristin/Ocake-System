<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="<?=site_url('productlist')?>">Shop</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="shopping-cart section">
<form method="get" action= "<?=site_url('checkout')?>" > 
    <div class="container">
        <div class="cart-list-head">

            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-2 col-12">
                        <input type="checkbox" name="" value="">
                    </div>
                    <div class="col-lg-2 col-md-1 col-12">
                        <p>Product</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Price</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>
            
             
            <?php foreach ($cartData as $data) {?>
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-2 col-12">
                            <input type="checkbox" name="cart_product[]" value="<?php echo $data->cart_id?>">
                        </div>
                        <div class="col-lg-2 col-md-1 col-12">
                            <div class="product-image ">
                                <a href="<?= site_url('productdetail') ?>">
                                    <img src="http://localhost/ocake/uploads/<?php echo $data->image; ?>" width="100px" alt="<?php echo $data->flavor; ?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <h5 class="product-name">
                                <a href="<?= site_url('productgrid') ?>"><?php echo $data->flavor; ?></a>
                            </h5>
                            <p class="product-des">
                                <span><em>Categories:</em> <?php echo $data->occasion; ?></span>
                                <span><em>Price:</em> <?php echo $data->price; ?></span>
                                <!-- <span><em>Color:</em> Black</span> -->
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p> <?php echo $data->price; ?></p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div >
                            <input type="number" style="width: 80px;" class="form-control" min="1" size="10" value="<?= $data->quantity ?>">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p><?php echo '&#8369; ' . $data->price * $data->quantity . '.00' ?></p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                             <a style="color:red; margin-right:5px" class="text-center"
                                 href="<?php echo site_url('cart/delete_cart/' . $data->cart_id); ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                            <!-- <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a> -->
                        </div>
                    </div>
                </div>
            <?php } ?>

            
        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span><?php echo $subtotal; ?></span></li>
                                </ul>
                                <div class="button">
                                    <input type="submit" class="btn" value="Checkout" >
                                    <a href="<?=site_url('productgrid')?>" class="btn btn-alt">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
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
