<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Order Details</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="<?=site_url('productlist')?>">Shop</a></li>
                    <li>Order Details</li>
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
            <div class="cart-list-title">
                <div class="row">
                    <div>
                        <h6 class="m-0 font-weight-bold text-primary"> Shipping Details</h6>
                    </div>
                </div>
            </div>
            <div class="cart-single-list">
                <div class="row">
                    <div>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
                        <div class="container padding-bottom-3x mb-1">
                            <div class="card mb-1">
                                <div class="p-3 text-center text-white text-lg  rounded-top" style="background-color:#d10f94"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium">
                                    <?php foreach($status as $data){?>
                                        <?php echo $data->order_code;?>
                                    <?php }?></span>
                                </div>
                                    <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                        <?php foreach($status as $data){?>
                                            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped Via:</span> UPS Ground</div>
                                            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span><?php echo $data->stat;?></div>
                                            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span><?php echo $data->date;?></div>
                                        <?php }?>
                                    </div>
                                    <div class="card-body">
                                        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="pe-7s-medal"></i></div>
                                                </div>
                                                <h4 class="step-title">Pending Order</h4>
                                            </div>
                                                <?php foreach($status as $data){?>
                                                    <?php if($data->stat == "Confirmed" || $data->stat == "Processing" || $data->stat == "Shipped" || $data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-cart"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Confirmed Order</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-cart"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Confirmed Order</h4>
                                                                </div>';
                                                    }?>

                                                    <?php if($data->stat == "Processing" || $data->stat == "Shipped" || $data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-config"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Processing Order</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-config"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Processing Order</h4>
                                                                </div>';
                                                    }?>

                                                    <?php if($data->stat == "Shipped" || $data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-car"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Dispatched</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-car"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Dispatched</h4>
                                                                </div>';
                                                    }?>

                                                    <?php if($data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-home"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Delivered</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-home"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Delivered</h4>
                                                                </div>';
                                                    }?>
                                                <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
                                        <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
                                    </div>
                                    <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails" data-toggle="modal" data-target="#orderDetails">View Order Details</a></div>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="right">
                                <h6 class="font-weight-bold text-primary"> Transaction Details</h6>
                                <div class="checkout-sidebar-price-table mt-10">
                                    <h5 class="title">Shipping Address</h5>
                                    <div >
                                        <?//php foreach($order as $data){?>
                                        <div>
                                            <label for="Name">Name: <?php echo $data->firstname;?> <?php echo $data->lastname;?></label><br>
                                            <label for="Address">Addresss: <?php echo $data->street;?>, <?php echo $data->barangay;?>, <?php echo $data->municipality;?></label><br>
                                            <label for="Phone Number"> Phone Number: <?php echo $data->mobile;?></label>
                                        </div>
                                        <?//php }?>
                                    </div>
                                </div>
                                <div class="checkout-sidebar-price-table mt-10">
                                    <h5 class="title">Order Details</h5>
                                    <div >
                                        <?//php foreach($order as $data){?>
                                        <div>
                                        <label for="Payment Method">Payment Method: <?php echo $data->payment_method?></label><br>
                                        <label for="Delivery Method">Delivery Method: <?php echo $data->delivery_method?></label><br>
                                        <label for="Scheduled Delivery Date">Scheduled Delivery Date: <?php echo $data->date?></label><br>
                                        </div>
                                        <?//php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="right mb-4">
                            <h6 class="m-0 font-weight-bold text-primary"> Ordered Items</h6>
                                <div class="checkout-sidebar-price-table mt-10">
                                    <h5 class="title"><?php echo $data->items;?> 
                                        <?php if ($cart_count > 1){
                                            echo "Items";
                                        }else{
                                            echo "Item";
                                        }?>
                                    </h5>
                                    <div class="sub-total-price">
                                        <?php foreach($order as $data){?>
                                        <div class="total-price">
                                            <p class="value"><img style="height:50px" src="http://localhost/ocake/uploads/<?php echo $data->image;?>" alt="I'm Cake"></p>
                                            <p class="product-des">
                                                <span><em></em> <?='&#8369;'.$data->price; ?></span><br>
                                                <span><em></em>x<?php echo $data->quantity;?> <?php //echo $data->price; ?></span>
                                            </p>
                                            <p class="price"><?= '&#8369;'.$data->price?></p>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="total-payable">
                                        <div class="payable-price">
                                            <p class="value">Subotal Price:</p>
                                            <p class="price"><?='&#8369;'.$data->total_price?></p>
                                        </div>
                                        <div class="payable-price">
                                            <p class="value">Shipping Fee:</p>
                                            <p class="price"><?php //echo '&#8369;'. number_format($data->price); ?></p>
                                        </div>
                                        <div class="payable-price">
                                            <p class="value">Price to Pay:</p>
                                            <p class="price"><?php //echo '&#8369;'. number_format($data->price); ?></p>
                                        </div>
                                    </div>
                                    <div class="price-table-btn button">
                                    <!-- <?php //foreach($order as $data){?>
                                    <form action="<?//=site_url('placeorder')?>" method="POST">
                                    <input type="hidden" name="cart_id[]" value="<?//=$data->cart_id?>">
                                    <input type="hidden" name="product_id[]" value="<?//=$data->product_id?>">
                                    <input type="hidden" name="occasion[]" value="<?//=$data->occasion?>">
                                    <input type="hidden" name="flavor[]" value="<?//=$data->flavor?>">
                                    
                                    <input type="hidden" name="price[]" value="<?//=$data->price?>">
                                    <input type="hidden" name="quantity[]" value="<?//=$data->quantity?>">
                                    <?php //}?> -->
                                    <button type="submit" class="btn btn-alt"
                                    data-toggle="modal" data-target="#Modal<?php echo $data->checkout_id;?>">Order Received</button>
                                        <div class="modal fade" id="Modal<?php echo $data->checkout_id;?>"
                                                role="dialog">
                                            <div class="modal-dialog" >
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title font-weight-bold">How would you like the product/service?</h6>
                                                        <button type="button" class="close" style="border:none; background-color:white; font-size:25px"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="mt-2" name="form"
                                                            action="<?php echo site_url('order_received/'.$data->checkout_id); ?>"
                                                            method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                            <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                            
                                                            <label for="Rate Us">Rate Us: </label><br>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rate" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rate" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rate" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rate" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rate" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div><br><br>
                                                                
                                                            <div class="mb-3 mt-2">
                                                                <div class="sub-total-price">
                                                                    <?//php foreach($order as $data){?>
                                                                        <label for="Feedback">Feedback: </label>
                                                                    <div align="center">
                                                                        <textarea style="width:400px; height:100px" name="feedback" 
                                                                       form="form" placeholder="What's your feedback?"></textarea>
                                                                    </div>
                                                                    <?//php }?>
                                                                </div>
                                                                <input type="hidden" value="Completed" name="received_status">
                                                                <input class="button btn btn-danger" style="float:right"
                                                                type="submit" value="Submit" name="submit">
                                                            </div>
                                                                    
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn"
                                    data-toggle="modal" data-target="#myModal<?php echo $data->checkout_id;?>">Cancel Order</button>
                                        <div class="modal fade" id="myModal<?php echo $data->checkout_id;?>"
                                                role="dialog">
                                            <div class="modal-dialog" >
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title font-weight-bold">Are you sure you want to cancel your order?</h6>
                                                        <button type="button" class="close" style="border:none; background-color:white; font-size:25px"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="mt-2"
                                                            action="<?php echo site_url('cancel_order/'.$data->checkout_id); ?>"
                                                            method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                            <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                            <div class="mb-3">
                                                                <div class="sub-total-price">
                                                                    <?php foreach($order as $data){?>
                                                                    <div class="total-price">
                                                                        <p class="value"><img style="height:50px" src="http://localhost/ocake/uploads/<?php echo $data->image;?>" alt="I'm Cake"></p>
                                                                        <p class="product-des">
                                                                            <span><em></em> <?='&#8369;'.$data->price; ?></span><br>
                                                                            <span><em></em>x<?php echo $data->quantity;?>  <?php //echo $data->price; ?></span>
                                                                        </p>
                                                                        <p class="price"><?= '&#8369;'.$data->price?></p>
                                                                    </div>
                                                                    <?php }?>
                                                                </div>
                                                                <input type="hidden" value="Cancelled" name="cancel_status">
                                                                <input class="button btn btn-danger" style="float:right"
                                                                type="submit" value="Cancel Order" name="submit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
