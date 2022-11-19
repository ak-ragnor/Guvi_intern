<?php

error_reporting (E_ALL ^ E_NOTICE);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();

 $email = $_POST['email'];
 $pass = $_POST['password'];
 // $name = $_POST['name'];
 // $gender = $_POST['gender'];
 // $number = $_POST['number'];

 // echo json_encode(array('success' => $email));

 //SQL Database connection
 $conn = new mysqli('localhost','root','','sample');
 if($conn->connect_error){
     echo "$conn->connect_error";
     die("Connection Failed : ". $conn->connect_error);
     echo "conne";
 } else {
    $stmt = $mysqli->prepare( "SELECT email FROM user WHERE (email=? || password=?)");
    $stmt->bind_param('ss',$email,$pass);
        $stmt->execute();
        $stmt->bind_result($email);
        $rs= $stmt->fetch ();
        $stmt->close();
        if (!$rs) {
      echo "<script>alert('Invalid Details. Please try again.')</script>";
        } 
        else {
          echo json_encode(array('success' => 'success', 'email' => $email));
        }
        $conn->close();

    }
?>








