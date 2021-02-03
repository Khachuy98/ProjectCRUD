<?php
    $id = $_GET['id'];
    require_once('../database/data.php');
    $sqlgetdataproduct = "SELECT p.id, p.namepro, p.category_id, p.description, p.price, c.name, p.created, p.modified
    FROM products AS p
    INNER JOIN categories AS c
    ON p.category_id = c.id WHERE p.id = '$id'";
    $products = $db->getData($sqlgetdataproduct); 
    $idcate = $products[0]['category_id'];
    
    if(isset($_POST['update'])){
      $name = $_POST['uname'];
      $description = $_POST['udescription'];
      $price = $_POST['uprice'];
      $category_id = $_POST['category_id'];
      $modified = $_POST['umodified'];
      if (!empty($_POST['update'])) {
        $query = "UPDATE products SET namepro = '$name', description = '$description'
        , price = '$price', category_id = '$category_id', modified = '$modified' WHERE id = '$id'";
        $sql = $db->update($query);
        if ($sql==true) {
          header("Location: ../index.php?msg2=update");
        }else{
          echo "Registration updated failed try again!";
        }
      }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Edit Information</h4>
</div><br> 

<div class="container">
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="uname" value="<?php echo $products[0]['namepro']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="description" class="form-control" name="udescription" value="<?php echo $products[0]['description']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" class="form-control" name="uprice" value="<?php echo $products[0]['price']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Loại</label>
      <select class="form-control" id="exampleFormControlSelect1" name="category_id">
      <?php
        $sqlcate = "SELECT * FROM categories";
        $resultcate = $db->getData($sqlcate);
        foreach($resultcate as $row){?>
        <option value="<?php echo $row['id'];?>"
        <?php if($row['id'] == $idcate){echo "selected";}?>>
        <?php echo $row['name'];?></option>
        <?php } ?> 
        </select>
    </div>
    <div class="form-group">
      <label for="modified">Modified:</label>
      <input type="date" class="form-control" name="umodified" value="" required>
    </div>
    <div class="form-group">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;margin:10px;" value="Update">
      <p><a href="../index.php" class="btn btn-primary" style="float:right;margin:10px;">Back</a></p>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>