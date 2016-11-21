<?php

$host="127.0.0.1";
$port=60000;
$socket="";
$user="root";
$password="";
$dbname="php-prj";

$con = mysqli_connect($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());

