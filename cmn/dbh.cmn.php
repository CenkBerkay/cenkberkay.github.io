<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "stage3";

//connectie maken
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//connectie checken
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}