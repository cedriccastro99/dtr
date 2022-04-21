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
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/sidenav.css">

        <!-- JS  -->

        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script src="./js/dashboard.js"></script>

    <title>Dashboard</title>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto px-0">
            <div id="sidebar" class="collapse collapse-horizontal border-end">
                <div id="sidebar-nav" class="shadow list-group border-0 rounded-0 text-sm-start min-vh-100">
                    <div id="profile-component" class="mt-5 mb-3">
                        <div id="profile" class="border border-dark">
                        </div>
                        <h5 class="mt-2" id="fullname"><?php echo $_SESSION['fullname'] ?></h5>
                        <span class="fw-light" id="agency"><?php echo $_SESSION['agency'] ?></span>
                    </div>
            
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-truncate border-end-0">
                            <span class="ms-2 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active text-truncate border-end-0">
                            <span class="ms-2 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./views/records.php" class="nav-link text-truncate border-end-0">
                            <span class="ms-2 d-none d-sm-inline">Records</span>
                        </a>
                    </li>
                    </ul>
                    <div class="d-flex justify-content-center mb-5">
                        <button class="btn btn-danger" id="logout-btn">Sign Out</button>
                    </div>

                </div>
            </div>
        </div>
        <main class="col ps-md-2 pt-2">
            <span type="button" data-bs-target="#sidebar" data-bs-toggle="collapse">
                <img src="./image/bars-solid.svg" alt="menu-button" style="width:30px;height:30px;"> 
            </span>
            <div class="d-flex justify-content-center" id="time-in-out">
                <div>
                    
                    <span>
                        <h2 id="clock"></h2>
                    </span>
                    <div class="d-flex justify-content-center">
                        <span class="mb-1" id="btn-container">
                        </span>
                    </div>
                    <span id="alert-container">
                    </span>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>



<script>
    const date = new Date();

    $('#clock').text(`${date.toLocaleString('en-US', { hour12: true })}`);
</script>