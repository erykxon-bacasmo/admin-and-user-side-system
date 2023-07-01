<?php

require "connection.php";

session_start();

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username = '$user' AND pass = '$pass'";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();
    $data = $result->num_rows;

    if($data > 0){
        $_SESSION['id'] = $rows['id'];
        $_SESSION['fname'] = $rows['first_name'];
        header("location: user_index.php"); 
    } else { ?>
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
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <!-- login syntax -->
    <h1>User Login</h1><br><br>
    <form action="" method="post">
        <Label>Username</Label>
        <input type="text" name="user" required><br><br>
        <Label>Password</Label>
        <input type="password" name="pass" required><br><br>
        <button type="submit" name="login">Login</button><br><br>
    </form>
    <!-- portals -->
    <div>
        <h4>Doesn't have account? <a href="user_create.php">Create Here!</a></h4>
    </div>
    <div>
        <h4>Log in as admin? <a href="admin_login.php">Login Here</a></h4>
    </div>
</body>
</html>