<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="clothes";
try {
    $conn=mysqli_connect($servername,$username,$password,$dbname);
} catch (Exception $th) {
    echo  $th->getMessage();
}

// if (!$conn) {
    
//     header("location: ../errors/db.php"); 
//     die();
//     //die(mysqli_connect_errno($conn));
// }
// // else{
// //     echo "successful";
// // }
?>