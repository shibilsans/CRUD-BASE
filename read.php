<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>read</title>
</head>
<body>
    <?php
    include("connect.php");

    $sql="SELECT id, name, email  FROM users";

    $result=$conn->query($sql);

    if($result->num_rows > 0 ){
        echo "<table>";
        echo "<tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Action</td>
        </tr>";
        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>". $row['id']."</td>";
            echo "<td>". $row['name']."</td>";
            echo "<td>". $row["email"]."</td>";
            echo "<td><a href='edit.php?id=".$row["id"]."'>Edit</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td>";
        }    
        echo "</table>";    
    }else{
        echo  "0 result";
    }
    $conn->close();
    ?>
</body>
</html>