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

    <title>Dashboard</title>
</head>
<body>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include('./templates/sidebar.php') ?>
            <main class="col ps-md-2 pt-2">
                <span type="button" data-bs-target="#sidebar" data-bs-toggle="collapse">
                    <img src="./image/bars-solid.svg" alt="menu-button" style="width:30px;height:30px;"> 
                </span>
                <?php if($_SESSION['role'] == 'Staff'){ ?>
                    <?php  include('./templates/staff.php') ?>
                <?php }?>
                <?php if($_SESSION['role'] == 'Admin'){ ?>
                    <?php  include('./templates/admin.php') ?>
                <?php }?>
            </main>
    </div>
</div>


<?php include('./templates/toasts.php') ?>


</body>
</html>



<script>
    localStorage.setItem('page',JSON.stringify('dashboard'))
    
    const date = new Date();

    $('#clock').text(`${date.toLocaleString('en-US', { hour12: true })}`);
</script>