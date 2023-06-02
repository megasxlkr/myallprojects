<!doctype html>
<html lang="en">
<head>
    <title>PHP Mysql PDO Image Upload and Insert with validation and preview</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include("save.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">PHP Mysql PDO Image Upload and Insert with validation and preview</h3>
                    </div>
                    <div class="card-body">
                        <!-- response messages -->
                        <?php if(!empty($resMessage)) {?>
                            <div class="alert <?php echo $resMessage['status']?>">
                                <?php echo $resMessage['message']?>
                            </div>
                        <?php }?>
                        <form action="" method="post" enctype="multipart/form-data" class="mb-3">
                            <div class="user-image mb-3 text-center">
                                <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
                                    <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
                                </div>
                            </div>
                            <div class="custom-file">
                                <div class="input-group mb-3">
                                  <input type="file" name="fileUpload" class="form-control" id="chooseFile">
                                  <label class="input-group-text" for="chooseFile">Select file</label>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">
                                Upload File
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPlaceholder').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#chooseFile").change(function () {
            readURL(this);
        });
    </script>
</body>
</html>