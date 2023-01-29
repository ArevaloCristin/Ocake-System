<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ocake - AddOns Customization</title>

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
                <h1 class="h3 mb-2 text-gray-800">Customization/Add AddOns</h1>
                    <p class="mb-2"></p>

                        <div style="text-align:center">
                            <button type="button" class="btn btn-success btn-lg" style="color:success; float:right; width:150px"
                                data-toggle="modal" data-target="#myModal1">+ Add
                            </button>
                        </div><br><br>
                        <!-- Modal For Add Flavor -->
                            <div class="modal fade" id="myModal1"
                                role="dialog">
                                <div class="modal-dialog" >
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add AddOns</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <?php $validation = \Config\Services::validation();?>
                                            <form class="container mt-2" action="add_addons" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>

                                                <label for="status">Status:</label>
                                                <select name="addons_status" class="form-control" id="addons_status">
                                                    <option value="Available">Available</option>
                                                    <option value="Unavailable">Unavailable</option>
                                                </select>
                                                <!--ERROR--->
                                                <?php if($validation->getError('status')){?>
                                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('status');?></div>
                                                <?php }?>
                                                
                                                <label for="Description">Description:</label>
                                                <input type="text" class="form-control" id="description" name="description">
                                                <!--ERROR--->
                                                <?php if($validation->getError('description')){?>
                                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('description');?></div>
                                                <?php }?>

                                                <label for="Stock">Stock:</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity">
                                                <!--ERROR--->
                                                <?php if($validation->getError('quantity')){?>
                                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('quantity');?></div>
                                                <?php }?>
                                                
                                                <label for="Price">Price:</label>
                                                <input type="text" class="form-control" id="price" name="price"><br>
                                                <!--ERROR--->
                                                <?php if($validation->getError('price')){?>
                                                    <div class="alert alert-danger mt-2"><?php echo $error=$validation->getError('price');?></div>
                                                <?php }?>
                                                
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

                                                <input class="btn btn-success btn-lg" type="submit" value="Add" name="submit" style="width:150px">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   
                    <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"></h1>
                        <p class="mb-4"></p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Cake Add Ons</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <!-- <th>Stock</th> -->
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <!-- <th>Stock</th> -->
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody>
                                            
                                            <?php $num = 1;
                                            foreach($addons as $data){?>
                                                <tr>
                                                    <td class="text-center"> <?php echo $num++; ?></td>
                                                    <td class="text-center"><img style="height:30px" src="http://localhost/ocake/uploads/<?php echo $data->image;?>" alt="" srcset=""></td>
                                                    <!-- <td class="text-center"><?=$data->quantity;?></td> -->
                                                    <td class="text-center"><?=$data->description;?></td>
                                                    <td class="text-center"><?='&#8369;' . number_format ($data->price);?></td>
                                                    <td>
                                                        <div style="text-align:center">
                                                            <input class="" type="button" 
                                                            style="justify-content:center; border-radius:5px; color:#ffffff;
                                                                <?php if($data->addons_status=="Available"){
                                                                    echo "background-color:#25b831; border-color:#25b831";
                                                                }elseif($data->addons_status=="Unavailable"){
                                                                    echo "background-color:#ed2f2f; border-color:#ed2f2f";
                                                                } ?>
                                                            " value="<?=$data->addons_status;?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="text-align:center">
                                                        <button class="center" type="button" style="justify-content:center; color:green; border:none; background:none;"
                                                            data-toggle="modal" data-target="#Modal<?php echo $data->add_ons_id;?>">
                                                            <i class='far fa-edit'></i>
                                                        </button>
                                                        </div>
                                                            <div class="modal fade" id="Modal<?php echo $data->add_ons_id;?>"
                                                                role="dialog">
                                                                <div class="modal-dialog" > -->
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Edit Customization-AddOns</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="mt-2"
                                                                                action="<?php echo site_url('admin/customization/update_addons/'.$data->add_ons_id); ?>"
                                                                                method="post" accept-charset="utf-8"
                                                                                enctype="multipart/form-data">
                                                                                <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                                                <div class="mb-2">

                                                                                    <input type="hidden" name="add_ons_id"
                                                                                        value="<?php echo $data->add_ons_id?>">

                                                                                    <label for="status">Status:</label>
                                                                                    <select name="addons_status" class="form-control"
                                                                                        id="addons_status">
                                                                                        <option
                                                                                            <?php if($data->addons_status == "Available"){ echo "selected"; }?>
                                                                                            value="Available">Available</option>
                                                                                        <option
                                                                                            <?php if($data->addons_status == "Unavailable"){ echo "selected"; }?>
                                                                                            value="Unavailable">Unavailable</option>
                                                                                    </select>

                                                                                    <label for="Description">Description:</label>
                                                                                    <input type="text" class="form-control " id="description"
                                                                                        name="description"
                                                                                        value="<?php echo $data->description?>">


                                                                                    <!-- <label for="Stock">Stock:</label>
                                                                                    <input type="text" class="form-control" id="quantity"
                                                                                        name="quantity"
                                                                                        value="<?//php echo $data->quantity?>"> -->

                                                                                    <label for="Price">Price:</label><br>
                                                                                    <input type="text" class="form-control " id="price"
                                                                                        name="price"
                                                                                        value="<?php echo $data->price?>">

                                                                                </div>
                                                                    
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
                                                                                            class="form-control form-control-lg " accept="image/*">
                                                                                    </div>
                                                                                </div>

                                                                                <input class="button btn btn-info btn-lg" style="width:150px"
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
                                                        </td>
                                                        <td class="text-center">
                                                            <a style="color:red; margin-right:5px" class="text-center"
                                                            href="<?php echo site_url('admin/customization/delete_addons/' . $data->add_ons_id); ?>">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
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
