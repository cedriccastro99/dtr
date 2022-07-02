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
            
            if($setup == '1'){
                $sql = "INSERT INTO entry (user_id,month,day,year,am_in,setup) VALUES('$userid','$month','$day','$year','$time','$setup')" ;
            }else{
                $sql = "INSERT INTO entry (user_id,month,day,year,am_in,am_out,pm_in,pm_out,setup) VALUES('$userid','$month','$day','$year','$time','$time','$time','$time','$setup')" ;
            }
            
            mysqli_query($con,$sql);

            $sql = "SELECT * FROM  entry WHERE `user_id` = $userid AND `month` = '$month' AND `day` = '$day' AND `year` = '$year'";
            $stm = $pdo->query($sql);
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($result);
        }else if($type === 'pm_in'){

            $entry = $_POST['data']['entry'];

            try {
			
                $pdo->beginTransaction();
                $prepared_statement = $pdo->prepare("UPDATE entry SET `pm_in` = ?  WHERE `entry_id` = ? AND `user_id` = ?");
    
                $prepared_statement->execute(array($time,$entry,$userid));
    
                $pdo->commit();
    
                $sql = "SELECT * FROM  entry WHERE `user_id` = $userid AND `entry_id` = $entry";
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