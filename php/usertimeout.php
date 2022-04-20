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
			
                $pdo->beginTransaction();
                $prepared_statement = $pdo->prepare("UPDATE entry SET `am_out` = ?  WHERE `entry_id` = ? AND `user_id` = ?");
    
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
        }else if($type === 'pm_out'){
            try {
			
                $pdo->beginTransaction();
                $prepared_statement = $pdo->prepare("UPDATE entry SET `pm_out` = ?  WHERE `entry_id` = ? AND `user_id` = ?");
    
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