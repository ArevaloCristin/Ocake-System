 <!-- End Header Area -->

 <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customization</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="javascript:void(0)">Shop</a></li>
                        <li>Shop Grid</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">

                    <div class="product-sidebar">

                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <form action="#">
                                <input type="text" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>


                       


                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                                value="10" onchange="rangePrimary.value=value">
                            <div class="range-inner">
                                <label>$</label>
                                <input type="text" id="rangePrimary" placeholder="100" />
                            </div>
                        </div>


                      
                        <div class="single-widget condition">
                            <h3>Filter by Brand</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                                <label class="form-check-label" for="flexCheckDefault11">
                                    Apple (254)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
                                <label class="form-check-label" for="flexCheckDefault22">
                                    Bosh (39)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault33">
                                <label class="form-check-label" for="flexCheckDefault33">
                                    Canon Inc. (128)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault44">
                                <label class="form-check-label" for="flexCheckDefault44">
                                    Dell (310)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault55">
                                <label class="form-check-label" for="flexCheckDefault55">
                                    Hewlett-Packard (42)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault66">
                                <label class="form-check-label" for="flexCheckDefault66">
                                    Hitachi (217)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault77">
                                <label class="form-check-label" for="flexCheckDefault77">
                                    LG Electronics (310)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault88">
                                <label class="form-check-label" for="flexCheckDefault88">
                                    Panasonic (74)
                                </label>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <!-- <label for="sorting">Colors</label> -->
                                        <select class="form-control" id="sorting">
                                            <option value="" disabled selected>Pre-Define Design</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <!-- <label for="sorting">Sort by:</label> -->
                                        <select class="form-control" id="sorting">
                                        <option value="" disabled selected>Layers</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <select class="form-control" id="sorting">
                                        <option value="" disabled selected>Shapes</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <!-- <label for="sorting">Sort by:</label> -->
                                        <select class="form-control" id="sorting">
                                        <option value="" disabled selected>Colors</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>  
                                    </div>
                                </div>
                               
                        </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    <?php $num = 1;
                                          
                          foreach ($product as $data) { ?>
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="single-product">
                                            <div class="product-image">
                                                <img src="http://localhost/ocake/uploads/<?php echo $data->image;?>"
                                                    alt="#">
                                                <div class="button">
                                                    <form action="<?=site_url('add_cart')?>" method="POST">
                                                    <input type="hidden" name="uid" value="<?=session('id')?>">
                                                        <input type="hidden" name="occasion"
                                                            value="<?=$data->occasion;?>">
                                                        <input type="hidden" name="flavor" value="<?=$data->flavor;?>">
                                                        <input type="hidden" name="price" value="<?=$data->price;?>">
                                                        <input type="hidden" name="pid" value="<?=$data->id;?>">
                                                        <!-- <input type="hidden" name="img" value="<?=$data->image;?>"> -->
                                                        <button type="submit" class="btn"><i class="lni lni-cart"></i>
                                                            Add to Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category"> <?php echo $data->flavor; ?></span>
                                                <h4 class="title">
                                                    <a href="product-grids.html"><?php echo $data->occasion; ?> Cake</a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 Review(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <span>&#8369 <?php echo $data->price; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <?php }
                                ?>
                                    <div class="col-lg-12 row-12">
                                            <div class="product-grids-head">
                                                <div class="product-grid-topbar">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-3 col-md-8 col-12">
                                                            <div class="product-sorting">
                                                            </div>
                                                        </div>
                                                            

                                                        </div>
                                                    </div>
                                                        <div class="row">
                                                        <div class="col-12">

                                                        <div class="box-drag">
                                                            <div class="drag-el" draggable="true">W</div>
                                                        </div>
                                                        <div class="box-drag">
                                                            <div class="drag-el"draggable="true">O</div>
                                                        </div>
                                                        <div class="box-drag">
                                                            <div class="drag-el"draggable="true">W</div>

                                                            <div class ="droptarget">
                                                        </div>

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

    <!-- <script src="assets/js/customization.js"></script> -->

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>