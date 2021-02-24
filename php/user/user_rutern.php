<?php

    include("connection/conn.php");

    $stmt = $conn->prepare("select id,fullname,uname,utype from user where id = ?");
    $stmt->bind_param("s", $user_id);
    $user_id = $_POST['user_id'];

    $stmt->bind_result($id, $fullname, $uname, $utype);

    
        

    if($stmt->execute()){
        while($stmt->fetch()){
            $output[] = array("id"=>$id, "fullname"=>$fullname, "uname"=>$uname, "utype"=>$utype);
        }

        echo json_encode($output);
    }

    $stmt->close();



?>