<?php

    include("connection/conn.php");

    $stmt = $conn->prepare("select doctorno, dname, special, qual, fee, phone, room from doctor where log_id = ?");
    $stmt->bind_param("s", $logid);
    $logid = $_POST['logid'];

    $stmt->bind_result($doctorno, $dname, $special, $qual, $fee, $phone, $room);

    if($stmt->execute()){
        while($stmt->fetch()){
            $output[] = array("doctorno"=>$doctorno, "dname"=>$dname, "special"=>$special, "qual"=>$qual, "fee"=>$fee, "phone"=>$phone, "room"=>$room);
        }

        echo json_encode($output);
    }

    $stmt->close();



?>