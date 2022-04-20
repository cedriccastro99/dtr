<?php

    require_once('dbconnect.php');
    session_start();

    if(isset($_SESSION['user_id']) && isset($_GET['action']) == 'getuserdata'){

        $userid = $_SESSION['user_id'];
        
        $day = $_GET['data']['day'];
        $month = $_GET['data']['month'];
        $year = $_GET['data']['year'];


        $sql = "SELECT * FROM  entry WHERE `user_id` = $userid AND `month` = '$month' AND `day` = '$day' AND `year` = '$year'";
        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);

    }


?>