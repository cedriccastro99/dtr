<?php

    session_start();

    if(isset($_POST['action']) == 'logout'){
        session_destroy();
        echo "logout";
    }

?>