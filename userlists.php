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
        <link rel="stylesheet" href="./css/userlists.css">

        <!-- JS  -->

        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="./js/userlists.js"></script>

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
                <div class="mx-5" id="table-container">
                    <table id="records-table" class="table table-sm table-bordered text-center border-dark table-striped">
                        <thead class="sticky-top table-secondary border-dark">
                            <tr>
                                <th class="text-center table-warning" colspan="7"><h5>List of users</h5></th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Agency</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody id="user-list" >
                        </tbody>
                    </table>
                </div>
            </main>
    </div>
</div>
</body>
</html>



<script>
    localStorage.setItem('page',JSON.stringify('userlists'))
</script>