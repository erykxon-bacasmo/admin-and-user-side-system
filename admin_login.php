<?php

require "connection.php";


session_start();

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `admin` WHERE username = '$user' AND pass = '$pass'";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();
    $data = $result->num_rows;

    if($data > 0){
        $_SESSION['id'] = $rows['id'];
        $_SESSION['fname'] = $rows['full_name'];
        header("location: admin_index.php");
    } else {?>
        <script>
            alert("Invalid Account");
        </script>
    <?php }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h1>Admin Login</h1><br><br>
    <form action="" method="post">
        <Label>Username</Label>
        <input type="text" name="user" required><br><br>
        <Label>Password</Label>
        <input type="password" name="pass" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>