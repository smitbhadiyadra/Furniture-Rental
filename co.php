<?php
$server ="localhost";
$username ="root";
$password ="Abhi@8820";
$dbname="rentalhub";
// $port = 3307;
$conn = mysqli_connect($server,$username,$password,$dbname,$port);
if($conn){
    // echo "connection establish"  ;
}
else{
    echo "connection fails";
}
?>




