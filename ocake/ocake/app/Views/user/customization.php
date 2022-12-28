<div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"><?php echo $occasion?> Category</h1>
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
                            <h3>Price Table</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-3 col-12">
                                        <?//php foreach($order as $data){?>
                                        <div>
                                            <span>
                                                <img style="height:50px" src="http://localhost/ocake/uploads/<?php //echo $data->image;?>" alt="I'm Cake">
                                                    200
                                                    x1
                                            </span>
                                        </div>
                                        <?//php}?>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- <div class="single-widget range">
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
                        </div> -->
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
                                            <option value="" disabled selected>Layers</option>
                                            <?php foreach($custom_design as $data){?>
                                            <option><?php echo $data->layer;?></option>
                                            <?php }?>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <!-- <label for="sorting">Sort by:</label> -->
                                        <select class="form-control" id="sorting">
                                            <option value="" disabled selected>Shapes</option>
                                            <option id="demo" onclick="myFunction()">Circle</option>
                                            <option>Square</option>
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 col-12">
                                    <div class="product-sorting">
                                    <select class="form-control" id="sorting">
                                        <option value="" disabled selected>Colors</option>
                                            <option>White</option>
                                            <option>Black</option>
                                            <option>Red</option>
                                            <option>Brown</option>
                                            <option>Blue</option>
                                            <option>Pink</option>
                                            <option>Green</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <!-- <label for="sorting">Sort by:</label> -->
                                        <select class="form-control" id="sorting">
                                            <option value="" disabled selected>Flavor</option>
                                            <option>Vanilla</option>
                                            <option>Chocolate</option>
                                            <option>Mocha</option>
                                            <option>Strawberry</option>
                                            <option>Red Velvet</option>
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
                                    
                                          
                                    
                                    <div class="col-lg-12 row-12">
                                            <div class="product-grids-head">
                                                <div class="product-grid-topbar">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-3 col-md-8 col-12">
                                                            <div class="product-sorting">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="col-lg-3 col-md-8 col-12">
                                                            <div class="product-sorting">
                                                            </div>
                                                        </div>
                                                            <!-- <div class="product-grid-topbar">
                                                                <h6 class="m-0 font-weight-bold">Cake Add Ons</h6>
                                                            </div> -->
                                                        <div id="conteudo-left" style="left:10px; top:20px; width:10; height:10; z-index:-1; overflow: auto">
                                                            <div class="product-grid-topbar">
                                                                <h6 class="m-0 font-weight-bold">Cake Add Ons</h6>
                                                            </div>
                                                            
                                                            <form name="form_dnd_left" class="m-2 text-center">
                                                                <?php foreach($custom_addons as $data){?>
                                                                    <span>
                                                                            <img id="<?php echo "addon".$data->add_ons_id;?>" style="width:50px; height:50px" 
                                                                            src="http://localhost/ocake/uploads/<?php echo $data->image;?>"  alt="" />
                                                                    </span>
                                                                <?php }?>
                                                                <!-- <div>
                                                                    <img id="ball" style="width:50px; height:50px; position:absolute" src="http://localhost/ocake/uploads/berry.png"  alt="" />
                                                                    <img id="ball1" style="width:50px; height:50px; position:absolute" src="http://localhost/ocake/uploads/berry.png"  alt="" />
                                                                </div> -->
                                                            </form>
                                                        </div>
                                                        
                                                            <div class="product-grid-topbar" style="width:545px;"> 
                                                                <h6 class="m-0 font-weight-bold">Your Customize Cake</h6>
                                                            </div>
                                                        <!-- <div class="conteudo" id="conteudo"> -->
                                                        <form class="conteudo" id="conteudo" ondrop="drop(event)" ondragover="allowDrop(event)">
                                                                </form>

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
    
    <link rel="stylesheet" href="assets/css/copy.css" />
    <!-- <script src="assets/js/copy.js"></script> -->

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/tiny-slider.js"></script> -->
    <script src="assets/js/glightbox.min.js"></script>
    <!-- <script src="assets/js/main.js"></script> -->

<script>
    function myFunction(){
        document.getElementById("demo").innerHTML = "YOU CLICKED ME.";
    }
</script>

    <script>
        let currentDroppable = null;
        <?php foreach($custom_addons as $data){?>  
        <?php echo "addon".$data->add_ons_id;?>.onmousedown = function(event) {

        let shiftX = event.clientX - <?php echo "addon".$data->add_ons_id;?>.getBoundingClientRect().left;
        let shiftY = event.clientY -<?php echo "addon".$data->add_ons_id;?>.getBoundingClientRect().top;

        <?php echo "addon".$data->add_ons_id;?>.style.position = 'absolute';
        <?php echo "addon".$data->add_ons_id;?>.style.zIndex = 1000;
        document.body.append(<?php echo "addon".$data->add_ons_id;?>);

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            <?php echo "addon".$data->add_ons_id;?>.style.left = pageX - shiftX + 'px';
            <?php echo "addon".$data->add_ons_id;?>.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
        moveAt(event.pageX, event.pageY);

        <?php echo "addon".$data->add_ons_id;?>.hidden = true;
        let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
        <?php echo "addon".$data->add_ons_id;?>.hidden = false;

        if (!elemBelow) return;

        let droppableBelow = elemBelow.closest('.droppable');
        if (currentDroppable != droppableBelow) {
            if (currentDroppable) { // null when we were not over a droppable before this event
            leaveDroppable(currentDroppable);
            }
            currentDroppable = droppableBelow;
            if (currentDroppable) { // null if we're not coming over a droppable now
            // (maybe just left the droppable)
            enterDroppable(currentDroppable);
            }
        }
        }

        document.addEventListener('mousemove', onMouseMove);

        <?php echo "addon".$data->add_ons_id;?>.onmouseup = function() {
        document.removeEventListener('mousemove', onMouseMove);
        <?php echo "addon".$data->add_ons_id;?>.onmouseup = null;
        };

        };

        function enterDroppable(elem) {
            elem.style.background = 'pink';
        }

        function leaveDroppable(elem) {
            elem.style.background = '';
        }

        <?php echo "addon".$data->add_ons_id;?>.ondragstart = function() {
            return false;
        };
        <?php }?>
    </script>


</body>
</html>
