<?php

    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location:../views/login.php');
    }

    if($_SESSION['role'] == 'Staff'){
        header('location:./');
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
    <link rel="stylesheet" href="./css/register.css">

    <!-- JS  -->

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript" src=".\js\register.js"></script>

    <title>Register</title>
</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include('./templates/sidebar.php') ?>
            <main class="col ps-md-2 pt-2">
                <span type="button" data-bs-target="#sidebar" data-bs-toggle="collapse">
                    <img src="./image/bars-solid.svg" alt="menu-button" style="width:30px;height:30px;"> 
                </span>
                <form class="container shadow" id="register-form">
                    <center>
                        <h3>Add User</h3>
                    </center>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="user-firstname" class="form-label">First Name</label>
                            <input name="user-firstname" id="user-firstname" type="text" class="form-control" placeholder="Firstname">
                        </div>
                        <div class="col">
                            <label for="user-lastname" class="form-label">Lastname</label>
                            <input name="user-lastname" id="user-lastname" type="text" class="form-control" placeholder="Lastname">
                        </div>
                        <div class="col-2">
                            <label for="user-mi" class="form-label">M.I.</label>
                            <input name="user-mi" id="user-mi" type="text" class="form-control" placeholder="M.I">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="user-agency" class="form-label">Agency</label>
                            <input name="user-agency" id="user-agency" type="text" class="form-control" placeholder="Enter agency">
                        </div>
                        <div class="col">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select" placeholder="Role">
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    <span id="alert_box">
                    </span>
                    <button type="submit" id="register-button" class="btn btn-primary">Register</button>
                </form>
            </main>
    </div>
</div>

</body>
</html>

<script>
    localStorage.setItem('page',JSON.stringify('registeruser'))
    
    const date = new Date();

    $('#clock').text(`${date.toLocaleString('en-US', { hour12: true })}`);
</script>