<?php

    include("connection/conn.php");

    $stmt = $conn->prepare("select * from prescription order by pid DESC");
    $stmt->bind_result($pid, $cno, $dtype, $des);

    if($stmt->execute()){
        while($stmt->fetch()){
            $output[] = array("pid"=>$pid, "cno"=>$cno, "dtype"=>$dtype, "des"=>$des);
        }

        echo json_encode($output);
    }

    $stmt->close();



?>