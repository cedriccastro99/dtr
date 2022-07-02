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
        <script src="./js/uploadprofile.js"></script>

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
            <div class="d-flex justify-content-center" id="time-in-out">
                <div>
                    
                    <span>
                        <h2 id="clock"></h2>
                    </span>
                    <span id="setup-select">
                        <select id="user-setup" class="form-select my-3">
                            <option value="">Select setup</option>
                            <option value="1">Office</option>
                            <option value="2">Work from home</option>
                        </select>
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

<!-- MODAL -->
<div class="modal fade" id="UploadProfile" tabindex="-1" aria-labelledby="UploadProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UploadProfileLabel">Upload profile picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <input id="imageUpload" type="file" 
                    name="profile_photo" placeholder="Photo" class="form-control mb-3">
                    <center>
                        <div id="image-preview" class="mb-3">
                            
                        </div>
                        <button class="btn btn-primary">Upload</button>
                    </center>
                </div>
            </div>
        </div>
  </div>
</div>
<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
    <div class="toast-container position-absolute top-0 start-50 translate-middle-x" id="toastPlacement">
        <div id="liveToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Please select your set-up
            </div>
        </div>
        </div>
    </div>
</div>

</body>
</html>



<script>
    localStorage.setItem('page',JSON.stringify('dashboard'))
    
    const date = new Date();

    $('#clock').text(`${date.toLocaleString('en-US', { hour12: true })}`);
</script>