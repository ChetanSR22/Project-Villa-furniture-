<?php
  
  require_once('connection.php');
   
  

    if(isset($_POST['submit'])){
      
      $name = mysqli_real_escape_string($con,$_POST['first']);
      $lname = mysqli_real_escape_string($con,$_POST['lastname']);
      $phone = mysqli_real_escape_string($con,$_POST['phonenum']);
      $mail = mysqli_real_escape_string($con,$_POST['email']);
      $pass = mysqli_real_escape_string($con,$_POST['pass']);
      $cpass = mysqli_real_escape_string($con,$_POST['pass1']);
      

      if($pass!=$cpass)
      {
        echo "Password Not Matched";
      }
      else{
        $pas = md5($pass);
        $sql = "insert into users (fname,lname,pnumber,email,pass,cpass) values ('$name','$lname','$phone','$mail','$pas','$cpass')";
        $result = mysqli_query($con,$sql);

        if($result)
        {
          echo 'Your Record has been saved in the Database';
          header("Location:User_login.html");
        }
        else
        {
          echo 'User is already Registered. Please Log in';
        }
      }
    }


    

?>