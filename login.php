<?php

   $email = $_POST['uname'];
   $passw = $_POST['password'];

   $con = new mysqli("localhost","root","","project");
   if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
   } else {
    $stmt = $con ->prepare("select * from users where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $passw) {
            header("Location:Home.html");
        }
        else{
            echo "invalid Email or Password";
        }
    } else{
        echo "invalid email or password";
    }

   }


?>