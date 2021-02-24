<?php
    include("connection/conn.php");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $log_id = $_POST['logid'];

        $query = mysqli_query($conn, "select * from doctor where log_id = '$log_id'");

        $numrows = mysqli_num_rows($query);
        if($numrows == 1){
            echo 2;
        }else{
            $stmt = $conn->prepare("insert into doctor(dname,special,qual,fee,phone,room,log_id) VALUES(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss", $dname, $special, $qual, $fee, $phone, $room, $log_id);

            $dname = $_POST['dname'];
            $special = $_POST['special'];
            $qual = $_POST['qual'];
            $fee = $_POST['fee'];
            $phone = $_POST['phone'];
            $room = $_POST['rno'];
            $log_id = $_POST['logid'];
        
            if($stmt->execute()){
                echo 1;
            }else{
                echo 0;
            }

            $stmt->close();
        }        
    }





?>