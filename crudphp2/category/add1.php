<?php
  require_once('../database/data.php');
  if(isset($_POST['btn_addpro'])){
    $name = $_POST['name'];
		$created = $_POST['created'];
		$query="INSERT INTO categories(name,created) VALUES('$name','$created')";
		$sql = $db->add($query);
			if ($sql==true) {
			    header("Location: ../category.php?msg1=insert");
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
  <h4>Add Category</h4>
</div><br> 

<div class="container">
  <form action="add1.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="created">Created:</label>
      <input type="date" class="form-control" name="created" placeholder="Choese date" required="">
    </div> 
    <input type="submit" name="btn_addpro" class="btn btn-primary" style="float:right;margin:10px;" value="Submit">
    <p><a href="../category.php" class="btn btn-primary" style="float:right;margin:10px;">Back</a></p>
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