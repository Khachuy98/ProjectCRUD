<?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }
    require_once('../database/data.php');
    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $pass     = $_POST['password'];
        if(empty($username) || empty($pass)){
            $loi = "Vui lòng nhập đầy đủ thông tin!";
        }else{
            $sqlcheck = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
            $resultcheck = $db->query($sqlcheck);
            $num_row = mysqli_num_rows($resultcheck);
            if($num_row >0){
                echo '<script>alert("Đăng nhập thành công!"); window.location="../index.php";</script>';
                $rown = mysqli_fetch_assoc($resultcheck);
                $_SESSION['profile'] = $rown;
            }else{
                $loii = "Tài khoản hoặc mật khẩu không đúng";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style4.css">
</head>
<body>
    <form action="login.php" class="login-form" method="POST">
        <h1>Sign In</h1>
        <div class="textb">
            <input name="username" type="email" required>
            <div class="placehorder">Username</div>
        </div>
        <div class="textb">
            <input name="password" type="password" required name="p">
            <div class="placehorder">Password</div>
            <div class="show-password fas fa-eye-slash"></div>
        </div>
            <div class="checkbox">
            <input type="checkbox">
            <div class="fas fa-check"></div>
            Remember me
        </div>
        <button name="btn_login" class="btn fas fa-arrow-right" disabled></button>
        <h2 style = "color:red;font-family: sans-serif;font-size: 14px; text-align: center;"><?php
            if(isset($loii)) echo $loii; if(isset($loiii)) echo $loiii;
            ?></h2><br>
        <a href="register.php">Can't Sign in?</a>
        <a href="register.php">Create Account</a>
    </form>
<script>
    var fields = document.querySelectorAll(".textb input");
    var btn = document.querySelector(".btn");
    function check(){
        if(fields[0].value != "" && fields[1].value != "")
            btn.disabled = false;
        else
            btn.disabled = true;
    }
    fields[0].addEventListener("keyup",check);
    fields[1].addEventListener("keyup",check);

    document.querySelector(".show-password").addEventListener("click",
    function(){
        if (this.classList[2] == "fa-eye-slash"){
            this.classList.remove("fa-eye-slash");
            this.classList.add("fa-eye");
            fields[1].type ="text";
        }else{
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
            fields[1].type ="password";
        }
    });
</script>
</body>
</html>
<?php
    if(isset($_POST['sb'])){
        $u = $_POST['u'];
        $p = $_POST['p'];
        if($u == 'admin' && $p == '123'
        ){
            header('location: index.php');
        }else{
            $loi = "Tài khoản hoặc mật khẩu không đúng";
            echo $loi;
        }
    }
?>