<?php

    require_once('dbconnect.php');

    if(isset($_POST['action']) == 'register'){

        $username = $_POST['data']['username'];
        $password = $_POST['data']['password'];
        $fullname = $_POST['data']['fullname'];
        $agency = $_POST['data']['agency'];

        $query = "SELECT * FROM users WHERE username = '$username'";

        $stmt = $con->prepare("SELECT * FROM users WHERE `username` = ?"); 
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows === 1 ){
            echo 'exist';
        }else{

            $username =  mysqli_real_escape_string($con,$username); 
    		$password =  mysqli_real_escape_string($con,$password);
    		$fullname =  mysqli_real_escape_string($con,$fullname);
    		$agency =  mysqli_real_escape_string($con,$agency);

    	    $password = password_hash($password, PASSWORD_BCRYPT);  //encrypt the password 
    	 	$sql = "INSERT INTO users (username,password,fullname,agency) VALUES('$username','$password','$fullname','$agency')" ;
    	 	mysqli_query($con,$sql);

            echo 'registered';
            
        }
        

    }


?>