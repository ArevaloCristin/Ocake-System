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
                                            <td class="text-center"><?=$data->items;?>
                                                <?php if ($cart_count > 1){
                                                   echo "Items";
                                                }else{
                                                    echo "Item";
                                                }?>
                                            </td>
                                            <!-- <td class="text-center"><img style="height:30px" src="http://localhost/ocake/uploads/<?//php echo $data->image;?>" alt="" srcset=""></td> -->
                                            <!-- <td class="text-center"><?//=$data->quantity;?></td> -->
                                            <td class="text-center"><?=$data->total_price;?></td>
                                            <td class="text-center"><?=$data->stat;?></td>
                                            <td>
                                                <div style="text-align:center">
                                                <button class="center" type="button" style="justify-content:center; color:#3388FF; border:none; background:none;"
                                                    data-toggle="modal" data-target="#myModal<?php echo $data->checkout_id;?>">
                                                    <i class='fas fa-eye'></i>
                                                </button>
                                                </div>
                                                <?php foreach($details as $data){?>
                                                    <div class="modal fade" id="myModal<?php echo $data->checkout_id;?>"
                                                        role="dialog">
                                                        <div class="modal-dialog" >
                                                                <!-- Modal content-->
                                                            <div class="modal-content">
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
                                                                                <label for="Order ID">Order ID: <?php echo $data->checkout_id?></label><br>
                                                                                <label for="Name">Customer Name: <?php echo $data->firstname?> <?php echo $data->lastname?>  </label><br>
                                                                                <label for="Address">Address: <?php echo $data->mobile?></label><br>
                                                                                <label for="Phone Number">Phone Number: </label><br>
                                                                                <label for="Purchased Items">Purchased Items: <?php echo $data->quantity?></label><br>
                                                                                <label for="Total Price">Total Price: <?php echo $data->total_price?></label><br>
                                                                                <label for="Payment Method">Payment Method: <?php echo $data->payment_method?></label><br>
                                                                                <label for="Delivery Method">Delivery Method: <?php echo $data->delivery_method?></label><br>
                                                                                <label for="Scheduled Delivery Date">Scheduled Delivery Date: <?php echo $data->date?></label><br>
                                                                                <label for="Scheduled Delivery Date">Order Status: <?php echo $data->stat?></label><br>
                                                                                <label for="stat">Status:</label><br>
                                                                                <select name="stat" class="form-control"
                                                                                    id="stat">
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
