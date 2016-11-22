<?php
session_start();

$userId = $_SESSION['userId'];
$account = $_POST['account'];
$description = $_POST['description'];

include('connect.php');
$query = "INSERT INTO `php-prj`.accounts (`acc_num`, `description`, `user_id`) 
              VALUES ('$account', '$description', $userId)";

$_SESSION['newAccCreated'] = mysqli_query($con, $query);

header('Location: accounts.php');
exit();