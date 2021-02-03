<?php
  $id = $_GET['id'];
  require_once('../database/data.php');
  $sqlsl = "SELECT * FROM categories WHERE id = '$id'";
  $category = $db->getData($sqlsl);

  if(isset($_POST['update'])){
    $name = $_POST['uname'];
		$modified = $_POST['umodified'];
		if (!empty($_POST['update'])) {
			$query = "UPDATE categories SET name = '$name', modified = '$modified' WHERE id = '$id'";
			$sql = $db->update($query);
			if ($sql==true) {
			    header("Location: ../category.php?msg2=update");
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
      <input type="text" class="form-control" name="uname" value="<?php echo $category[0]['name']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="modified">Modified:</label>
      <input type="date" class="form-control" name="umodified" value="<?php echo $category[0]['modified']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;margin:10px;" value="Update">
      <p><a href="../category.php" class="btn btn-primary" style="float:right;margin:10px;">Back</a></p>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>