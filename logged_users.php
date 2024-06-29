<?php
require 'config.php';
error_reporting(0);

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * from admin where id = '$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: isadmin.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Hub</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        @font-face {
            font-family: Sofia;
            src: url(fonts/sofiapro-light.otf);
        }

        @font-face {
            font-family: BaseM;
            src: url(fonts/BasisGrotesquePro-Medium.ttf);
        }

        @font-face {
            font-family: BaseB;
            src: url(fonts/BasisGrotesquePro-Bold.ttf);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Sofia;
        }

        ::selection {
            background-color: #016450;
            color: #FFFFFF;
        }


        nav {
            /* position: absolute; */
            width: 100%;
            height: 12%;
            /* background-color: pink; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 10rem;
            z-index: 99;
        }

        nav .logo {
            font-size: 1.5vw;
            font-weight: 900;
            color: #1E1E1E;
            cursor: pointer;
        }

        nav .logo i {
            font-size: 1.7vw;
            transition: all cubic-bezier(0.19, 1, 0.22, 1).7s;
        }

        nav .logo span {
            font-size: 1.2vw;
            background-color: #016450;
            padding: .8vh .5vw;
            border-radius: 5px;
            color: #fff;
            transition: all cubic-bezier(0.19, 1, 0.22, 1).7s;
        }

        nav .logo:hover span {
            background-color: #E0EBED;
            color: #016450;
        }

        nav .logo:hover i {
            color: #016450;
        }

        nav .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2.5vw;
        }

        nav .menu a {
            position: relative;
            font-size: 1vw;
            text-decoration: none;
            color: #949494;
            font-weight: 600;
            transition: all cubic-bezier(0.19, 1, 0.22, 1).7s;
            letter-spacing: .5px;
        }

        nav .menu a:hover {
            color: #1E1E1E;
        }

        nav .menu a::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 2px;
            border-radius: 10px;
            background-color: #1E1E1E;
            bottom: -.9vh;
            overflow: hidden;
            left: 0;
            opacity: 0;
            transition: all cubic-bezier(0.19, 1, 0.22, 1).7s;
        }

        nav .menu a:hover::after {
            opacity: 1;
        }

        nav .menu #active {
            color: #1E1E1E;
        }

        nav .menu #active::after {
            opacity: 1;
        }

        nav .right {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1vw;
        }

        nav .right #btn1 {
            width: 40px;
            height: 40px;
            border-radius: 50px;
            background-image: url("imgs/profileImg2.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            border: 2px solid #016450;
            cursor: pointer;
            background-color: transparent;
            transition: all cubic-bezier(0.19, 1, 0.22, 1).7s;
        }

        .right #logout {
            cursor: pointer;
            padding: 1.5vh 1.2vw;
            border-radius: 33px;
            background: #FFFFFF;
            border: 2px solid #FFFFFF;
            font-family: Sofia;
            font-weight: 600;
            transition: .5s ease;
            font-size: 1vw;
            box-shadow: 0px 0px 10px 2px #d3d3d3;
        }

        .right #logout:hover {
            background: #016450;
            box-shadow: 0px 0px 0px 7px rgba(19, 170, 52, 0.2);
            color: #fff;
        }

        .page1 .hero {
            position: relative;
            width: 100%;
            height: 100%;
            /* background-color: pink; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero .container {
            margin-top: 5vh;
            width: 80%;
            height: 78%;
            background-color: #E0EBED;
            border-radius: 25px;
            background-image: url(imgs/h1.png);
            background-size: 680px;
            background-repeat: no-repeat;
            background-position: 36vw -37vh;
            padding: 20vh 7vw;
        }

        .hero .container h1 {
            font-family: BaseM;
            font-size: 3.5vw;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.2vh;
        }

        .hero .container p {
            color: #5B5E63;
            font-size: 1vw;
            font-weight: 600;
            letter-spacing: 1px;
            line-height: 1.5;
        }

        .main {
            background-color: #F5F5F5;
        }

        .page1 {
            background-color: #F5F5F5;
        }

        nav {
            border-bottom: 2px solid #E9E9E9;
        }

        .contain {
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

        form {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .table {
            width: 100%;
            min-height: 80%;
            position: sticky;
            overflow-y: scroll;
            background-color: #E9E9E9;
            text-align: start;
            border-radius: 5px;
        }

        .table thead tr {
            height: 60px;
            background-color: #d9d9d9;
            /* padding: 5vh 5vw; */
            text-align: center;
            font-size: 1.1vw;
            color: #7E7E7E;
        }

        .table tr {
            height: 80px;
            text-align: center;
            padding: 1vh 0vw;
        }

        .table tr td {
            background-color: #fff;
            text-align: center;
            font-weight: 600;
            font-size: 1.1vw;
        }

        .editButton {
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

        .editButton:hover {
            background-color: #7E7E7E;
        }

        .editButton>a {
            text-decoration: none;
            color: #fff;
            font-size: 1vw;
        }
    </style>
    <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
</head>

<body>

    <!-- <div class="main"> -->
    <!-- <div class="page1"> -->

    <nav>
        <div class="logo">
            <i class="ri-home-heart-line"></i>
            Rental <span>Hub</span>
        </div>
        <div class="menu">
            <a href="logged_users.php" id="active">Users</a>
            <a href="card_list.php">Products</a>
            <a href="insert_card.php">Add Items</a>
            <!-- <a href="insert_card.php">Upload</a> -->
        </div>
        <div class="right">
            <h4 style="font-size: 1.1vw; line-height: 1; text-align: right; letter-spacing: 1px; text-transform:uppercase">
                <?php echo $row['FirstName']; ?>
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



    <?php
    include('config.php');
    error_reporting(0);
    $q = "select * from signup";
    $data = mysqli_query($conn, $q);
    $roq = mysqli_num_rows($data);
    if ($roq != 0) {
        // echo "recoards have";
    ?>
        <!-- <h2 align="center" >Display USER</h2> -->

        <div class="hero">
            <div class="contain">
                <form action="#" method="post">
                    <table class="table">
                        <thead class="thead">
                            <tr class="tableRow">
                                <th>id</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_assoc($data)) {
                                echo  "<tr>
                                <td>" . $result['id'] . "</td>
                                    <td>" . $result['FirstName'] . "</td>
                                    <td>" . $result['LastName'] . "</td>
                                    <td>" . $result['Email'] . "</td>
                                    <td>" . $result['Password'] . "</td>
                                </tr>";
                            }
                            ?> </tbody>
                    </table>
                </form>
            </div>
        </div>

    <?php
    } else {
        echo "recoards not have";
    }
    ?>
    </table>

    </center>
    </div>

</html>

<!-- echo $result[name']." ".$result['email']." ".$result['phone']." ".$result['adress']." ".$result['city']." ".$result['state']." ".$result['pincode']." ".$result['Municipal']." ".$result['complaint']." ".$result['attachment']."<br>"; -->

<script>
    function recdelete() {
        return confirm('Are you sure you want to delete this record?');
    }
</script>