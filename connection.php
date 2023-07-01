<?php

// Old method I used
// function connection(){
//     $host = "localhost";
//     $user = "root";
//     $pass = "";
//     $db = "company_system";

//     $conn = new mysqli("localhost", "root", "", "company_system");

//     if($conn->connect_error){
//         echo $conn->connect_error;
//     } else {
//         return $conn;
//     }

// }


$conn = new mysqli("localhost", "root", "", "company_system");

// echo "connected successfully!";

?>