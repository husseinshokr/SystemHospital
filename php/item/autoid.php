<?php
    include("connection/conn.php");
   
    $query = "select MAX(cast(id as decimal)) id from item";

    if($result = mysqli_query($conn, $query)){

        $row = mysqli_fetch_assoc($result);
        $count = $row('id');
        $count = $count + 1;
        $codeno = str_pad($count, 4, "0", STR_PAD_LEFT);
        echo json_encode($codeno);

    }





?>