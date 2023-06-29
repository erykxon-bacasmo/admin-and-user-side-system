<?php

require "connection.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

session_start();

if(isset($_SESSION['id'])){ ?>
<!-- if the user get's log in -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User System</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>   
        <h1>Company System</h1><br><br>
        <h4><?php echo $_SESSION['fname']?> <a href="user_logout.php">Logout</a><br><br></h4>
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
                                <!-- <?php 
                                    if($rows['id'] == $_SESSION['id']){?>
                                        <a href="user_profile.php?id=<?php echo $_SESSION['id']?>">View</a>
                                    <?php } else { ?>
                                        <h5>Not Edittable</h5>
                                    <?php }
                                ?> -->
                                <a href="user_profile.php?id=<?php echo $rows['id']?>">View</a>
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

<!-- if there is no user's login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User System</title>
</head>
<body>
    <h1>Welcome Guest</h1>
</body>
</html>

<?php }

?>
