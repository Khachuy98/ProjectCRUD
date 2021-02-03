<?php
  require_once('../database/data.php');

    if(isset($_POST["submit_regis"])){
      $username = $_POST['username'];
      $fullname = $_POST['fullname'];
      $password = $_POST['password'];
      $confirm = $_POST['confirm'];
      if(empty($username) || empty($password) || empty($fullname) || empty($confirm)){
        $error = "Vui lòng điền đầy đủ thông tin";
      }else{
        $sqlt= "SELECT * FROM user WHERE username = '$username'";
        $result = $db->query($sqlt);
        $num_row = mysqli_num_rows($result);
        if($num_row >0){
          $loii = "Tài khoản đã tồn tại!";
        }else{
          if($password == $confirm){
            $sqlISusers = "INSERT INTO `user` (`username`, `password`, `fullname`, `status`)
            VALUES ('$username','$confirm', '$fullname',  '1')";
            $resultISusers = $db->add($sqlISusers);
            echo '<script>alert("Tạo tài khoản thành công!"); window.location="login.php";</script>';
          }else{
            $loiii = "Mật khẩu không trùng khớp!";
          }
          
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
  <div id="registerform">
      <h1 style="text-align: center;">Đăng kí</h1>
      <form action='' method="POST">
        <input name="username" id="txtbox" type="email" placeholder="Username" value=""require>
        <input name="fullname" id="txtbox" type="text" placeholder="Fullname" value=""require>
        <input name="password" id="txtbox" type="password" placeholder="Password" value=""require>
        <input name="confirm" id="txtbox" type="password" placeholder="Confirm Password" value=""require>
        <p>I agree to</p><a href="#"> terms and condition.</a>
        <input name="submit_regis" id="btn" type="submit" value="Đăng kí"/>
        <h2 style = "color:red; text-align: center;"><?php if(isset($error))echo $error;
          if(isset($loii)) echo $loii; if(isset($loiii)) echo $loiii;
          ?></h2><br>
        <a href="login.php">Already  have a account?</a>
        <a href="login.php">Cancel</a>
      </form>
  </div>
</body>
</html>