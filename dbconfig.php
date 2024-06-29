<?php

$host = "localhost";
$dbname = "rentalhub";
$username = "root";
$password = "Abhi@8820";
// $port = 3307;


try {
  $conne = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
  $conne->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
