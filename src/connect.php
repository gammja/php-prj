<?php

$host = "127.0.0.1";
$port = 60000;
$user = "root";
$password = "pwd";
$dbname = "php-prj";

$con = mysqli_connect($host, $user, $password, $dbname, $port)
or die ('Could not connect to the database server' . mysqli_connect_error());
