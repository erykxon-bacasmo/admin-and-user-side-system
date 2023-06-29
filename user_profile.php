<?php

require "connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

session_start();

if(isset($_SESSION['id'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h1>Welcome User <?php echo $rows['first_name']?></h1><br><br>
    <?php 
        if($rows['id'] == $_SESSION['id']){?>
            <button id="edit-modal">Edit Info</button>
        <?php } else { ?>
            <h5>Not Edittable</h5>
        <?php }
    ?>
    <a href="user_index.php">Back</a><br>
    <div class="create_user_content">
        <h3>Create User Account</h3>
        <form action="" method="post">
            <Label>User</Label>
            <input type="user" name="user" value="<?php echo $rows['username']?>" readonly><br><br>
            <Label>Password</Label>
            <input type="text" name="pass" value="<?php echo $rows['pass']?>" readonly><br><br>
            <Label>First Name</Label>
            <input type="text" name="fname" value="<?php echo $rows['first_name']?>" readonly><br><br>
            <Label>Last Name</Label>
            <input type="text" name="lname" value="<?php echo $rows['last_name']?>" readonly><br><br>
            <Label>Age</Label>
            <input type="number" name="age" value="<?php echo $rows['age']?>" readonly><br><br>
            <Label>Gender</Label>
            <input type="text" name="gender" value="<?php echo $rows['gender']?>" readonly> <br><br>
            <Label>Address</Label>
            <input type="text" name="address" value="<?php echo $rows['address']?>" readonly><br><br>
            <Label>Work Role</Label>
            <input type="text" name="work_role" value="<?php echo $rows['work_role']?>" readonly><br><br>
            <Label>Mobile #</Label>
            <input type="number" name="mobnum" value="<?php echo $rows['mobile_no']?>" readonly><br><br>
        </form>
    </div>
    <div class="edit-modal" id="edit-popup">
        <div class="edit-content">
            <h1>Edit Profile</h1><br><br>
            <form action="" method="post">
                <Label>User</Label>
                <input type="user" name="user" value="<?php echo $rows['username']?>" required><br><br>
                <Label>Password</Label>
                <input type="text" name="pass" value="<?php echo $rows['pass']?>" required><br><br>
                <Label>First Name</Label>
                <input type="text" name="fname" value="<?php echo $rows['first_name']?>" required><br><br>
                <Label>Last Name</Label>
                <input type="text" name="lname" value="<?php echo $rows['last_name']?>" required><br><br>
                <Label>Age</Label>
                <input type="number" name="age" value="<?php echo $rows['age']?>" required><br><br>
                <Label>Gender</Label>
                 <select name="" id="">
                    
                 </select><br><br>
                <Label>Address</Label>
                <input type="text" name="address" value="<?php echo $rows['address']?>" required><br><br>
                <Label>Work Role</Label>
                <input type="text" name="work_role" value="<?php echo $rows['work_role']?>" required><br><br>
                <Label>Mobile #</Label>
                <input type="number" name="mobnum" value="<?php echo $rows['mobile_no']?>" required><br><br>
            </form>
        </div>
    </div>
</body>
</html>

<?php } else { ?>
    sample
<?php } ?>
