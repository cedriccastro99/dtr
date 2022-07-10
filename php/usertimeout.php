<?php

    session_start();
    require_once('dbconnect.php');

    if(isset($_SESSION['user_id']) && isset($_POST['action']) == 'timeout'){
        
        $userid = $_SESSION['user_id'];

        $entry = $_POST['data']['entry'];
        $time = $_POST['data']['time'];
        $type = $_POST['data']['type'];

        if($type === 'am_out'){
            try {
			
                $sql = "INSERT INTO time (entry_id,type,time) VALUES ($entry ,'$type','$time')";
                mysqli_query($con,$sql);

                $sql = "SELECT a.entry_id,a.month,a.day,a.year,
                    ( SELECT b.time FROM time b WHERE b.type = 'am_in' AND entry_id = a.entry_id ) as am_in,
                    ( SELECT b.time FROM time b WHERE b.type = 'am_out' AND entry_id = a.entry_id ) as am_out,
                    ( SELECT b.time FROM time b WHERE b.type = 'pm_in' AND entry_id = a.entry_id) as pm_in,
                    ( SELECT b.time FROM time b WHERE b.type = 'pm_out' AND entry_id = a.entry_id) as pm_out,
                    a.setup
                    FROM entry a
                    WHERE a.user_id = $userid
                    AND a.entry_id = $entry";

                $stm = $pdo->query($sql);
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($result);
            } catch (Exception $e) {
                $pdo->rollback();
                throw $e;
            }
        }else if($type === 'pm_out'){
            try {

                $day = $_POST['data']['day'];
                $month = $_POST['data']['month'];
                $year = $_POST['data']['year'];

                $accomplished = $_POST['data']['accomplished'];
			
                $sql = "INSERT INTO time (entry_id,type,time) VALUES ($entry ,'$type','$time')";
                mysqli_query($con,$sql);

                $sql = "SELECT a.entry_id,a.month,a.day,a.year,
                    ( SELECT b.time FROM time b WHERE b.type = 'am_in' AND entry_id = a.entry_id ) as am_in,
                    ( SELECT b.time FROM time b WHERE b.type = 'am_out' AND entry_id = a.entry_id ) as am_out,
                    ( SELECT b.time FROM time b WHERE b.type = 'pm_in' AND entry_id = a.entry_id) as pm_in,
                    ( SELECT b.time FROM time b WHERE b.type = 'pm_out' AND entry_id = a.entry_id) as pm_out,
                    a.setup
                    FROM entry a
                    WHERE a.user_id = $userid
                    AND a.entry_id = $entry";

                $stm = $pdo->query($sql);
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                $sql = "INSERT INTO `accomplished_work`(`entry_id`, `accomplished_work`, `month`, `day`, `year`) VALUES ($entry,'$accomplished','$month','$day','$year')";
                mysqli_query($con,$sql);

                echo json_encode($result);
            } catch (Exception $e) {
                $pdo->rollback();
                throw $e;
            }
        }
    }


?>