<?php 

include('includes/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql); 
    $user = mysqli_fetch_assoc($result); 
}