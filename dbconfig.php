<?php

$host = "localhost";
$dbname = "rentalhub";
$username = "root";
$password = "";
$port = 3307;


try {
  $conne = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
  $conne->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
