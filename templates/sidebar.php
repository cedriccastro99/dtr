<html>
    <head>
        <script>
            $(document).ready(function(){
                
                const localData = JSON.parse(localStorage.getItem('page'));
                const navLink = $($('.nav-link').children('span'));
                if(localData === 'dashboard'){
                    const link = $(navLink).filter(function(){ return $(this).text() === 'Dashboard' });
                    $(link).parent().addClass('active')
                }else if(localData === 'records'){
                    const link = $(navLink).filter(function(){ return $(this).text() === 'Records' });
                    $(link).parent().addClass('active')
                }else if(localData === 'printrecords'){
                    const link = $(navLink).filter(function(){ return $(this).text() === 'Print Records' });
                    $(link).parent().addClass('active')
                }
            })
        </script>
    </head>
    <body>
        <div class="col-auto px-0">
            <div id="sidebar" class="collapse collapse-horizontal border-end">
                <div id="sidebar-nav" class="shadow list-group border-0 rounded-0 text-sm-start min-vh-100">
                    <div id="profile-component" class="mt-5 mb-3">
                        <div class="d-flex flex-row">
                            <div id="profile" class="border border-dark">
                                <?php
                                    if($_SESSION['profile_pic'] != null){
                                        
                                        echo '<img class = "signature" src="data:image/png;base64,'.base64_encode($_SESSION['profile_pic']).' "/>';
                                    }else{?>
                                        <img src="./image/default-profile-picture.jpg" alt="profile-picture">
                                <?php
                                    } 
                                ?>
                            </div>
                            <!-- <button data-bs-toggle="modal" data-bs-target="#UploadProfile" class="btn btn-default border border-secondary shadow d-flex justify-content-center" id="upload-btn">
                                <img src="./image/camera-solid.svg" alt="profile-picture">
                            </button> -->
                        </div>
                        
                        
                        <h5 class="mt-2" id="fullname"><?php echo $_SESSION['fullname'] ?></h5>
                        <span class="fw-light" id="agency"><?php echo $_SESSION['agency'] ?></span>
                    </div>
            
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0">
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link text-truncate border-end-0">
                            <span class="ms-2 d-none d-sm-inline">Home</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link text-truncate border-end-0">
                            <span class="ms-2 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./records.php" class="nav-link text-truncate border-end-0">
                            <span class="ms-2 d-none d-sm-inline">Records</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./printrecords.php" class="nav-link text-truncate border-end-0">
                            <span class="ms-2 d-none d-sm-inline">Print Records</span>
                        </a>
                    </li>
                    </ul>
                    <div class="d-flex justify-content-center mb-5">
                        <button class="btn btn-danger" id="logout-btn">Sign Out</button>
                    </div>
    
                </div>
            </div>
        </div>
    </body>
</html>