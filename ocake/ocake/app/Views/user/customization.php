<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/html2canvas.js"></script>
<script src="assets/js/html2canvas.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="breadcrumbs mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"><?//php echo $occasion?> Start Design</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="javascript:void(0)">Customization</a></li>
                        <li>Start Design</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5" >
    <div class="row">
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Price Table</h5>
                </div>
                <div class="card-body p-table overflow-auto">
                    <div class="p-1 d-flex cake-layer-item items">
                            <div class="p-1 image-card">
                                <img  style="width:30px; height:30px" src="https://png.pngtree.com/element_our/20190529/ourmid/pngtree-black-and-white-line-drawing-three-layer-cake-vector-icon-material-image_1197067.jpg"  alt="" />
                            </div>
                            <div class="p-1">
                                <span>
                                <p class="cake-layer-quantity">Cake layer (x1)</p><span>
                                <p class="cake-price-label">₱300.00</p>
                                </span>
                            </div>
                        </div>
                        <div class="p-1" id="price_table"></div>
                        <div class="p-1">
                            <h5 class="total-label" style="text-align:right">Total: ₱300.00</h5>
                        </div>
                </div>
            </div>
            <div class="p-2">
                <button class="btn btn-primary btn-lg"  onclick="createCakePrev()" style="width:100px" data-bs-toggle="modal" data-bs-target="#designModal">Save</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="cake-container">
                <div id="base">
                    <div id="cake"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 tool-bars overflow-auto">
            <h3>Tools</h3>
            <div class="p-2">
                <div class="mb-1"><p class="tool-headers">Addons</p></div>
                 <div class="tool-container d-flex flex-wrap" id="draggable-container">
                    <!-- <div class="draggable">
                        <img src="https://parspng.com/wp-content/uploads/2022/05/orangepng.parspng.com_-1-600x600.png" alt="img" height='50' width='50'>
                    </div>
                    <div class="draggable">
                        <img src="https://www.pngarts.com/files/3/Cherry-PNG-Pic.png" alt="img" height='50' width='50'>
                    </div> -->
                    <?php foreach($custom_addons as $data){?>
                        <div class="draggable" data-id="<?=$data->add_ons_id;?>" data-name="<?=$data->description;?>" data-price="<?=$data->price;?>" data-src="http://localhost/ocake/uploads/<?php echo $data->image;?>">
                            <img id="<?php echo "addon".$data->add_ons_id;?>" style="width:50px; height:50px" 
                                                                            src="http://localhost/ocake/uploads/<?php echo $data->image;?>"  alt="" />
                    </div>
                    <?php }?>
                </div>
            </div>
           <div class="p-2">
                <div class="mb-1"><p class="tool-headers">Shape</p></div>
                 <div class="tool-container d-flex flex-wrap" id="draggable-container">
                    <div class="p-1">
                        <a type="button" class="shape-button" data-id="1" href="javascript:void(0)" >
                            <div id="circle"></div>
                        </a> 
                    </div>
                    <div class="p-1">
                        <a type="button" class="shape-button" data-id="3" href="javascript:void(0)" >
                        <div id="square"></div>
                        </a>
                    </div>
                    <div class="p-1">
                        <a type="button" class="shape-button" data-id="2" href="javascript:void(0)">
                        <div id="rectangle"></div>
                        </a>
                    </div>
                    <div class="p-1">
                        <a type="button" class="shape-button" data-id="4" href="javascript:void(0)">
                        <div id="heart"></div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="p-2">
                <div class="mb-0"><p class="tool-headers">Layer</p></div>
                <div class="tool-container">
                    <div class="p-0 d-flex">
                        <div class="p-2">
                            <input type="text" class="form-control quant-input">
                        </div>
                        <div class="p-2">
                            <button class="quantity-button" id="addLayer"><i class="fa-regular fa-plus"></i></button>
                        </div>
                        <div class="p-2">
                            <button class="quantity-button" id="removeLayer"><i class="fa-solid fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="p-1">
                        <div class="d-flex flex-column" id="layers"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="designModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Your Design</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <div class="d-flex">
            <div class="p-2 flex-fill" id="designPreview"></div>
            <div class="p-2 flex-fill">
                <input type="hidden" id="user_id" value="<?=$user_id?>">
                <div class="mb-3">
                    <label class="form-label">Flavor</label>
                    <select class="form-control" id="flavor">
                        <?php $x = 0;?>
                            <?php foreach($custom_flavor as $data){?>
                                <?php if($x == 0) {?>
                                <option selected><?php echo $data->flavor;?></option>
                                <?php } else{?>
                                    <option><?php echo $data->flavor;?></option>
                                <?php }?>
                            <?php $x++; }?>
                        </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cake Message</label>
                    <textarea class="form-control" id="cake_message" cols="30" rows="5"></textarea>
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" id="status">
                        <option selected>Available</option>
                        <option >Unavailable</option>
                    </select>
                </div> -->
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" disabled="true">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveCake">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
    [...document.querySelectorAll('[data-bs-toggle="popover"]')]
  .forEach(el => new bootstrap.Popover(el))

//   window.onbeforeunload = function () {
//   // alert user when trying to reload page. This will prevent design loss
//   return "Data will be lost if you leave the page, are you sure?";
// };
</script>



