<?php

    include("connection/conn.php");

    $stmt = $conn->prepare("select * from patient order by patientno DESC");
    $stmt->bind_result($patientno, $name, $phone, $address);

    if($stmt->execute()){
        while($stmt->fetch()){
            $output[] = array("patientno"=>$patientno, "name"=>$name, "phone"=>$phone, "address"=>$address);
        }

        echo json_encode($output);
    }

    $stmt->close();



?>