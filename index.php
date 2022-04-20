<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location:./views/login.php');
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


    <!-- JS  -->

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src=".\js\dashboard.js"></script>


    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid mx-5">

            <a class="navbar-brand">Navbar</a>
            <div>
                <span>
                    Welcome, <b><span><?php echo $_SESSION['fullname'] ?></span></b>
                </span>
                <button class="ms-2 btn btn-sm btn-danger" id="logout-btn">Logout</button>
            </div>
        </div>
    </nav>


    <div class="d-flex justify-content-center">
        <div>
            <span>
                <h2 id="clock">--:--:-- --</h2>
            </span>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" id="test">
                    Time in
                </button>
                <button class="btn btn-danger">
                    Time out
                </button>
            </div>
        </div>
        
    </div>

    
</body>
</html>