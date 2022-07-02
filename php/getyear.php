<?php 
    include('dbconnect.php');

    if(isset($_GET['action']) == 'getyear'){
        $query = 'SELECT DISTINCT year FROM entry ORDER BY year asc';
        $stm = $pdo->query($query);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    }

?>