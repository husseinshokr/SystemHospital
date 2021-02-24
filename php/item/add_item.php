<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
        $stmt = $conn->prepare("insert into item(itemname,description,sellprice,buyprice,qty) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $itemname, $description, $sellprice, $buyprice, $qty);
        $itemname = $_POST['iname'];
        $description = $_POST['des'];
        $sellprice = $_POST['sprice'];
        $buyprice = $_POST['bprice'];
        $qty = $_POST['qty'];
        
        
        if($stmt->execute()){
            echo 1;
        }else{
            echo 0;
        }

        $stmt->close();
               
    }





?>