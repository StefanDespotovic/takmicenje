<?php

//Database configuration
$dbHost     = "localhost";
$dbUsername = "id18955784_stefanova";
$dbPassword = "32Cmfoan(Yfe";
$dbName     = "id18955784_stefan";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
?>