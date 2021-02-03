<?php
    require_once('../database/data.php');

      if(isset($_POST['btn_addpro'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $created = $_POST['created'];
        // $modified = $this->con->real_escape_string($_POST['modified']);
        $query="INSERT INTO products(namepro,description,price,category_id,created) VALUES('$name','$description','$price','$category_id','$created')";
        $sql = $db->add($query);
        if ($sql==true) {
            header("Location: ../index.php?msg1=insert");
        }else{
            echo "Registration failed try again!";
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Thêm Sản Phẩm</h4>
</div><br> 

<div class="container">
  <form action="add.php" method="POST">
    <div class="form-group">
      <label for="name">Tên Sản Phẩm:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="description">Thông tin:</label>
      <input type="text" class="form-control" name="description" placeholder="Enter description" required="">
    </div>
    <div class="form-group">
      <label for="price">Giá:</label>
      <input type="text" class="form-control" name="price" placeholder="Enter price" required="">
    </div>
    <div class="form-group">
      <label for="category">Loại Sản Phẩm:</label>
      <select name="category_id">
        <option value="0">--Chọn--</option>
        <?php
            $sqlct = "SELECT * FROM categories";
            $resultct = $db->getData($sqlct);
            foreach($resultct as $rowadd){
        ?>
        <option value="<?php echo $rowadd['id'];?>"><?php echo $rowadd['name']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="created">Ngày Tạo:</label>
      <input type="date" class="form-control" name="created" placeholder="Choese date" required="">
    </div> 
    <input type="submit" name="btn_addpro" class="btn btn-primary" style="float:right;margin:10px;" value="Submit">
    <p><a href="../index.php" class="btn btn-primary" style="float:right;margin:10px;">Back</a></p>
    <p><a><input type="reset" class="btn btn-primary" style="float:right;margin:10px;" value="Reset"></a></p>
  </form>
      <div class="container">
        <?php
          if (isset($loi) == "insert") {
            echo $loi;
          } 
          if (isset($loii) == "view") {
            echo $loii;
          }
        ?>
      </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>