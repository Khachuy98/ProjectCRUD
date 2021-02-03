<?php
session_start();
require_once('./login/SessionError.php');
$fullnamee = $_SESSION['profile']['fullname'];
require_once('./database/data.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
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
          <div class="conten">
            <a style="float:right;margin:10px;text-align: center;">Xin chào! <?php echo $fullnamee; ?></a>
          </div>
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
        <h2>Danh Sách Sản Phẩm</h2>
      </div>
      <div class="title">
        <a href="./product/add.php" class="btn btn-primary" style="float:right;">Thêm Mới</a>
      </div>
    </div>

    <table class="table table-hover">
      <thead>
        <tr>
          <!-- <th><input type="checkbox" id="checkAl"> Select All</th> -->
          <th>ID</th>
          <th>Tên Sản Phẩm</th>
          <th>Thông Tin</th>
          <th>Giá</th>
          <th>Loại</th>
          <th>Ngày Tạo</th>
          <th>Ngày Cập Nhật</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sqlgetdataproduct = "SELECT p.id, p.namepro, p.description, p.price, c.name, p.created, p.modified
          FROM products AS p
          INNER JOIN categories AS c
          ON p.category_id = c.id;";
        $products = $db->getData($sqlgetdataproduct);
        foreach ($products as $products) {
        ?>
          <tr>
           <!-- <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id"]; ?>"></td> -->
            <td><?php echo $products['id'] ?></td>
            <td><?php echo $products['namepro'] ?></td>
            <td><?php echo $products['description'] ?></td>
            <td><?php $a = $products['price'];
                echo "$" . $a; ?></td>
            <td><?php echo $products['name'] ?></td>
            <td>
              <?php
              $date = date_create($products['created']);
              echo date_format($date, 'd-m-Y');
              ?>
            </td>
            <td>
              <?php
              $date = date_create($products['modified']);
              echo date_format($date, 'd-m-Y');
              ?>
            </td>
            <td>
              <a href="./product/read.php?id=<?php echo $products['id']; ?>" style="color:blue">
                <i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp
              <a href="./product/edit.php?id=<?php echo $products['id']; ?>" style="color:green">
                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
              <a href="./product/delete.php?id=<?php echo $products['id']; ?>" style="color:red" onclick="return confirm('Are you sure want to delete <?php echo $products['namepro'] ?>')">
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