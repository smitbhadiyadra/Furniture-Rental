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
$sql = "SELECT * FROM signup";
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
      <form action="index.php" method="post">
        <h1>Your Profile</h1>
        
        <fieldset>
                  
          <label for="name">First Name:</label>
          <input type="text" id="name" name="first_name" value="<?php echo $row['FirstName'] ?>" required>

          <label for="name">Last Name:</label>
          <input type="text" id="name" name="last_name" value="<?php echo $row['LastName']; ?>" required>
        
          <label for="email">Email:</label>
          <input type="email" id="mail" name="email" value="<?php echo $row['Email']; ?>" required>

          <input type="hidden" value="<?php echo 'OID'.rand(100,1000); ?>">

          <label for="password">Mobile no:</label>
          <input type="number" id="password" name="mobileno" value="<?php echo $row['mobileno']; ?>" placeholder="Enter your Mobile Number" required>

          <label for="name">Address:</label>
          <input type="text" id="name" name="address" value="<?php echo $row['Address'] ?>" placeholder="Enter  your Address" required>


       
        </fieldset>
        <fieldset>  
        
       
        <button type="submit" name="submit">Save</button>
        
       </form>
       </div>
      </div>
      
    </body>
</html>


<?php
	require 'connection.php';


    if (isset($_POST["submit"])){
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $email=$_POST["email"];
        $mobileno = $_POST["mobileno"];
        $address = $_POST["address"];
        $duplicate = mysqli_query($conn , "select * from signup where Email='$email'");

        $sql = "UPDATE `signup` SET `mobileno` = `$mobileno` , `Address` = `$address` WHERE `signup`.`Email` = $email ";

        // $sq = "INSERT INTO signup VALUES ('' ,'$firstName','$lastName','$email','$password', '$mobileno', '$address')";

        mysqli_query($conn,$sql);
        echo "<script>alert(' data updated.')</script>";
    }




?>
