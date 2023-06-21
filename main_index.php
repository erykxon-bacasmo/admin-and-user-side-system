<?php

require "connection.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Monitor System</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h1>Company System</h1><br><br>
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