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
    <style>
        body {
            font-family: Arial, sans-serif;
           background-image: url('images/1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

        }
        .login-container {
            width: 500px;
            margin: 100px auto;
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8) ;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .login-container button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

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
