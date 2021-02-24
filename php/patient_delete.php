<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $stmt = $conn->prepare("delete from patient where patientno = ?");

        $stmt->bind_param("s", $patientno);

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