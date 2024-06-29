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



<!DOCTYPE html>
<html>
<head>
  <title>Card List</title>
  <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <style>
    .main{
        background-color: #F5F5F5;
    }
    .page1{
        background-color: #F5F5F5;
    }
    nav{
        border-bottom: 2px solid #E9E9E9;
    }
    .contain{
        margin-top: 5vh;
        width: 100%;
        min-height: 80%;
        position: sticky;
        overflow-y: scroll;
        /* background-color: #E1EBED; */
        border-radius: 25px;
        display: flex;
        justify-content: center;
        align-items: start;
        padding: 3vh 10vw;
        overflow-x: hidden;
    }
    form{
        width: 100%;
        position: relative;
        overflow: hidden;
    }
    .table{
        width: 100%;
        min-height: 80%;
        position: sticky;
        overflow-y: scroll;
        background-color: #E9E9E9;
        text-align: start;
        border-radius: 5px;
    }
    .table thead tr{
        height: 60px;
        background-color: #d9d9d9;
        /* padding: 5vh 5vw; */
        text-align: center;
        font-size: 1.1vw;
        color: #7E7E7E;
    }
    .table tr{
        height: 80px;
        text-align: center;
        padding: 1vh 0vw;
    }
    .table tr td{
        background-color: #fff;
        text-align: center;
        font-weight: 600;
        font-size: 1.1vw;
    }
    .editButton{
        padding: 1.5vh 1.5vw;
        text-decoration: none;
        color: #fff;
        background-color: #016450;
        border-radius: 3px;
        transition: background-color .5s;
        outline: none;
        border: none;
        cursor: pointer;
    }
    .editButton:hover{
        background-color: #7E7E7E;
    }
    .editButton>a{
        text-decoration: none;
        color: #fff;
        font-size: 1vw;
    }
  </style>
</head>
<body>
  <div class="main">

        <div class="page1">
            <nav>
                <div class="logo">
                    <i class="ri-home-heart-line"></i>
                    Rental <span>Hub</span>
                </div>
                <div class="menu">
                    <a href="index.php">Home</a>
                    <a href="#"  id="active">Listed</a>
                    <a href="insert_card.php">Upload</a>
                </div>
                <div class="right">
                    <h4 style="font-size: 1.1vw; line-height: 1; text-align: right; letter-spacing: 1px; text-transform:uppercase">
                        <?php echo $row['FirstName'] ?>
                    </h4>
                    <button id="btn1"></button>
                    <button type="submit" name="logout" id="logout" style="cursor: pointer;
                    padding: 1.5vh 1.2vw;
                    border-radius: 10px;
                    background: #016450;
                    border: 2px solid #FFFFFF;
                    font-family: Sofia;
                    font-weight: 600;
                    letter-spacing: 1px;
                    transition: .5s ease;
                    font-size: 1vw;
                    color: #fff;
                    box-shadow: 0px 0px 10px 2px #d3d3d3;
                    .right #logout:hover{
                        background: #016450;
                        box-shadow: 0px 0px 0px 7px rgba(19, 170, 52, 0.2);
                        color: #fff;
                    }"><a href="login.php" style="text-decoration: none; color: #fff;">Log out</a></button>
                </div>
            </nav>

            <div class="hero">
                <div class="contain">
                    <form action="#" method="post">
                    <table class="table">
                        <thead class="thead">
                            <tr class="tableRow">
                                <th>City</th>
                                <th>Description</th>
                                <th>Rent in (₹)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cards as $card) : ?>
                            <tr>
                                <td><?php echo $card['title']; ?></td>
                                <td><?php echo $card['description']; ?></td>
                                <td><?php echo $card['price']; ?>/~</td>
                                <td ><button class="editButton"><a href="edit_card.php?id=<?php echo $card['id']; ?>">Edit</a></button>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>

