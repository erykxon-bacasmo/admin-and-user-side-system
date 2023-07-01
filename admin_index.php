<?php

require "connection.php";

$sql = "SELECT * FROM `admin`";
$result = $conn->query($sql);


session_start();

if(isset($_SESSION['id'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h1>Welcome &nbsp; <?php echo $_SESSION['fname']?></h1><br>
    <a href="admin_logout.php">Logout</a>
    <br><br>
    <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
    ?>
        <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Work Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($data = $result->num_rows > 0){
                    while($rows = $result->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $rows['first_name']?>&nbsp;<?php echo $rows['last_name']?></td>
                            <td><?php echo $rows['age']?></td>
                            <td><?php echo $rows['gender']?></td>
                            <td><?php echo $rows['work_role']?></td>
                            <td href="?id= <?php echo $rows['id']?>">
                                <button  id="view-modal">View</button>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5">No Data Record</td>
                    </tr>
                <?php }
            
            ?>
        </tbody>
    </table>

    <!-- user profile -->

    <?php
    // $id = $_GET['id'];
    
    $sql = "SELECT * FROM users WHERE id = id";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();
    ?>
    <div class="view-modal" id="view-popup-modal">
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
                 <select name="gender" required>
                    <option value="Male" <?php echo($rows['gender']== "Male")? 'selected': '';?>>Male</option>
                    <option value="Female" <?php echo($rows['gender']== "Female")? 'selected': '';?>>Female</option>
                 </select><br><br>
                <Label>Address</Label>
                <input type="text" name="address" value="<?php echo $rows['address']?>" required><br><br>
                <Label>Work Role</Label>
                <input type="text" name="work_role" value="<?php echo $rows['work_role']?>" required><br><br>
                <Label>Mobile #</Label>
                <input type="number" name="mobnum" value="<?php echo $rows['mobile_no']?>" required><br><br>
                <button type="submit" name="edit">Edit</button> &nbsp; &nbsp;
                <button id="cancel">Cancel</button>
            </form>
        </div>
    </div>
    <script>
        var viewBtn = document.getElementById("view-modal");
        var cancelBtn = document.getElementById("cancel");
        var viewPopupMod = document.getElementById("view-popup-modal");

        viewBtn.onclick =function(){
            // var id = <?php echo $rows['id']?>

            viewPopupMod.style.display = "block";
        }

        cancelBtn.onclick = function(){
            viewPopupMod.style.display = "none";
        };

        window.onclick = function(sample){
            if(sample.target == viewPopupMod ){
                viewPopupMod.style.display = "none";
            };
        }
    </script>
</body>
</html>

<?php } else {?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h1>Guest</h1><br><br>
    <a href="admin_login.php">Wants to login?</a>
</body>
</html>

<?php }

?>
