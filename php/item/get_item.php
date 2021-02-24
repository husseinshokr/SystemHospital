<?php

    include("connection/conn.php");

    $stmt = $conn->prepare("select * from item where id = ?");
    $itemcode = $_POST['itemcode'];
    $stmt->bind_param("s", $itemcode);
    
    $stmt->bind_result($id, $itemname, $description, $sellprice, $buyprice, $qty);

    if($stmt->execute()){
        while($stmt->fetch()){
            $output[] = array("id"=>$id, "itemname"=>$itemname, "description"=>$description, "sellprice"=>$sellprice, "buyprice"=>$buyprice, "qty"=>$qty);
        }

        echo json_encode($output);
    }

    $stmt->close();



?>