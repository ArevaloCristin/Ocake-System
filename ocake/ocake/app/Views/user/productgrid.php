 <div class="breadcrumbs">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-6 col-md-6 col-12">
                 <div class="breadcrumbs-content">
                     <h1 class="page-title">Shop Grid</h1>
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


                     <div class="single-widget">
                         <h3>All Categories</h3>
                         <ul class="list">
                         <li>
                                <a href="<?=site_url('birthday')?>">Birthday </a>
                                <!-- <span>(1138)</span> -->
                            </li>
                            <li>
                                <a href="<?=site_url('christening')?>">Christening</a>
                                <!-- <span>(2356)</span> -->
                            </li>
                            <li>
                                <a href="<?=site_url('wedding')?>">Wedding</a>
                                <!-- <span>(420)</span> -->
                            </li>
                            <li>
                                <a href="<?=site_url('graduation')?>">Graduation</a>
                                <!-- <span>(874)</span> -->
                            </li>
                            <li>
                                <a href="<?=site_url('valentine')?>">Valentine</a>
                                <!-- <span>(1239)</span> -->
                            </li>
                            <li>
                                <a href="<?=site_url('halloween')?>">Halloween</a>
                                <!-- <span>(340)</span> -->
                            </li>
                            <li>
                                <a href="<?=site_url('christmas')?>">Christmas</a>
                                <!-- <span>(512)</span> -->
                            </li>
                            <li>
                                <a href="<?=site_url('newyear')?>">New Year</a>
                                <!-- <span>(512)</span> -->
                            </li>
                         </ul>
                     </div>


                     <div class="single-widget range">
                         <h3>Price Range</h3>
                         <input type="range" class="form-range" name="range" step="1" min="100" max="10000" value="10"
                             onchange="rangePrimary.value=value">
                         <div class="range-inner">
                             <label>$</label>
                             <input type="text" id="rangePrimary" placeholder="100" />
                         </div>
                     </div>


                     <div class="single-widget condition">
                         <h3>Filter by Price</h3>
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                             <label class="form-check-label" for="flexCheckDefault1">
                                 $50 - $100L (208)
                             </label>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                             <label class="form-check-label" for="flexCheckDefault2">
                                 $100L - $500 (311)
                             </label>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                             <label class="form-check-label" for="flexCheckDefault3">
                                 $500 - $1,000 (485)
                             </label>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                             <label class="form-check-label" for="flexCheckDefault4">
                                 $1,000 - $5,000 (213)
                             </label>
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
                             <div class="col-lg-7 col-md-8 col-12">
                                 <div class="product-sorting">
                                     <label for="sorting">Sort by:</label>
                                     <select class="form-control" id="sorting">
                                         <option>Popularity</option>
                                         <option>Low - High Price</option>
                                         <option>High - Low Price</option>
                                         <option>Average Rating</option>
                                         <option>A - Z Order</option>
                                         <option>Z - A Order</option>
                                     </select>
                                     <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                 </div>
                             </div>
                             <div class="col-lg-5 col-md-4 col-12">
                                 <nav>
                                     <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                         <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                             data-bs-target="#nav-grid" type="button" role="tab"
                                             aria-controls="nav-grid" aria-selected="true"><i
                                                 class="lni lni-grid-alt"></i></button>
                                         <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                             data-bs-target="#nav-list" type="button" role="tab"
                                             aria-controls="nav-list" aria-selected="false"><i
                                                 class="lni lni-list"></i></button>
                                     </div>
                                 </nav>
                             </div>
                         </div>
                     </div>
                     <div class="tab-content" id="nav-tabContent">
                         <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                             aria-labelledby="nav-grid-tab">
                             <div class="row">
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-1.jpg" alt="#">
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Watches</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">Xiaomi Mi Band 5</a>
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
                                                 <span>$199.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-2.jpg" alt="#">
                                             <span class="sale-tag">-25%</span>
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Speaker</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">Bluetooth Speaker</a>
                                             </h4>
                                             <ul class="review">
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><span>5.0 Review(s)</span></li>
                                             </ul>
                                             <div class="price">
                                                 <span>$275.00</span>
                                                 <span class="discount-price">$300.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-3.jpg" alt="#">
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Camera</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">WiFi Security Camera</a>
                                             </h4>
                                             <ul class="review">
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><span>5.0 Review(s)</span></li>
                                             </ul>
                                             <div class="price">
                                                 <span>$399.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-4.jpg" alt="#">
                                             <span class="new-tag">New</span>
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Phones</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">iphone 6x plus</a>
                                             </h4>
                                             <ul class="review">
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><span>5.0 Review(s)</span></li>
                                             </ul>
                                             <div class="price">
                                                 <span>$400.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-5.jpg" alt="#">
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Headphones</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">Wireless Headphones</a>
                                             </h4>
                                             <ul class="review">
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><span>5.0 Review(s)</span></li>
                                             </ul>
                                             <div class="price">
                                                 <span>$350.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-6.jpg" alt="#">
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Speaker</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">Mini Bluetooth Speaker</a>
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
                                                 <span>$70.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-7.jpg" alt="#">
                                             <span class="sale-tag">-50%</span>
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Headphones</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">Wireless Headphones</a>
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
                                                 <span>$100.00</span>
                                                 <span class="discount-price">$200.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-8.jpg" alt="#">
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Laptop</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">Apple MacBook Air</a>
                                             </h4>
                                             <ul class="review">
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><span>5.0 Review(s)</span></li>
                                             </ul>
                                             <div class="price">
                                                 <span>$899.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4 col-md-6 col-12">

                                     <div class="single-product">
                                         <div class="product-image">
                                             <img src="assets/images/products/product-2.jpg" alt="#">
                                             <span class="sale-tag">-25%</span>
                                             <div class="button">
                                                 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                     Add to Cart</a>
                                             </div>
                                         </div>
                                         <div class="product-info">
                                             <span class="category">Speaker</span>
                                             <h4 class="title">
                                                 <a href="product-grids.html">Bluetooth Speaker</a>
                                             </h4>
                                             <ul class="review">
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><i class="lni lni-star-filled"></i></li>
                                                 <li><span>5.0 Review(s)</span></li>
                                             </ul>
                                             <div class="price">
                                                 <span>$275.00</span>
                                                 <span class="discount-price">$300.00</span>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-12">

                                     <div class="pagination left">
                                         <ul class="pagination-list">
                                             <li><a href="javascript:void(0)">1</a></li>
                                             <li class="active"><a href="javascript:void(0)">2</a></li>
                                             <li><a href="javascript:void(0)">3</a></li>
                                             <li><a href="javascript:void(0)">4</a></li>
                                             <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                                             </li>
                                         </ul>
                                     </div>

                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                             <div class="row">
                                 <div class="col-lg-12 col-md-12 col-12">

                                     <div class="single-product">
                                         <div class="row align-items-center">
                                             <div class="col-lg-4 col-md-4 col-12">
                                                 <div class="product-image">
                                                     <img src="assets/images/products/product-1.jpg" alt="#">
                                                     <div class="button">
                                                         <a href="product-details.html" class="btn"><i
                                                                 class="lni lni-cart"></i> Add to
                                                             Cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-8 col-md-8 col-12">
                                                 <div class="product-info">
                                                     <span class="category">Watches</span>
                                                     <h4 class="title">
                                                         <a href="product-grids.html">Xiaomi Mi Band 5</a>
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
                                                         <span>$199.00</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-12 col-md-12 col-12">

                                     <div class="single-product">
                                         <div class="row align-items-center">
                                             <div class="col-lg-4 col-md-4 col-12">
                                                 <div class="product-image">
                                                     <img src="assets/images/products/product-2.jpg" alt="#">
                                                     <span class="sale-tag">-25%</span>
                                                     <div class="button">
                                                         <a href="product-details.html" class="btn"><i
                                                                 class="lni lni-cart"></i> Add to
                                                             Cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-8 col-md-8 col-12">
                                                 <div class="product-info">
                                                     <span class="category">Speaker</span>
                                                     <h4 class="title">
                                                         <a href="product-grids.html">Big Power Sound Speaker</a>
                                                     </h4>
                                                     <ul class="review">
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><span>5.0 Review(s)</span></li>
                                                     </ul>
                                                     <div class="price">
                                                         <span>$275.00</span>
                                                         <span class="discount-price">$300.00</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-12 col-md-12 col-12">

                                     <div class="single-product">
                                         <div class="row align-items-center">
                                             <div class="col-lg-4 col-md-4 col-12">
                                                 <div class="product-image">
                                                     <img src="assets/images/products/product-3.jpg" alt="#">
                                                     <div class="button">
                                                         <a href="product-details.html" class="btn"><i
                                                                 class="lni lni-cart"></i> Add to
                                                             Cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-8 col-md-8 col-12">
                                                 <div class="product-info">
                                                     <span class="category">Camera</span>
                                                     <h4 class="title">
                                                         <a href="product-grids.html">WiFi Security Camera</a>
                                                     </h4>
                                                     <ul class="review">
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><span>5.0 Review(s)</span></li>
                                                     </ul>
                                                     <div class="price">
                                                         <span>$399.00</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-12 col-md-12 col-12">

                                     <div class="single-product">
                                         <div class="row align-items-center">
                                             <div class="col-lg-4 col-md-4 col-12">
                                                 <div class="product-image">
                                                     <img src="assets/images/products/product-4.jpg" alt="#">
                                                     <span class="new-tag">New</span>
                                                     <div class="button">
                                                         <a href="product-details.html" class="btn"><i
                                                                 class="lni lni-cart"></i> Add to
                                                             Cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-8 col-md-8 col-12">
                                                 <div class="product-info">
                                                     <span class="category">Phones</span>
                                                     <h4 class="title">
                                                         <a href="product-grids.html">iphone 6x plus</a>
                                                     </h4>
                                                     <ul class="review">
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><i class="lni lni-star-filled"></i></li>
                                                         <li><span>5.0 Review(s)</span></li>
                                                     </ul>
                                                     <div class="price">
                                                         <span>$400.00</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-12 col-md-12 col-12">

                                     <div class="single-product">
                                         <div class="row align-items-center">
                                             <div class="col-lg-4 col-md-4 col-12">
                                                 <div class="product-image">
                                                     <img src="assets/images/products/product-7.jpg" alt="#">
                                                     <span class="sale-tag">-50%</span>
                                                     <div class="button">
                                                         <a href="product-details.html" class="btn"><i
                                                                 class="lni lni-cart"></i> Add to
                                                             Cart</a>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-8 col-md-8 col-12">
                                                 <div class="product-info">
                                                     <span class="category">Headphones</span>
                                                     <h4 class="title">
                                                         <a href="product-grids.html">PX7 Wireless Headphones</a>
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
                                                         <span>$100.00</span>
                                                         <span class="discount-price">$200.00</span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-12">

                                     <div class="pagination left">
                                         <ul class="pagination-list">
                                             <li><a href="javascript:void(0)">1</a></li>
                                             <li class="active"><a href="javascript:void(0)">2</a></li>
                                             <li><a href="javascript:void(0)">3</a></li>
                                             <li><a href="javascript:void(0)">4</a></li>
                                             <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                                             </li>
                                         </ul>
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


 <footer class="footer">

     <div class="footer-top">
         <div class="container">
             <div class="inner-content">
                 <div class="row">
                     <div class="col-lg-3 col-md-4 col-12">
                         <div class="footer-logo">
                             <a href="index.html">
                                 <img src="assets/images/logo/white-logo.svg" alt="#">
                             </a>
                         </div>
                     </div>
                     <div class="col-lg-9 col-md-8 col-12">
                         <div class="footer-newsletter">
                             <h4 class="title">
                                 Subscribe to our Newsletter
                                 <span>Get all the latest information, Sales and Offers.</span>
                             </h4>
                             <div class="newsletter-form-head">
                                 <form action="#" method="get" target="_blank" class="newsletter-form">
                                     <input name="EMAIL" placeholder="Email address here..." type="email">
                                     <div class="button">
                                         <button class="btn">Subscribe<span class="dir-part"></span></button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="footer-middle">
         <div class="container">
             <div class="bottom-inner">
                 <div class="row">
                     <div class="col-lg-3 col-md-6 col-12">

                         <div class="single-footer f-contact">
                             <h3>Get In Touch With Us</h3>
                             <p class="phone">Phone: +1 (900) 33 169 7720</p>
                             <ul>
                                 <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                 <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                             </ul>
                             <p class="mail">
                                 <a href="/cdn-cgi/l/email-protection#166563666679646256657e796671647f72653875797b"><span
                                         class="__cf_email__"
                                         data-cfemail="f784828787988583b7849f988790859e9384d994989a">[email&#160;protected]</span></a>
                             </p>
                         </div>

                     </div>
                     <div class="col-lg-3 col-md-6 col-12">

                         <div class="single-footer our-app">
                             <h3>Our Mobile App</h3>
                             <ul class="app-btn">
                                 <li>
                                     <a href="javascript:void(0)">
                                         <i class="lni lni-apple"></i>
                                         <span class="small-title">Download on the</span>
                                         <span class="big-title">App Store</span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="javascript:void(0)">
                                         <i class="lni lni-play-store"></i>
                                         <span class="small-title">Download on the</span>
                                         <span class="big-title">Google Play</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>

                     </div>
                     <div class="col-lg-3 col-md-6 col-12">

                         <div class="single-footer f-link">
                             <h3>Information</h3>
                             <ul>
                                 <li><a href="javascript:void(0)">About Us</a></li>
                                 <li><a href="javascript:void(0)">Contact Us</a></li>
                                 <li><a href="javascript:void(0)">Downloads</a></li>
                                 <li><a href="javascript:void(0)">Sitemap</a></li>
                                 <li><a href="javascript:void(0)">FAQs Page</a></li>
                             </ul>
                         </div>

                     </div>
                     <div class="col-lg-3 col-md-6 col-12">

                         <div class="single-footer f-link">
                             <h3>Shop Departments</h3>
                             <ul>
                                 <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                 <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                 <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                 <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                 <li><a href="javascript:void(0)">Headphones</a></li>
                             </ul>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="footer-bottom">
         <div class="container">
             <div class="inner-content">
                 <div class="row align-items-center">
                     <div class="col-lg-4 col-12">
                         <div class="payment-gateway">
                             <span>We Accept:</span>
                             <img src="assets/images/footer/credit-cards-footer.png" alt="#">
                         </div>
                     </div>
                     <div class="col-lg-4 col-12">
                         <div class="copyright">
                             <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                     target="_blank">GrayGrids</a></p>
                         </div>
                     </div>
                     <div class="col-lg-4 col-12">
                         <ul class="socila">
                             <li>
                                 <span>Follow Us On:</span>
                             </li>
                             <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                             <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                             <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                             <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </footer>


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