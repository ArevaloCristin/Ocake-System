<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ocake - Category</title>

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
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $occasion; ?></h1>
                    <p class="mb-4"></p>

                    <!-- <?php //if($this->session->getFlashdata('msg')){?>
                        <div class="alert alert-danger mt-2"><?php //echo $this->session->getFlashdata('msg');?></div>
                    <?php //}?> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $occasion; ?> Cake</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Flavor</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Flavor</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $num = 1;
                                            foreach($product as $data){ ?>
                                        <tr>
                                            <td class="text-center"> <?php echo $num++; ?></td>
                                            <td class="text-center"><?php echo $data->flavor; ?></td>
                                            <td class="text-center">&#8369 <?php echo $data->price; ?></td>
                                            <td class="text-center"> <img
                                                    src="http://localhost/ocake/uploads/<?php echo $data->image;?>"
                                                    height="100px" width="150px" alt="image">
                                            </td>
                                            <td class="text-center"><?php echo $data->status; ?></td>
                                            <td>
                                                <div style="text-align:center">
                                                <a style="color:red; margin-right:5px; align-items:center" class="text-center"
                                                    href="<?php echo site_url('admin/category/delete_prod/'.$data->occasion.'/'.$data->id); ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                
                                                <button type="button" style="color:green; border:none; background:none;"
                                                    data-toggle="modal" data-target="#myModal<?php echo $data->id?>">
                                                    <i class='far fa-edit'></i>
                                                </button>
                                            </div>
                                                <div class="modal fade" id="myModal<?php echo $data->id?>"
                                                    role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Product</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="mt-2"
                                                                    action="<?php echo site_url('admin/category/update_prod/'.$data->occasion.'/'.$data->id); ?>"
                                                                    method="post" accept-charset="utf-8"
                                                                    enctype="multipart/form-data">
                                                                    <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>

                                                                    <label for="status">Status:</label><br>
                                                                    <select name="status" class="form-control"
                                                                        id="status">
                                                                        <option
                                                                            <?php if($data->status == "Available"){ echo "selected"; }?>
                                                                            value="Available">Available</option>
                                                                        <option
                                                                            <?php if($data->status == "Unavailable"){ echo "selected"; }?>
                                                                            value="Unavailable">Unavailable</option>
                                                                    </select>
                                                                    <input type="hidden" name="prod_id"
                                                                        value="<?php echo $data->id?>"><br>
                                                                    <label for="Flavor">Flavor:</label><br>
                                                                    <input type="text" class="form-control" id="flavor"
                                                                        name="flavor"
                                                                        value="<?php echo $data->flavor?>"><br>

                                                                    <label for="Price">Price:</label><br>
                                                                    <input type="text" class="form-control " id="price"
                                                                        name="price"
                                                                        value="<?php echo $data->price?>"><br>

                                                                    <div class="mt-3">
                                                                        <div id="alertMessage"
                                                                            class="alert alert-warning mb-3"
                                                                            style="display: none">
                                                                            <span id="alertMsg"></span>
                                                                        </div>
                                                                        <div class="d-grid text-center">
                                                                            <img class="mb-3" id="ajaxImgUpload"
                                                                                alt="Preview Image"
                                                                                src="http://localhost/ocake/uploads/<?php echo $data->image;?>"
                                                                                height='50%' width='50%' />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <input type="file" name="image"
                                                                                multiple="true" id="finput"
                                                                                onchange="onFileUpload(this);"
                                                                                class="form-control " accept="image/*">
                                                                        </div>
                                                                    </div>

                                                                    <input class="button btn btn-info btn-lg"
                                                                        type="submit" value="Save" name="submit">
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php } ?>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=site_url('logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('admin/include/photo-script'); ?>
    <?php echo view('admin/include/script'); ?>

</body>

</html>