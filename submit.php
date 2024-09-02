<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "reso";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$payment_amount = $_POST['payment_amount'];
$gst_included = $_POST['gst_included'];


if ($gst_included) {
    $total_payable_amount = $payment_amount * 1.18;
} else {
    $total_payable_amount = $payment_amount;
}


$sql = "INSERT INTO payments (name, payment_amount, gst_included, total_payable_amount) 
        VALUES ('$name', '$payment_amount', '$gst_included', '$total_payable_amount')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
