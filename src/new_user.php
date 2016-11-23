<?php
session_start();

$userName = $_POST['username'];
$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$email = $_POST['email'];
$description = $_POST['description'];
$password = $_POST['password'];
$role = $_POST['role'];

include('connect.php');

mysqli_begin_transaction($con);

$query = "INSERT INTO `php-prj`.users (`username`, `password`, `email`, `description`, `first_name`, `last_name`) 
              VALUES ('$userName', '$password', '$email', '$description', '$firstName', '$lastName')";

$_SESSION['newUserCreated'] = mysqli_query($con, $query) or die(mysqli_error($con));

$newUserId = mysqli_insert_id($con);
$query = "INSERT INTO `php-prj`.authorities (user_id, role_id) VALUES ($newUserId, $role)";
mysqli_query($con, $query) or die(mysqli_error($con));

mysqli_commit($con);
mysqli_close($con);

header('Location: admin.php');
exit();