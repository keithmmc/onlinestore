<?php 

include('includes/db.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO users (name, email, password, address, phone_number) VALUES ('$name', '$email', '$password', '$address', '$phone_number')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?> 

<form method="POST" action="register.php">
<input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="text" name="address" placeholder="Address" required><br>
    <input type="text" name="phone_number" placeholder="Phone Number" required><br>
    <button type="submit">Register</button>
</form>