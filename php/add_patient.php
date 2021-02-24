<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        /*$stmt = $conn->prepare("insert into patient(patientno,name,phone,address) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $patientno, $name, $phone, $address);

        $patientno = $_POST['pno'];
        $name = $_POST['pname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        */
        $stmt = $conn->prepare("insert into patient(name,phone,address) VALUES(?,?,?)");
        $stmt->bind_param("sss", $name, $phone, $address);

        $name = $_POST['pname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        
        if($stmt->execute()){
            echo 1;
        }
        else{
            echo 0;
        }


        $stmt->close();
    }





?>