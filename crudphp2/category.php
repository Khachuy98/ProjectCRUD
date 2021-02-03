<?php
  session_start();
  require_once('./login/SessionError.php');
  $fullnamee = $_SESSION['profile']['fullname'];
  require_once('./database/data.php');
?>
<?php
    $query = "SELECT * FROM categories";
    $resultctgr = $db->getData($query);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="container">
      <nav>
      <h2>Admin Management</h2>
        <ul>
          <li><a href="index.php">Sản phẩm</a></li>
          <li><a href="category.php">Loại sản phẩm</a></li>
          <li><a href="./login/logout.php">Thoát</a></li>
          <a style="float:right;margin:10px;text-align: center;">Xin chào! <?php echo $fullnamee;?></a>
        </ul>
      </nav>
    </div>
  </header>
<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg1']) == "view") {
        }
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
    <div class="lock">
      <div class="text">
        <h3>Danh sách loại sản phẩm</h3>
      </div>
      <div class="title">
        <a href="./product/add.php" class="btn btn-primary" style="float:right;">Thêm Mới</a>
      </div>
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên</th>
        <th>Ngày Tạo</th>
        <th>Ngày Cập Nhật</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($resultctgr as $categories) {
        ?>
        <tr>
          <td><?php echo $categories['id'] ?></td>
          <td><?php echo $categories['name'] ?></td>
          <td>
              <?php 
                  $date = date_create($categories['created']);
                  echo date_format($date, 'd-m-Y');
              ?>
          </td>
          <td>
              <?php 
                  $date = date_create($categories['modified']);
                  echo date_format($date, 'd-m-Y');
              ?>
          </td>
          
          <td>
            <a href="./category/readct.php?id=<?php echo $categories['id'];?>" style="color:blue">
              <i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp
            <a href="./category/edit1.php?id=<?php echo $categories['id'];?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="./category/delete.php?id=<?php echo $categories['id'];?>" style="color:red" onclick="return confirm('Are you sure want to delete <?php echo $categories['name'] ?>')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>