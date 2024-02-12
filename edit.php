<?php
// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_example";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details for editing
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, name, email FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
    } else {
        echo "User not found.";
        exit;
    }
}

// Update user in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
        header("Location: index.php"); // Redirect back to the main page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">;
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    
    <!-- Display form for editing user -->
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
        
        <button type="submit">Update User</button>
    </form>

</body>
</html>