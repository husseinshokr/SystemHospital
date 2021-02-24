<?php

    include("connection/conn.php");

    $stmt = $conn->prepare("select patientno, name from patient ");

    $stmt->bind_result($patientno, $name);

    if($stmt->execute()){
        while($stmt->fetch()){
            $output[] = array("patientno"=>$patientno, "name"=>$name);
        }

        echo json_encode($output);
    }

    $stmt->close();
?>