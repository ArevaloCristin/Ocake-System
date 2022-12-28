<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function onFileUpload(input, id) {
            id = id || '#ajaxImgUpload';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result).width(300)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#upload_image_form').on('submit', function (e) {
                $('.uploadBtn').html('Uploading ...');
                $('.uploadBtn').prop('Disabled');
                e.preventDefault();
                if ($('#file').val() == '') {
                    alert("Choose File");
                    $('.uploadBtn').html('Upload');
                    $('.uploadBtn').prop('enabled');
                    document.getElementById("upload_image_form").reset();
                } else {
                    $.ajax({
                        url: "<?php echo base_url(); ?>/AjaxFileUpload/upload",
                        method: "POST",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        success: function (res) {
                            console.log(res.success);
                            if (res.success == true) {
                                $('#ajaxImgUpload').attr('src', 'https://via.placeholder.com/300');
                                $('#alertMsg').html(res.msg);
                                $('#alertMessage').show();
                            } else if (res.success == false) {
                                $('#alertMsg').html(res.msg);
                                $('#alertMessage').show();
                            }
                            setTimeout(function () {
                                $('#alertMsg').html('');
                                $('#alertMessage').hide();
                            }, 4000);
                            $('.uploadBtn').html('Upload');
                            $('.uploadBtn').prop('Enabled');
                            document.getElementById("upload_image_form").reset();
                        }
                    });
                }
            });
        });
    </script>