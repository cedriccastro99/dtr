<?php

    require_once('dbconnect.php');
    session_start();

    if(isset($_SESSION['user_id']) && $_GET['action'] == 'getuserdata'){

        $userid = $_SESSION['user_id'];
        
        $day = $_GET['data']['day'];
        $month = $_GET['data']['month'];
        $year = $_GET['data']['year'];

        $m = (int)$month;
        $d = (int)$day;
        $y = (int)$year;

        $sql = "SELECT a.entry_id,a.month,a.day,a.year,
            ( SELECT b.time FROM time b WHERE b.type = 'am_in' AND entry_id = a.entry_id ) as am_in,
            ( SELECT b.time FROM time b WHERE b.type = 'am_out' AND entry_id = a.entry_id ) as am_out,
            ( SELECT b.time FROM time b WHERE b.type = 'pm_in' AND entry_id = a.entry_id) as pm_in,
            ( SELECT b.time FROM time b WHERE b.type = 'pm_out' AND entry_id = a.entry_id) as pm_out,
            a.setup
            FROM entry a
            WHERE a.user_id = $userid
            AND a.month = $m 
            AND a.day = $d 
            AND a.year = $y";

        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
        exit();

    }else if(isset($_SESSION['user_id']) && $_GET['action'] == 'getuserentry'){

        $userid = $_SESSION['user_id'];

        $sql ="SELECT a.entry_id,a.month,a.day,a.year,
            ( SELECT b.time FROM time b WHERE b.type = 'am_in' AND entry_id = a.entry_id ) as am_in,
            ( SELECT b.time FROM time b WHERE b.type = 'am_out' AND entry_id = a.entry_id ) as am_out,
            ( SELECT b.time FROM time b WHERE b.type = 'pm_in' AND entry_id = a.entry_id) as pm_in,
            ( SELECT b.time FROM time b WHERE b.type = 'pm_out' AND entry_id = a.entry_id) as pm_out,
            a.setup
            FROM entry a
            WHERE a.user_id = $userid";
        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
        exit();
    }else if(isset($_SESSION['user_id']) && $_GET['action'] == 'getprintrecords'){

        $userid = $_SESSION['user_id'];
        $year = $_GET['data']['year'];
        $month = $_GET['data']['month'];
        $from = $_GET['data']['from'];
        $to = $_GET['data']['to'];

        

        $sql = "SELECT a.entry_id,a.month,a.day,a.year,
                ( SELECT b.time FROM time b WHERE b.type = 'am_in' AND entry_id = a.entry_id ) as am_in,
                ( SELECT b.time FROM time b WHERE b.type = 'am_out' AND entry_id = a.entry_id ) as am_out,
                ( SELECT b.time FROM time b WHERE b.type = 'pm_in' AND entry_id = a.entry_id) as pm_in,
                ( SELECT b.time FROM time b WHERE b.type = 'pm_out' AND entry_id = a.entry_id) as pm_out,
                a.setup
                FROM entry a
                WHERE a.user_id = $userid
                AND month = $month AND year = $year AND day >= $from AND day <= $to";
        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        exit();
    }else if(isset($_SESSION['user_id']) && $_GET['action'] == 'getworkaccomplished'){
        $userid = $_SESSION['user_id'];
        $year = $_GET['data']['year'];
        $month = $_GET['data']['month'];
        $from = $_GET['data']['from'];
        $to = $_GET['data']['to'];

        $sql = "SELECT DISTINCT a.*
            FROM accomplished_work a
            LEFT JOIN entry b ON b.entry_id = b.entry_id
            WHERE b.user_id = $userid
            AND a.month = $month AND a.year = $year AND a.day >= $from AND a.day <= $to";
        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        exit();
    }else if(isset($_SESSION['user_id']) && $_GET['action'] == 'getuserlogs'){

        $year = $_GET['data']['year'];
        $month = $_GET['data']['month'];
        $day = $_GET['data']['day'];

        $sql = "SELECT DISTINCT c.fullname, c.agency , a.type,a.time,b.setup
        FROM time a
        LEFT JOIN entry b ON b.entry_id = a.entry_id
        LEFT JOIN users c ON b.user_id = c.user_id
        WHERE b.month = $month
        AND b.day = $day
        AND b.year = $year
        ORDER BY a.inserted_at DESC";

        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        exit();
    }else if(isset($_SESSION['user_id']) && $_GET['action'] == 'getusers'){
        $sql = "SELECT user_id,username,fullname,agency,role
                FROM users";

        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        exit();
    }

?>