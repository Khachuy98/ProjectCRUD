<?php
    $id = $_GET['id'];
    require_once('../database/data.php');
    $sqlsl = "SELECT * FROM categories WHERE id = '$id'";
    $categories = $db->getData($sqlsl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $categories[0]["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Created</label>
                        <p class="form-control-static"><?php echo $categories[0]["created"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Modified</label>
                        <p class="form-control-static"><?php echo $categories[0]["modified"]; ?></p>
                    </div>
                    <p><a href="../category.php" class="btn btn-primary" style="float:right;">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>