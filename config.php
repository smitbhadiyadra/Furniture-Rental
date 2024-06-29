<?php
session_start();
$port = 3307;
$conn = mysqli_connect("localhost","root","","rentalhub", $port);
if($conn){
    // echo "connected";
}

?>