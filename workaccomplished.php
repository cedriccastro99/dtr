<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location:./views/login.php');
    }

    if($_SESSION['role'] == 'Admin'){
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
    <link rel="stylesheet" href="./css/sidenav.css">
    <link rel="stylesheet" href="./css/workaccomplished.css">

    <!-- JS  -->

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/workaccomplished.js"></script>

    <title>Work Accomplished</title>
</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include('./templates/sidebar.php') ?>
        <main class="col ps-md-2 pt-2">
            <span type="button" data-bs-target="#sidebar" data-bs-toggle="collapse">
                <img src="./image/bars-solid.svg" alt="menu-button" style="width:30px;height:30px;"> 
            </span>
            <div class="container">
                <div class="text-center">
                    <form id="date-select">
                        <div class="d-flex justify-content-center mb-2">
                            <div class="me-2">
                                <label for="year" class="form-label">Year</label>
                                <select name="year" id="year" class="form-select" required>
                                </select>
                            </div>
                            <div class="me-2">
                                <label for="month" class="form-label">Month</label>
                                <select name="month" id="month" class="form-select" required>
                                </select>
                            </div>
                            <div class="me-2">
                                <label for="from" class="form-label">From</label>
                                <select name="from" id="from" class="form-select" required>
                                </select>
                            </div>
                            <div class="me-2">
                                <label for="to" class="form-label">To</label>
                                <select name="to" id="to" class="form-select" required>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm">Show Record</button>
                        </div>
                    </form>
                </div>
                <div class="user-record mt-4">
                    <div class="print-button d-none mb-2">
                        <button id="print" class="btn btn-primary">Print Record</button>
                    </div>
                    <div class="text-center spinner d-none">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="print-record d-none">
                        <div id="records-table">
                            <table class="table table-bordered border-dark text-center table-sm ms-auto">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>WORK ACCOMPLISHED</th>
                                    </tr>
                                </thead>
                                <tbody id="table-record-body">
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="users-name container text-center">
                            <div class="row">
                                <div class="col">
                                    Prepared by :
                                    <br>
                                    <br>
                                    <p>
                                        <u>
                                            <?php
                                                echo $_SESSION['fullname']
                                            ?>
                                        </u>
                                    </p>
                                </div>
                                <!-- <div class="col">
                                    Noted :
                                    <br>
                                    <br>
                                    <p class="mb-0"><u>EVELYN C. ENCARNADO</u></p>
                                    <p>Division Manager</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
    
</body>
</html>

<script>
    localStorage.setItem('page',JSON.stringify('workaccomplished'))
</script>