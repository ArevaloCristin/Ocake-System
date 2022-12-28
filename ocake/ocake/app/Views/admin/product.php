<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ocake - Product</title>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="http://localhost/ocake/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container { max-width: 750px }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php echo view('admin/include/sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">                
                <?php echo view('admin/include/topbar'); ?>
                <div class="container-fluid">

                    <h1 class="h3 mb-2 text-gray-800">Add Product</h1>
                    <p class="mb-4"></p>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation();?>
                                <!-- DATA INSERT HERE -->
                            <form class="container mt-2" action="add_product" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                <label for="occasion">Occasion:</label><br>
                                <select name="occasion" class="form-control" id="occasion">
                                    <option value="Birthday">Birthday</option>
                                    <option value="Christening">Christening</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Graduation">Graduation</option>
                                    <option value="Valentine">Valentine</option>
                                    <option value="Halloween">Halloween</option>
                                    <option value="Christmas">Christmas</option>
                                    <option value="New Year">New Year</option>
                                </select>
                                <!--ERROR--->
                                <?php if($validation->getError('occassion')){?>
                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('occassion');?></div>
                                <?php }?><br>

                                <label for="status">Status:</label><br>
                                <select name="status" class="form-control" id="status">
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select>
                                <!--ERROR--->
                                <?php if($validation->getError('status')){?>
                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('status');?></div>
                                <?php }?><br>

                                <label for="Flavor">Flavor:</label><br>
                                <input type="text" class="form-control" id="flavor" name="flavor">
                                <!--ERROR--->
                                <?php if($validation->getError('flavor')){?>
                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('flavor');?></div>
                                <?php }?><br>

                                <label for="Price">Price:</label><br>
                                <input type="text" class="form-control form-control-lg" id="price" name="price"><br>
                                <!--ERROR--->
                                <?php if($validation->getError('price')){?>
                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('price');?></div>
                                <?php }?>
                                <br>

                                <div class="container mt-3">
                                    <div id="alertMessage" class="alert alert-warning mb-3" style="display: none">
                                        <span id="alertMsg"></span>
                                    </div>
                                    <div class="d-grid text-center">
                                        <img class="mb-3" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/300" />
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="image" multiple="true" id="finput" onchange="onFileUpload(this);"
                                            class="form-control form-control-lg"  accept="image/*">
                                    </div>
                                    <!--ERROR--->
                                    <?php if($validation->getError('image')){?>
                                        <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('image');?></div>
                                    <?php }?>
                                </div>

                                <input class="btn btn-success btn-lg" type="submit" value="Add" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End of Main Content -->
            <?php echo view('admin/include/footer'); ?>
        </div>
    </div>

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