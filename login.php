<?php 

include('includes/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql); 
    $user = mysqli_fetch_assoc($result);  

    if ($user && password_verify($password, $user['password'])) { 
        session_start(); 
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: dashboard.php');
    }else{ 
        echo "incorrect email or password has been entered";
    }
}

?>

<form method="POST" action="login.php">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>