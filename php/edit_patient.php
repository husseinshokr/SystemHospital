<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $stmt = $conn->prepare("update patient set name = ?, phone = ?, address = ? where patientno = ?");


        $stmt->bind_param("ssss", $name, $phone, $address, $patientno);

        
        $name = $_POST['pname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $patientno = $_POST['patient_id'];

        if($stmt->execute()){
            echo 1;
        }
        else{
            echo 0;
        }


        $stmt->close();
    }





?>