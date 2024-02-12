<?php
include("connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];

    $sql="INSERT INTO  users(name,email)VALUES('$name','$email')";
    if($conn->query($sql)==TRUE){
        echo "data created successfully";
    }else{
        echo "error".$sql. "<br>".$conn->error;
    }

}
$conn->close();
header("location:index.php");

?>