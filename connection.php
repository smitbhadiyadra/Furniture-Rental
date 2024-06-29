<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "Abhi@8820";
    $dbname = "rentalhub";
    // $port = 3307;

    $conn = mysqli_connect( $servername, $username, $password, $dbname );

    if($conn){
        // echo "Connection Success";
    }
    else{
        echo "Connection Failed".mysqli_connect_error();
    }

?>
