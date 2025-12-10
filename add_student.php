<?php
$mysqli = new mysqli("localhost", "root", "", "galgotias_db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$first = $_POST['first_name'];
$middle = $_POST['middle_name'];
$last = $_POST['last_name'];
$adm = $_POST['adm_no'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$msg = $_POST['message'];

$sql = "INSERT INTO students (first_name, middle_name, last_name, adm_no, email, contact, gender, address, message)
VALUES ('$first', '$middle', '$last', '$adm', '$email', '$contact', '$gender', '$address', '$msg')";

if ($mysqli->query($sql)) {
    echo "Student added successfully.";
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>
