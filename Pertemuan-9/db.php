<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan_9_db";

$con = mysqli_connect($host, $user, $pass, $db);

if ($con) {
    echo "Berhasil";
} else {
    global $con;
    echo "Error" . mysqli_error($con);
}
