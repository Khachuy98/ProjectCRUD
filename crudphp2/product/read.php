<?php
//     $id = $_GET['id'];
//   include 'customers.php';
//   $productsObj = new Products();
  
  //$sqlread = "SELECT * FROM customer WHERE id = '$idd'";
//   $products = $productsObj->displyaRecordById($id);
  //$customerObj = new Customers();
//   if(isset($_GET['viewId']) && !empty($_GET['viewId'])) {
//     $viewId = $_GET['viewId'];
//     $customer = $customerObj->displyaRecordById($viewId);
//   }
    $id = $_GET['id'];
    require_once('../database/data.php');
    $sqlread = "SELECT p.id, p.namepro, p.description, p.price, c.name, p.created, p.modified
    FROM products AS p
    INNER JOIN categories AS c
    ON p.category_id = c.id WHERE p.id = '$id'";
    $products = $db->getData($sqlread);
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
                        <p class="form-control-static"><?php echo $products[0]["namepro"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p class="form-control-static"><?php echo $products[0]["description"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $products[0]["price"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Category-ID</label>
                        <p class="form-control-static"><?php echo $products[0]["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Created</label>
                        <p class="form-control-static"><?php echo $products[0]["created"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Modified</label>
                        <p class="form-control-static"><?php echo $products[0]["modified"]; ?></p>
                    </div>
                    <p><a href="../index.php" class="btn btn-primary" style="float:right;">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>