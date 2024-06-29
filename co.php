<?php
$server ="localhost";
$username ="root";
$password ="";
$dbname="rentalhub";
$port = 3307;
$conn = mysqli_connect($server,$username,$password,$dbname,$port);
if($conn){
    // echo "connection establish"  ;
}
else{
    echo "connection fails";
}
?>




