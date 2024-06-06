<!DOCTYPE html>
<html lang="en">
<head>
    <!-- LOGO -->
    <link rel="icon" type="image/x-icon" href="images/RPBS.png">
    <!-- LOGO END -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | RP Business Solutions LLP. Pune | Digital | IT Solution  </title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="assets/css/login.css">
    
</head>
<body>
   <header class="header-area header-sticky shadow p-2 mb-2" data-wow-duration="0.75s" data-wow-delay="0s" style="z-index: 999;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                         <img src="images/RPBS.png" style="height:50px; width: 60px; margin-top: 10px;" > Back to Home 
                    </a>
                 </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->


<?php

session_start();
// include("contact.php");
if (isset($_POST['submit'])){

$admin_name = $_POST["admin_name"];
$password = $_POST["password"];

$sql = "SELECT * FROM admin WHERE admin_name='$username' AND password='$password'";
$result = $conn->query($sql);

if($result-> num_rows > 0){
$_SESSION['admin_name']= $admin_name;
header("location:login_process.php");
die;
}

}


?>


<div class="container">
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Admin Name" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</div>



</body>
</html>
