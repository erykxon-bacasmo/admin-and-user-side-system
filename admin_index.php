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
    <h1>Welcome &nbsp; <?php echo $_SESSION['fname']?></h1>
    <?php
        if(isset($_SESSION['id'])){?>
            <a href="admin_logout.php">Logout</a>
        <?php }
    ?>
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
                            <td>
                                <a href="#">View</a>
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
    <h1>Guest</h1>
</body>
</html>

<?php }

?>
