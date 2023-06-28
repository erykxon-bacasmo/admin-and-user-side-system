<?php

require "connection.php";

if(isset($_POST['create'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $loc = $_POST['address'];
    $work = $_POST['work_role'];
    $mobnum = $_POST['mobnum'];

    $sql = "INSERT INTO users (`first_name`, `last_name`, `age`, `gender`, `address`, `work_role`, `mobile_no`, `username`, `pass`) VALUES ('$fname', '$lname', '$age', '$gender', '$loc', '$work', '$mobnum', '$user', '$pass')";
    $conn->query($sql);

    echo"<script>alert('Create Successfully!');</script>";
    echo"<script>window.location = 'user_login.php'</script>";
    // header("location: user_login.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Account</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="create_user_content">
        <h3>Create User Account</h3>
        <form action="" method="post">
            <Label>User</Label>
            <input type="user" name="user" required><br><br>
            <Label>Password</Label>
            <input type="password" name="pass" required><br><br>
            <Label>First Name</Label>
            <input type="text" name="fname" required><br><br>
            <Label>Last Name</Label>
            <input type="text" name="lname" required><br><br>
            <Label>Age</Label>
            <input type="number" name="age" required><br><br>
            <Label>Gender</Label>
            <select name="gender" required>
                <option value="" hidden>--choose--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>
            <Label>Address</Label>
            <input type="text" name="address"><br><br>
            <Label>Work Role</Label>
            <input type="text" name="work_role"><br><br>
            <Label>Mobile #</Label>
            <input type="number" name="mobnum"><br><br>
            <button type="submit" name="create">Create</button>
            <a href="user_login.php">Cancel</a>
        </form>
    </div>
</body>
</html>