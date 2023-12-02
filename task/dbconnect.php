<?php
$server = 'localhost';
$email = 'root';
$password = '';
$database = 'users';

$conn = mysqli_connect($server, $email, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>