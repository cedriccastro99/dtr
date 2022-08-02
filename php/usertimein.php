<?php

    session_start();
    require_once('dbconnect.php');

    if(isset($_SESSION['user_id']) && isset($_POST['action']) == 'timein'){
        $userid = $_SESSION['user_id'];
            
        $time = $_POST['data']['time'];
        $type = $_POST['data']['type'];

        if($type === 'am_in'){

            $day = $_POST['data']['day'];
            $month = $_POST['data']['month'];
            $year = $_POST['data']['year'];

            $setup = $_POST['data']['setup'];

            $accomplished = '';

            $sql = "INSERT INTO entry (user_id,month,day,year,setup) VALUES('$userid','$month','$day','$year','$setup')" ;
            mysqli_query($con,$sql);

            $entry_id = mysqli_insert_id($con);
            
            if($setup == '1'){
                //not automatic
                $sql = "INSERT INTO time (entry_id,type,time) 
                        VALUES ($entry_id ,'$type','$time'),
                                ($entry_id ,'am_out','12:00:00 PM'),
                                ($entry_id ,'pm_in','01:00:00 PM')";

                mysqli_query($con,$sql);
            }else{
                $accomplished = $_POST['data']['accomplished'];

                $sql = "INSERT INTO time (entry_id,type,time) 
                        VALUES ($entry_id ,'am_in','$time'),
                            ($entry_id ,'am_out','$time'),
                            ($entry_id ,'pm_in','$time'),
                            ($entry_id ,'pm_out','$time')";
                mysqli_query($con,$sql);

                $sql = "INSERT INTO `accomplished_work`(`entry_id`, `accomplished_work`, `month`, `day`, `year`) VALUES ($entry_id,'$accomplished','$month','$day','$year')";
                mysqli_query($con,$sql);
            }

            $m = (int)$month;
            $d = (int)$day;
            $y = (int)$year;
            
            $query_getdata = "SELECT a.entry_id,a.month,a.day,a.year,
                    ( SELECT b.time FROM time b WHERE b.type = 'am_in' AND entry_id = a.entry_id ) as am_in,
                    ( SELECT b.time FROM time b WHERE b.type = 'am_out' AND entry_id = a.entry_id ) as am_out,
                    ( SELECT b.time FROM time b WHERE b.type = 'pm_in' AND entry_id = a.entry_id) as pm_in,
                    ( SELECT b.time FROM time b WHERE b.type = 'pm_out' AND entry_id = a.entry_id) as pm_out,
                    a.setup
                    FROM entry a
                    WHERE a.entry_id = $entry_id
                    AND a.user_id = $userid
                    AND a.month = $m 
                    AND a.day = $d 
                    AND a.year = $y";

            $stm = $pdo->query($query_getdata);
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($result);
        }else if($type === 'pm_in'){

            $entry = $_POST['data']['entry'];

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

        }
        
    }

?>