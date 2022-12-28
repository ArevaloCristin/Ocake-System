<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>` -->


  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="<?php echo $data->id?>">Open Modal</button>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="mt-2" action="product_update" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                    <label for="occasion">Occasion:</label><br>
                    <select name="occasion" class="form-control" id="occasion" value="<?php echo $data->occasion?>" >
                        <option value="Birthday">Birthday</option>
                        <option value="Christening">Christening</option>
                        <option value="Wedding">Wedding</option>
                        <option value="Graduation">Graduation</option>
                        <option value="Valentine">Valentine</option>
                        <option value="Halloween">Halloween</option>
                        <option value="Christmas">Christmas</option>
                        <option value="New Year">New Year</option>
                    </select>

                    <label for="status">Status:</label><br>
                        <select name="status" class="form-control" id="status">
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                    </select>

                    <label for="Flavor">Flavor:</label><br>
                    <input type="text" class="form-control" id="flavor" name="flavor" value="<?php echo $data->flavor?>" >

                    <label for="Price">Price:</label><br>
                    <input type="text" class="form-control " id="price" name="price" value="<?php echo $data->price?>" ><br>

                    <div class="mt-3">
                        <div id="alertMessage" class="alert alert-warning mb-3" style="display: none">
                            <span id="alertMsg"></span>
                        </div>
                        <div class="d-grid text-center">
                            <img class="mb-3" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/300" />
                        </div>
                        <div class="mb-3">
                            <input type="file" name="image" multiple="true" id="finput" onchange="onFileUpload(this);"
                                    class="form-control "  accept="image/*">
                        </div>
                    </div>

                    <input class="button btn btn-info btn-lg" type="submit" value="Add" name="submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> 
    </div>
</div>
  

<!-- </body>
</html> -->
