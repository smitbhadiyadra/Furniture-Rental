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

// Get the card ID from the URL parameter
$card_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Check if a card ID is provided
if (!$card_id) {
  echo "Invalid card ID.";
  exit;
}

// Fetch the card details from the database
$sql = "SELECT * FROM cards WHERE id = $card_id";
$stmt = $conne->prepare($sql);
$stmt->execute();
$card = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the card exists
if (!$card) {
  echo "Card not found.";
  exit;
}

// Handle form submission for update
if (isset($_POST['update'])) {
  $title = htmlspecialchars( $_POST['title']);
  $description = htmlspecialchars($_POST['description']);
  $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
  $image_url = $_POST['image_url']; // Optional image update

    if(empty($image_url)){
        $sql = "UPDATE cards SET title = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $conne->prepare($sql);
        $stmt->execute([$title, $description, $price, $card_id]);
    }

    else{
        $sql = "UPDATE cards SET title = ?, description = ?, price = ?, image_url = ? WHERE id = ?";
        $stmt = $conne->prepare($sql);
        $stmt->execute([$title, $description, $price, $image_url, $card_id]);
    }
  

  header("Location: card_list.php");
  exit;
}
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
  <title>Edit Card</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
  <style>
    .contain{
        margin-top: 5vh;
        width: 80%;
        height: 80%;
        background-color: #E1EBED;
        border-radius: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3vh 10vw;
        overflow: hidden;
        position: relative;
        display: flex;
    }
    .main{
        background-color: #F5F5F5;
    }
    .page1{
        background-color: #F5F5F5;
    }
    nav{
        border-bottom: 2px solid #E9E9E9;
    }

    form {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 32px 24px 24px;
        gap: 16px;
        text-align: center;
    }

    form .head {
    display: flex;
    flex-direction: column;
    gap: 16px;
    }

    form .head span {
    font-size: 1.6rem;
    font-weight: bolder;
    color: black;
    margin-bottom: 2vh;
    }

    form span {
    font-size: 1rem;
    font-weight: 600;
    color: black;
    text-align: left;
    }

    form .inputs {
    overflow: hidden;
    background-color: #fff;
    width: 40vw;
    height: 8vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0rem 0.5rem;
    border-radius: 8px;
    border-bottom: none;
    outline: 0;
    }

    form .titles {
    overflow: hidden;
    width: 40vw;
    /* height: 5vh; */
    display: flex;
    justify-content: start;
    align-items: start;
    padding: 0 .5vw;
    }

    form .inputs input {
    border: none;
    outline: none;
    padding: 15px 15px;
    width: 100%;
    height: 100%;
    border-bottom: 1px solid rgba(128, 128, 128, 0.299);
    font-weight: 500;
    font-size: 1.2vw;
    /* margin-top: 3vh; */
    }

    form button {
    background-color: #016450;
    color: white;
    width: 100%;
    height: 40px;
    padding-top: 8px;
    padding-bottom: 8px;
    border: 0;
    overflow: hidden;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 1s ease-in-out;
    }

    form button:hover {
    background-color: #005ce6;
    }

    .form-footer {
    background-color: #e0ecfb;
    padding: 16px;
    font-size: 1rem;
    text-align: center;
    }

    .form-footer a {
    font-weight: bolder;
    color: #0066ff;
    transition: all 3s ease-in-out;
    }

    .form-footer a:hover {
    color: #005ce6;
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
                    <a href="card_list.php"  id="active">Listed</a>
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
                    <form method="post">
                        <div class="head">
                            <span>Update Details</span>
                        </div>
                        <div class="titles">
                            <span>Title:</span>
                        </div>
                        <div class="inputs">
                            <input type="text" name="title" placeholder="Title..." value="<?php echo $card['title']; ?>">
                        </div>
                        <div class="titles">
                            <span>Description:</span>
                        </div>
                        <div class="inputs">
                            <input type="text" placeholder="Description..." name="description" value="<?php echo $card['description']; ?>">
                        </div>
                        <div class="titles">
                            <span>Price:</span>
                        </div>
                        <div class="inputs">
                            <input type="number" placeholder="Price..." name="price" value="<?php echo $card['price']; ?>">
                        </div>
                        <div class="titles">
                            <span>Image:</span>
                        </div>
                        <div class="inputs">
                            <input type="file" placeholder="img_url" name="image_url" value="<?php echo $card['image_url']; ?>">
                        </div>
                        <button type="submit" name="update">Update Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<section class="listed_items">
  
</body>
</html>
