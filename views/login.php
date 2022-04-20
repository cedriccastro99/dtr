<?php

    session_start();
    if(isset($_SESSION['user_id'])){
        header('location:../');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">

    <!-- JS  -->

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript" src="..\js\login.js"></script>

    <title>Login</title>
</head>
<body>

    <form class="container shadow" id="login-form">
        <center>
            <h3>DTR Login</h3>
        </center>    
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input name="username" id="username" type="text" class="form-control" placeholder="Enter username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" id="password" type="password" class="form-control" placeholder="Enter password">
        </div>
        <span id="alert_box">
        </span>
        <button type="submit" id="login-button" class="btn btn-primary">Login</button>
        <p>Need an account ? <span><a href="../views/register.php">Register</a></span></p>
    </form>

</body>
</html>