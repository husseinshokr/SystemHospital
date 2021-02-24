<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $stmt = $conn->prepare("insert into channel(docno,pno,rno,date) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $docno, $pno, $rno, $date);

        $docno = $_POST['dname'];
        $pno = $_POST['pname'];
        $rno = $_POST['rno'];
        $date = $_POST['date'];
        
        if($stmt->execute()){
            echo 1;
        }else{
            echo 0;
        }
        $stmt->close();       
    }
?>