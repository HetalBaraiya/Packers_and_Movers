<?php

// User login

$cnn = new mysqli("localhost", "root", "", "the_packers");

if (!$cnn) {
    echo "error" . mysqli_error();
}

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $cnn->query($sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['email'] = $email;

        // Get the user's name from the user table
        $row = $result->fetch_assoc();
        $name = $row['first_name'];
        $user_id = $row['user_id'];

        // Save the user's name in local storage
        echo "<script>";
        echo "localStorage.setItem('first_name', '$name');";
        echo "localStorage.setItem('user_id', '$user_id');";
        echo "alert('Login successful!');";
        echo "window.location.href='index.html';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Invalid email or password. Please try again.');";
        echo "window.location.href='login.html';";
        echo "</script>";
    }
}

$cnn->close();

?>
