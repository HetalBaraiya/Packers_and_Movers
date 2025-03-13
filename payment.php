<?php

// Connect to the database
$host = 'localhost';
$db = 'the_packers';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Retrieve the user_id from local storage
$user_id = $_GET['user_id']; // Make sure to sanitize and validate user input

// Generate a random transaction ID
$transaction_id = generateTransactionId();

// Save the payment data to the database
$payment_amount = 30000;
$payment_datetime = date('Y-m-d H:i:s');
$payment_status = 'pending';
$payment_reference = $transaction_id;

$sql = "INSERT INTO payment (user_id, payment_amount, payment_datetime, payment_status, payment_reference)
        VALUES ('$user_id', '$payment_amount', '$payment_datetime', '$payment_status', '$payment_reference')";

if ($conn->query($sql) === true) {
    echo "<script>";
    echo "alert('Payment submitted successfully!');";
    echo "window.location.href='thanks.html';";
    echo "</script>";
} else {
    echo "Error submitting payment: " . $conn->error;
}

$conn->close();

// Generate a random transaction ID
function generateTransactionId() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $transactionId = '';
    for ($i = 0; $i < 10; $i++) {
        $transactionId .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $transactionId;
}
?>