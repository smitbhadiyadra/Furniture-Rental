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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Hub</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <style>
        .page2 .downCard{
    width: 80%;
    /* max-height: 82vh; */
    /* background-color: rgb(248, 162, 162); */
    display: flex;
    flex-wrap: wrap;
    gap: 3%;
    /* align-items: start; */
    margin-top: 2vh;
        }

        nav>.right>a{
            text-decoration: none;
        }


    nav>.right>a>#btn1{
        width: 40px;
        height: 40px;
        border-radius: 50px;
        background-image: url("imgs/profileImg2.png");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 2px solid #F1A24A;
        cursor: pointer;
        background-color: transparent;
        transition: all cubic-bezier(0.19, 1, 0.22, 1).7s;
    }

    .box{
        margin-top: 5vh;
    } 

    .box.hide{
        padding: 0;
        display: none;
    }

    .card {
        justify-self: center;
        width: 270px;
        height: 410px;
        padding: .8em;
        background: #fff;
        position: relative;
        border-radius: .5rem;
        transition: 1s ease;
        opacity: 1;
    }

    .card-img {
        cursor: pointer;
        background-color: #84caa6;
        height: 63%;
        width: 100%;
        transition: .3s ease;
        overflow: hidden;
    }

    .card-img img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-info {
        padding-top: 5%;
    }

    .card-footer {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 6px;
        border-top: 1px solid #ddd;
    }

    .text-title {
        font-weight: 900;
        font-size: 1em;
        line-height: 1.3;
        color: #2B2726;
        /* margin-left: .5vw; */
    }

   .text-body {
       font-size: .9em;
       padding: 10px 0;
       color: #5b5e6392;
       font-weight: 600;
        /* padding-left: .4vw; */
   }
   
   .card-button {
    /* border: 1px solid #252525; */
    display: flex;
    padding: .3em;
    cursor: pointer;
    /* border-radius: 50px; */
    transition: .3s ease-in-out;
    }

    .card-button>i{
        font-size: 2vw;
        color: #F1A24A;
        transition: .5s;
    }

    .card-img:hover {
        transform: scale(.97);
    }
   
    .card-button:hover>i {
       color: #fc8f12;
    }

    .rentBtn{
        background-color: #F1A24A;
        width: 100%; 
        padding: 1vh 2vw; 
        border-radius: 0; 
        border: 1px solid #fff; 
        background-color: #F1A24A; 
        color: #fff; font-size: 1vw; 
        cursor: pointer;
        transition: .5s;
    }

    .rentBtn:hover{
        background-color: #fc8f12;
        color: #fff;
    }

    .page2{
        input {
            border: 2px solid transparent;
            width: 15em;
            height: 2.5em;
            padding-left: 0.8em;
            outline: none;
            overflow: hidden;
            background-color: #F3F3F3;
            border-radius: 50px;
            transition: all 0.5s;
            border: 2px solid #F1A24A;
            font-family: Sofia;
            font-weight: 600;
            font-size: 1vw;
            text-transform: capitalize;
        }

        input:hover,input:focus {
            border: 2px solid #F1A24A;
            box-shadow: 0px 0px 0px 3px #eac59a;
            background-color: white;
        }

        .filter-btn{


            .filter {
                position: absolute;
                width: 6vh;
                height: 6vh;
                border-radius: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px solid #F1A24A;
                cursor: pointer;
                box-shadow: 0px 10px 10px #eac59a;
                transition: 1s ease;
                top: 85%;
            }
            
            .filter i {
                font-size: 1.3vw;
                color: rgb(77, 77, 77);
                transition: all 0.3s;
            }
            .filter:hover {
                box-shadow: 0px 0px 0px 7px #eac59a;
                background-color: #F1A24A;
            }
            .filter:hover i {
                color: white;
            }
            
        }


    }

    .page3{
        position: relative;

        .card{
            width: 100%;
            height: 50%;
            background: #FFFFFF;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: none;
            position: relative;
            /* overflow: hidden; */
            cursor: pointer;
            transition: transform .2s ease, opacity .2s ease;
       
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }

        .card:hover img{
            transform: scale(1.2);
        }

    }

            .page4{
            width: 100vw;
            height: 100vh;
            background-color: #E9F1F4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page4 .left{
            width: 50%;
            height: 100%;
            /* background-color: pink; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page4 .left img{
            width: 100%;
            transition: 1s ease;
            object-fit: cover;
        }

        .page4 .right{
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 5vw;
            padding-right: 10vw;
        }

        .page4 .right h4{
            font-family: BaseB;
            font-weight: 600;
            font-size: 1.2vw;
            color: #F1A24A;
            margin-bottom: 3vh;
            transition: 1s ease;
        }

        .page4 .right h1{
            font-family: BaseM;
            font-weight: 600;
            font-size: 3.5vw;
            color: #000001;
            margin-bottom: 4vh;
            transition: 1s ease;
            text-align: center;
        }

        .page4 .right button{
            padding: 1.5vh 2vw;
            font-size: 1vw;
            background: #F1A24A;
            border-radius: 0px;
            border: 2px solid transparent;
            outline: none;
            transition: 1s ease;
        }

        .page4 .right a{
            width: 100%;
            height: 100%;
            font-family: Sofia;
            font-weight: 500;
            text-decoration: none;
            color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page4 .right a i{
            font-size: 1vw;
            margin-left: 5px;
        }

        .page4 .right button:hover{
            border: 2px solid #FFFFFF;
            box-shadow: 0px 0px 0px 7px rgba(19, 170, 52, 0.2);
        }

                .page5 .right{
                    width: 50%;
                    height: 100%;
                    /* background-color: pink; */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .page5 .right img{
                    height: 100%;
                    transition: 1s ease;
                    object-fit: cover;
                }

                .page5 .left{
                    width: 50%;
                    height: 100%;
                    /* background-color: red; */
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: start;
                    padding: 0 5vw;
                }

                .page5 .left h4{
                    font-family: BaseB;
                    font-weight: 600;
                    font-size: 1.1vw;
                    color: #F1A24A;
                    margin-bottom: 2vh;
                    transition: 1s ease;
                }

                .page5 .left h1{
                    font-family: BaseM;
                    font-weight: 600;
                    font-size: 2.8vw;
                    color: #000001;
                    margin-bottom: 4vh;
                    transition: 1s ease;
                }

                .page5 .left p{
                    font-family: Sofia;
                    font-weight: 600;
                    font-size: 1vw;
                    line-height: 1.5;
                    letter-spacing: .1px;
                    color: #5b5e63c9;
                    margin-bottom: 5vh;
                    transition: 1s ease;
                }

                .page5 .left button{
                    padding: 1.5vh 2vw;
                    font-size: 1vw;
                    background: #F1A24A;
                    border-radius: 0px;
                    border: 2px solid transparent;
                    outline: none;
                    transition: 1s ease;
                }

                .page5 .left a{
                    width: 100%;
                    height: 100%;
                    font-family: Sofia;
                    font-weight: 500;
                    text-decoration: none;
                    color: #FFFFFF;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .page5 .left a i{
                    font-size: 1vw;
                    margin-left: 5px;
                }

                .page5 .left button:hover{
                    border: 2px solid #FFFFFF;
                    box-shadow: 0px 0px 0px 7px rgba(19, 170, 52, 0.2);
                }


    </style>
    <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
</head>

<body>

    <div class="main">

        <div class="page1">
            <nav>
                <div class="logo">
                    <img src="imgs/furniture.png" style="width: 60px;" alt="">
                </div>
                <div class="menu">
                    <a href="#" id="active">Home</a>
                    <a href="#">Products</a>
                    <a href="#">Sales</a>
                    <a href="#">Contact</a>
                    <!-- <a href="card_list.php">Listed</a> -->
                    <!-- <a href="insert_card.php">Upload</a> -->
                </div>
                <div class="right">
                    <h4 style="font-size: 1.1vw; line-height: 1; text-align: right; letter-spacing: 1px; text-transform:uppercase">
                        <?php echo $row['FirstName']; ?>
                    </h4>
                    <a href="profile.php">
                        <button id="btn1"></button>
                    </a>
                    <button type="submit" name="logout" id="logout" style="cursor: pointer;
                    padding: 1.5vh 1.2vw;
                    border-radius: 5px;
                    background: #F1A24A;
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
                <div class="container" style="background: #fff; background-position: 600px; background-size: 580px; background-repeat: no-repeat;  background-image: url('imgs/chair.png');
">
                    <h1 style="font-size: 4.2vw; margin-bottom: 30px;">Make Your <span style="color: #F1A24A; font-weight: 800;">Interior</span>  <br>
                    Unique & Modern<span style="color: #F1A24A; font-weight: 800;">.</span>
                    </h1>
                    <p style="font-size: 1.4vw; line-height: 1.2;">Turn your room with panto into a lot more <br>
                    minimalist and modern.
                    </p>
                </div>
            </div>
        </div>

        <div class="page2">
            <div class="up">
                <h2>Trending Products</h2>
                <p style="line-height: 1.6;">There are many variations of passages of Lorem Ipsum available, <br>
                but the majority have suffered</p>
                <input type="text" name="" id="find" placeholder="search by Product here...." onkeyup="search()"
                    autocomplete="off">
                <input type="text" name="" id="price" placeholder="search by price here...." onkeyup="searchPrice()"
                    autocomplete="off">
                <div class="filter-btn">
                    <button title="filter" class="filter">
                        <i class="ri-equalizer-line"></i>
                    </button>
                </div>
                <!-- <div class="filter-buttons">
                    <button class="active" data-filter="all">Show all</button>
                    <button data-filter="Ahmedabad">Ahmedabad</button>
                    <button data-filter="Surat">Surat</button>
                    <button data-filter="New Delhi">New Delhi</button>
                    <button data-filter="Banglore">Banglore</button>
                    <button data-filter="Gandhinagar">Gandhinagar</button>
                    <button data-filter="Jaipur">Jaipur</button>
                </div> -->
            </div>
            <div class="downCard">
                        <?php foreach ($cards as $card) : ?>
                            <tr>
                                <td>
                                    <form action="checkOut.php" method="post">
                                        <?php $price = $card['price']; ?>
                                        <div class="box" id="<?php echo $card['id']; ?>" data-name="<?php echo $card['title']; ?>">
                                            <div class="card">
                                                <div class="card-img">
                                                    <img src="imgs/<?php echo $card['image_url']; ?>" alt="">
                                                </div>
                                                <div class="card-info">
                                                    <h6 class="text-title"> <?php echo $card['title']; ?> </h6>
                                                    <p class="text-body"><?php echo $card['description']; ?></p>
                                                </div>
                                                <div class="card-footer">
                                                    <h3>$<span class="text-title" name="price"><?php echo $card['price']; ?></span></h3>
                                                    <div class="card-button">
                                                        <i class="ri-add-circle-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="card-btn" style=" position: relative; padding-top: 0vh; margin-top: 1.2vh;">
                                                    <button type="submit" class="rentBtn">Buy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
            </div>
            <!-- <div class="down" id="houses" >


            </div> -->
        </div>



        <div class="page3">
            <h4>our items</h4>
            <h1>Products</h1>
            <div class="card" id="card">
                <img src="imgs/Arm Chair.png" alt="">
            </div>
            <div class="card">
                <img src="imgs/stone lamp.png" alt="">
            </div>
            <div class="card">
                <img src="imgs/coffee chair.png" alt="">
            </div>
            <div class="card">
                <img src="imgs/pendant lamp.png" alt="">
            </div>
            <div class="card">
                <img src="imgs/slim chair.png" alt="">
            </div>

        </div>


        <div class="page4">
            <div class="left">
                <img src="imgs/sales.png" alt="img">
            </div>
            <div class="right">
                <h4>World Best Sofas</h4>
                <h1>Sale Ends in 1 Day</h1>
                <button>
                    <a href="#">Order Now<i class="ri-arrow-right-fill"></i></a>
                </button>
            </div>
        </div>


        <div class="page5">
            <div class="left">
                <h4>Best Furniture</h4>
                <h1>Buy or Rent Furniture is now <br> made easier.</h1>
                <p>The Winning Offer Doesn't Always Have To Be The <br>
                    Highest. Our Furniture Buying Agent Help With Making <br>
                    The Best Offer For Your Situation. We Always Include <br>
                    Technical Checks, Reservation Of Funding, And When <br>
                    To Move In Our Final Bidding Strategy. Thanks To <br>
                    Furniture Rental You No Longer need to Worries.
                </p>
                <button>
                    <a href="#">Know more<i class="ri-arrow-right-fill"></i></a>
                </button>
            </div>
            <div class="right">
                <img src="imgs/furniture house.png" alt="img">
            </div>
        </div>


        <div class="page6">
            <div class="up">
                <h2>Find Futurestic Furniture <br> At Budget</h2>
                <div id="filter-buttons">
                    <button class="active" data-filter="Show all">Show all</button>
                    <button data-filter="Chair">Chairs</button>
                    <button data-filter="Velvet Sofa">Sofas</button>
                    <button data-filter="Lamp">Desks</button>
                    <button data-filter="Share House">Pendant LAmp</button>
                </div>
            </div>
            <div class="down">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                    </div>
                </div>
            </div>
        </div>

        <div class="page7">
            <div class="up">
                <h4>CLIENT REVIEWS</h4>
                <h2>We Build In Trust With Our <br> Clients & Agents</h2>
            </div>
            <div class="down">
                <div class="swiper MySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="imgs/5star.png" alt="">
                            <p>"This plugin is amazing with the current <br>
                                version, I can't imagine it, how cool will it <br>
                                be when you finished the all "
                            </p>
                            <div class="profile">
                                <img src="imgs/profileImg1.png" alt="profile">
                                <h3>Michele Smith <br>
                                    <span>CDO of Weblabx</span>
                                </h3>
                                <div class="box"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="imgs/5star.png" alt="">
                            <p>"
                                Furniture Rental Hub was amazing! Found Great Furniture easily & the process
                                was a breeze. Highly recommend! "
                            </p>
                            <div class="profile">
                                <img src="imgs/profileImg2.png" alt="profile">
                                <h3>David Andersin <br>
                                    <span>Satisfied User</span>
                                </h3>
                                <div class="box"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="imgs/4star.png" alt="">
                            <p>"Finally, a Furniture Buy/Rent platform that's user-friendly. Found several Furniture in my budget
                                with all the necessary details. Saved me tons of time searching elsewhere."
                            </p>
                            <div class="profile">
                                <img src="imgs/profileImg3.png" alt="profile">
                                <h3>Marco Villy <br>
                                    <span>Satisfied User</span>
                                </h3>
                                <div class="box"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="imgs/5star.png" alt="">
                            <p>"This plugin is amazing with the current <br>
                                version, I can't imagine it, how cool will it <br>
                                be when you finished the all "
                            </p>
                            <div class="profile">
                                <img src="imgs/profileImg4.png" alt="profile">
                                <h3>Neal Schaffer <br>
                                    <span>Friend</span>
                                </h3>
                                <div class="box"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="imgs/4star.png" alt="">
                            <p>"The Furniture Rental Hub has been a valuable tool for connecting me with potential tenants.
                                The platform is efficient and helps me manage listings effortlessly. "
                            </p>
                            <div class="profile">
                                <img src="imgs/profileImg5.png" alt="profile">
                                <h3>Mike Walter <br>
                                    <span>Our Agent</span>
                                </h3>
                                <div class="box"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page8">
            <div class="up">
                <h4>JOIN WITH US</h4>
                <h2>Do You want to be an <br> Agent?</h2>
                <button>
                    <a href="#">Join Now<i class="ri-arrow-right-fill"></i></a>
                </button>
            </div>
            <div class="down">
                <div class="box" id="one">
                    <img src="imgs/agent1.png" alt="agent">
                    <h3>— Michael Roy</h3>
                    <h4>Realstate Agent</h4>
                </div>
                <div class="box" id="two">
                    <img src="imgs/agent2.png" alt="agent">
                    <h3>— Sofia Rose</h3>
                    <h4>Realstate Agent</h4>
                </div>
                <div class="box" id="three">
                    <img src="imgs/agent3.png" alt="agent">
                    <h3>— James Watt</h3>
                    <h4>Realstate Agent</h4>
                </div>
            </div>
        </div>

        <div class="page9">
            <div class="box">
                <img src="imgs/contact-home.png" alt="">
                <h2><span>Get Best Furniture</span> for<br> your home </h2>
                <p>Put your email address and get listed</p>
                <input type="text" name="" placeholder="Enter your email address"
                    autocomplete="off">
                <button>
                    <a href="#">Get Listed</a>
                </button>
            </div>
        </div>

        <div class="page10">
            <h3>All right Reserved @FurnitureRental, 2024</h3>
            <div class="menu">
                <a href="#">services</a>
                <a href="#">Partners</a>
                <a href="#">Feedbacks</a>
                <a href="#">Booking</a>
            </div>
        </div>






    </div>




    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
        integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        let downCard = document.querySelector(".downCard");

        downCard.addEventListener( "click", function (dets){

        console.log(dets.target.id);

        });

    </script>
</body>

</html>