<?php

$host = "192.168.99.100";
$port = 32770;
$user = "root";
$password = "";
$dbname = "php-prj";

$con = mysqli_connect($host, $user, $password, $dbname, $port)
or die ('Could not connect to the database server' . mysqli_connect_error());
