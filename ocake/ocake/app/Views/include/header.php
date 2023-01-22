<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ocake</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/white-logo.png" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/order.css" />
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                <!-- <li>
                                    <div class="select-position">
                                        <select id="select4">
                                            <option value="0" selected>₱ PESO</option>
                                            <option value="2">$ USD</option>
                                        </select>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <div class="select-position">
                                        <select id="select5">
                                            <option value="0" selected>ENGLISH</option>
                                            <option value="1">FILIPINO</option>
                                        </select>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="<?=site_url('home')?>">Home</a></li>
                                <li><a href="<?=site_url('about')?>">About Us</a></li>
                                <li><a href="<?=site_url('contact')?>">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                <?php 
                                    if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user")
                                        echo ucwords($_SESSION['userF_name']); // set first letter to upperCase
                                ?>
                            </div>
                            <ul class="user-login">
                                <!-- <li>
                                    <a href="<?=site_url('personal')?>">Sign In</a>
                                </li> -->
                                <li>
                                    <a href="<?=site_url('logout')?>">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="<?=site_url('home')?>">
                            <img src="assets/images/logo/white-logo.png" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                            <option value="1">option 01</option>
                                            <option value="2">option 02</option>
                                            <option value="3">option 03</option>
                                            <option value="4">option 04</option>
                                            <option value="5">option 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>0927-689-5550</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <!-- <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div> -->
                                <div class="cart-items">
                               
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items"><?php echo $cart_count; ?></span>
                                    </a>
                                   
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            
                                            <span><?php echo $cart_count;?> 
                                            <?php if ($cart_count > 1){
                                                echo "Items";
                                            }else{
                                                echo "Item";
                                            }?>
                                            </span>
                                            
                                            <a href="<?=site_url('cart')?>">View Cart</a>
                                        </div>
                                        <ul class=" shopping-list">
                                            <?php $total=0;?>
                                            <?php  foreach($cartData as $data){ 
                                                $total += $data->price * $data->quantity
                                                ?>
                                                <li>
                                                    <a href="<?php echo site_url('cart/delete_cart/'.$data->cart_id); ?>" class="remove" title="Remove this item"><i
                                                            class="lni lni-close"></i></a>
                                                    <div class="cart-img-head">
                                                        <a class="cart-img" href="<?=site_url('productgrid')?>">
                                                            <?php if($data->is_customized == 0) {?>
                                                                <img src="http://localhost/ocake/uploads/<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                            <?php }else{?>
                                                                <img src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                            <?php }?>
                                                        </a>
                                                    </div>

                                                    <div class="content">
                                                        <h4><a href="<?=site_url('productgrid')?>">
                                                                <?=$data->flavor; ?></a>
                                                            </h4>
                                                            <p><?=$data->occasion; ?> Cake</p>
                                                        <p class="quantity">x<?=$data->quantity; ?> - <span class="amount"><?='&#8369;'.$data->price; ?></span></p>
                                                    </div>
                                                </li>
                                            <?php }?>
                                            
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                <span class="total-amount"><?='&#8369;' .$total .'.00'?></span>
                                            </div>
                                            <div class="button">
                                                <?php if(!empty($data)){?>
                                                <a href="<?=site_url('checkout')?>" class="btn animate">Checkout</a>
                                                <?php }elseif(empty($data)){
                                                    echo '<a class="btn animate disabled">Checkout</a>';
                                                }?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Shopping Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->


        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                            <ul class="sub-category">
                                <li><a href="<?=site_url('productgrid')?>">Occasions <i
                                            class="lni lni-chevron-right"></i></a>
                                    <ul class="inner-sub-category">
                                        <li><a href="<?=site_url('birthday')?>">Birthday</a></li>
                                        <li><a href="<?=site_url('christening')?>">Christening</a></li>
                                        <li><a href="<?=site_url('wedding')?>">Wedding</a></li>
                                        <li><a href="<?=site_url('graduation')?>">Graduation</a></li>
                                        <li><a href="<?=site_url('valentine')?>">Valentine</a></li>
                                        <li><a href="<?=site_url('halloween')?>">Halloween</a></li>
                                        <li><a href="<?=site_url('christmas')?>">Christmas</a></li>
                                        <li><a href="<?=site_url('newyear')?>">New Year</a></li>
                                        <!--<li><a href="product-grids.html">Batteries</a></li>
                                    <li><a href="product-grids.html">Cables & Adapters</a></li>-->
                                    </ul>
                                </li>
                                <li><a href="<?=site_url('popular')?>">Popular Cakes</a></li>
                                <li><a href="<?=site_url('newarrival')?>">New Arrival</a></li>
                                <li><a href="<?=site_url('miscellaneous')?>">Miscellaneous</a></li>
                                <!-- <li><a href="product-grids.html">top 100 offer</a></li>
                            <li><a href="product-grids.html">sunglass</a></li>
                            <li><a href="product-grids.html">watch</a></li>
                            <li><a href="product-grids.html">man’s product</a></li>
                            <li><a href="product-grids.html">Home Audio & Theater</a></li>
                            <li><a href="product-grids.html">Computers & Tablets </a></li>
                            <li><a href="product-grids.html">Video Games </a></li>
                            <li><a href="product-grids.html">Home Appliances </a></li>-->
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="<?=site_url('home')?>" class="active"
                                            aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item"><a href="<?=site_url('orders')?>">Orders</a>
                                    <span class="order-items"><?php echo $order_count; ?></span>
                                </li>
                                    
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Customization</a>

                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item"><a href="<?=site_url('customization')?>">Start Design</a></li>
                                            <li class="nav-item"><a href="<?=site_url('custom_design')?>">Your Designs</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Pages</a>

                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item"><a href="account.html">Account</a></li>
                                            <li class="nav-item"><a href="mail-success.html">Review</a></li>
                                            <li class="nav-item"><a href="mail-success.html">Order History</a></li>
                                            <li class="nav-item"><a href="mail-success.html">Order Tracking</a></li>
                                            <li class="nav-item"><a href="<?=site_url('faq')?>">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Shop</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a href="<?=site_url('productgrid')?>">Shop Grid</a>
                                            </li>
                                            <li class="nav-item"><a href="<?=site_url('productlist')?>">Shop List</a>
                                            </li>
                                            <li class="nav-item"><a href="<?=site_url('productdetails')?>">Product
                                                    Details</a></li>
                                            <li class="nav-item"><a href="<?=site_url('cart')?>">Cart</a></li>
                                            <li class="nav-item"><a href="<?=site_url('checkout')?>">Checkout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class=" nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a href="blog-grid-sidebar.html">Blog
                                                    Grid
                                                    Sidebar</a>
                                            </li>
                                            <li class="nav-item"><a href="blog-single.html">Blog
                                                    Single</a></li>
                                            <li class="nav-item"><a href="blog-single-sidebar.html">Blog
                                                    Single
                                                    Sibebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                    <a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
                                    </li> -->
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/reika.tabernero"><i
                                        class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->
