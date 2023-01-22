<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ocake - Orders</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="http://localhost/ocake/css/sb-admin-2.min.css" rel="stylesheet">


</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php echo view('admin/include/sidebar'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php echo view('admin/include/topbar'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                    <p class="mb-4"></p>

                    <!-- <?php //if($this->session->getFlashdata('msg')){?>
                        <div class="alert alert-danger mt-2"><?php //echo $this->session->getFlashdata('msg');?></div>
                    <?php //}?> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <!-- <th>image</th> -->
                                            <th>Order by</th>
                                            <th>Items</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th >Order Code</th>
                                            <!-- <th>image</th> -->
                                            <th>Order by</th>
                                            <th>Items</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php $num = 1; foreach($order as $data){?>
                                        <tr>
                                            <td class="text-center"> <?php echo $num++; ?></td>
                                            <td class="text-center"><?=$data->order_code?></td>
                                            <td class="text-center"><?=$data->firstname?> <?=$data->lastname?></td>
                                            <td class="text-center"><?=$data->items?>
                                                <?php if ($data->items > 1){
                                                   echo "Items";
                                                }else{
                                                    echo "Item";
                                                }?>
                                            </td>
                                            <td class="text-center"><?='&#8369;' . number_format ($data->total_price);?></td>
                                            <td> 
                                                <div style="text-align:center">
                                                    <input class="" type="button" 
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
                                            </td>
                                            <td>
                                                <div style="text-align:center">
                                                    <!-- <span><input class="btn btn-success" type="button" style="justify-content:center" value="Items"
                                                        data-toggle="modal" data-target="#ModalItems<?//php echo $data->checkout_id;?>"></span>
                                                    <input class="btn btn-info" type="button" style="justify-content:center" value="Details"
                                                        data-toggle="modal" data-target="#myModal<?//php echo $data->checkout_id;?>"> -->
                                                <button class="center" type="button" style="justify-content:center; color:#dc1877; border:none; background:none;"
                                                    data-toggle="modal" data-target="#ModalItems<?php echo $data->checkout_id;?>">
                                                    <i class='fas fa-birthday-cake'></i>
                                                </button>
                                                <button class="center" type="button" style="justify-content:center; color:#007bff; border:none; background:none;"
                                                    data-toggle="modal" data-target="#myModal<?php echo $data->checkout_id;?>">
                                                    <i class='fas fa-clipboard-list'></i>
                                                </button>
                                                </div>
                                                <!-- Modal For Order Items-->
                                                    <div class="modal fade"  id="ModalItems<?php echo $data->checkout_id;?>" role="dialog">
                                                        <div class="modal-dialog" >
                                                                <!-- Modal content-->
                                                            <div class="modal-content" style="width:600px">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Order Items</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <?php foreach($details as $datum){?>
                                                                                <?php if($data->order_code==$datum->order_code) {?>
                                                                                    <div class="p-3">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6 col-12">
                                                                                                <?php if($datum->is_customized == 0) {?>
                                                                                                    <img style="height:160px" src="http://localhost/ocake/uploads/<?php echo $datum->image;?>" alt="<?php echo $datum->flavor;?>">
                                                                                                <?php }else{?>
                                                                                                    <img style="height:160px" src="<?php echo $datum->image;?>" alt="<?php echo $datum->flavor;?>">
                                                                                                <?php }?><br>
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-12">
                                                                                                <span><b>Ocassion:</b> <?php echo $datum->occasion; ?> Cake</span><br>
                                                                                                <span><b>Flavor:</b> <?php echo $datum->flavor; ?> Flavor</span><br>
                                                                                                <span><b>Price:</b> <?php echo '&#8369;' . number_format ($datum->price); ?></span><br>
                                                                                                <span><b>Quantity:</b> x<?php echo $datum->quantity; ?></span><br>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- Modal For Order Details-->
                                                <?php foreach($details as $datum){?>
                                                    <div class="modal fade"  id="myModal<?php echo $data->checkout_id;?>" role="dialog">
                                                        <div class="modal-dialog" >
                                                                <!-- Modal content-->
                                                            <div class="modal-content" style="width:600px">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Order Details</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="mt-2"
                                                                            action="<?php echo site_url('order/update_order/'.$data->checkout_id); ?>"
                                                                            method="post" accept-charset="utf-8"
                                                                            enctype="multipart/form-data">
                                                                            <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                                            
                                                                            <div class="mb-3">
                                                                                <div class="product-details-info">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-12">
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <span><b>Name:</b> </span><?php echo $data->firstname?> <?php echo $data->lastname?><br>
                                                                                                <span><b>Contact:</b> </span><?php echo $data->mobile?><br>
                                                                                                <span><b>Purchased Items:</b> </span><?php echo $data->items?><br>
                                                                                                <span><b>Total Price:</b> </span><?php echo '&#8369;' . number_format ($data->total_price)?><br>
                                                                                                <span><b>Status:</b> </span><?php echo $data->stat?><br>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-12">
                                                                                            <div class="info-body custom-responsive-margin">
                                                                                                <span><b>Order ID:</b> </span><?php echo $data->order_code?><br>
                                                                                                <span><b>Payment Method:</b> </span><?php echo $data->payment_method?><br>
                                                                                                <span><b>Delivery Method:</b> </span><?php echo $data->delivery_method?><br>
                                                                                                <span><b>Scheduled Delivery Date:</b> </span><?php echo $data->date?><br>
                                                                                                <span><b>Address:</b> </span><?php echo $data->street?>, <?php echo $data->barangay?>, <?php echo $data->municipality?><br>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                           
                                                                                <label for="stat">Status:</label><br>
                                                                                <select name="stat" class="form-control" id="stat">
                                                                                    <option
                                                                                        <?php if($data->stat == "Pending"){ echo "selected"; }?>
                                                                                        value="Pending">Pending</option>
                                                                                    <option
                                                                                        <?php if($data->stat == "Confirmed"){ echo "selected"; }?>
                                                                                        value="Confirmed">Confirmed</option>
                                                                                    <option
                                                                                        <?php if($data->stat == "Processing"){ echo "selected"; }?>
                                                                                        value="Processing">Processing</option>
                                                                                    <option
                                                                                        <?php if($data->stat == "Shipped"){ echo "selected"; }?>
                                                                                        value="Shipped">Shipped</option>
                                                                                    <option
                                                                                        <?php if($data->stat == "Delivered"){ echo "selected"; }?>
                                                                                        value="Delivered">Delivered</option>
                                                                                    <option hidden
                                                                                        <?php if($data->stat == "Completed"){ echo "selected"; }?>
                                                                                        value="Completed">Completed</option>
                                                                                    
                                                                                    <option hidden
                                                                                        <?php if($data->stat == "Cancelled"){ echo "selected"; }?>
                                                                                        value="Cancelled">Cancelled</option>
                                                                                </select>
                                                                            </div>
                                                                            <input class="button btn btn-info btn-lg" style="float:right"
                                                                                type="submit" value="Update" name="submit">
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 
                                            </td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php echo view('admin/include/footer'); ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php echo view('admin/include/logout-modal'); ?>
    <?php echo view('admin/include/photo-script'); ?>
    <?php echo view('admin/include/script'); ?>

</body>

</html>
