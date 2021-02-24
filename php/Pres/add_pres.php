<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $stmt = $conn->prepare("insert into prescription(pid,cno,dtype,des) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $pid, $cno, $dtype, $des);

        $pid = $_POST['pno'];
        $cno = $_POST['cno'];
        $dtype = $_POST['dtype'];
        $des = $_POST['des'];

        
        if($stmt->execute()){
            echo 1;
        }
        else{
            echo 0;
        }


        $stmt->close();
    }





?>