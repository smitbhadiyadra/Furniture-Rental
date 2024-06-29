<?php
    require 'config.php';
    error_reporting(0);
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * from signup where id = '$id'");
        $row = mysqli_fetch_assoc($result);
    }
    else{
        header("location: login.php");
    } 
    
?>  

<?php

// Include the database connection file
require_once("dbconfig.php");
include "connection.php";

// Fetch all cards from the database
$sql = "SELECT * FROM cards";
$stmt = $conne->prepare($sql);
$stmt->execute();
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

error_reporting(0);


?>

<?php
    require 'config.php';
    error_reporting(0);
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * from signup where id = '$id'");
        $row = mysqli_fetch_assoc($result);
    }
    else{
        header("location: login.php");
    } 
    
?>  



<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="payscript.php" method="post">
        <h1> Check Out Form</h1>
        
        <fieldset>
                  
          <label for="name">Name:</label>
          <input type="text" id="name" name="user_name" value="<?php echo $row['FirstName'], " ", $row['LastName']; ?>" required>
        
          <label for="email">Email:</label>
          <input type="email" id="mail" name="user_email" value="<?php echo $row['Email']; ?>" required>

          <input type="hidden" value="<?php echo 'OID'.rand(100,1000); ?>">

          <label for="password">Mobile no:</label>
          <input type="number" id="password" name="user_number" placeholder="Enter Mobile Number" required>
          
          <label for="Amount">Amount:</label>
          <input type="number" placeholder="<?php echo $price; ?>"  name="amount">
       
        </fieldset>
        <fieldset>  
        
       
        <button type="submit">Pay</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
