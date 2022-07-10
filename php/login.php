<?php 
    require_once('dbconnect.php');
    session_start();

    if(isset($_POST['action']) == 'login'){
        $username = $_POST['data']['username'];
        $password = $_POST['data']['password'];


        $sql = "SELECT * FROM  users WHERE `username` = '$username'";
        $stm = $pdo->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    
        if(count($result) === 0){
            echo "not found";
        }else{

            if(password_verify($password,$result[0]['password'])){
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $result[0]['user_id'];
                $_SESSION['fullname'] = $result[0]['fullname'];
                $_SESSION['agency'] = $result[0]['agency'];
                $_SESSION['profile_pic'] = $result[0]['profile_picture'];
                $_SESSION['role'] = $result[0]['role'];
                echo "logged in";
            }else{
                echo "wrong password";
            }

        }

    }


?>