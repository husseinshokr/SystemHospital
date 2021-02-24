<?php

    include("connection/conn.php");

    $stmt = $conn->prepare("select * from patient WHERE patientno = ?");
    
    $stmt->bind_param("s", $patientno);
    
    $patientno = $_POST['patient_id'];

    $stmt->bind_result($patientno, $name, $phone, $address);

    if($stmt->execute()){
        while($stmt->fetch()){
            $output[] = array("patientno"=>$patientno, "name"=>$name, "phone"=>$phone, "address"=>$address);
        }

        echo json_encode($output);
    }

    $stmt->close();
?>