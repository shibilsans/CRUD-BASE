<?php
 include("connect.php");

 if($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET["id"])){
    $id = $_GET["id"];

    $sql="DELETE FROM users WHERE id= '$id'";
    
    if($conn->query($sql)==TRUE){
        echo "data deleted successfully";
    }else{
        echo "user error" .$sql. "<br>". $conn->error;
    }

 }
 $conn->close();
 header("location:index.php");

?>