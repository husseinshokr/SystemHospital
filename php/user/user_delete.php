<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $stmt = $conn->prepare("delete from user where id = ?");


        $stmt->bind_param("s", $user_id);


        $user_id = $_POST['user_id'];

        if($stmt->execute()){
            echo 1;
        }
        else{
            echo 0;
        }


        $stmt->close();
    }





?>