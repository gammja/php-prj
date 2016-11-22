<?php
session_start();

$userName = $_POST['username'];
$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$email = $_POST['email'];
$description = $_POST['description'];
$password = $_POST['password'];

include('connect.php');
$query = "INSERT INTO `php-prj`.users (`username`, `password`, `email`, `description`, `first_name`, `last_name`) 
              VALUES ('$userName', '$password', '$email', '$description', '$firstName', '$lastName')";

$_SESSION['newUserCreated'] = mysqli_query($con, $query) or die(mysqli_error($con));

header('Location: admin.php');
exit();