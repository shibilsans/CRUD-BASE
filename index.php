<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>INDEX</title>
</head>
<body>
    <form action="create.php" method="post">
        <label for="">name</label>
        <input type="text"name="name" placeholder="name">
        <label for="">email</label>
        <input type="email" name="email"placeholder="email">
        <button type="submit">click</button>
    </form>
    <?php include("read.php")?>
    
</body>
</html>