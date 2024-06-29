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
    margin-top: 6vh;
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
        background: #f5f5f5;
        position: relative;
        border-radius: .5rem;
        box-shadow: 1px 1px 10px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: 1s ease;
        opacity: 1;
    }

    .card-img {
        cursor: pointer;
        background-color: #84caa6;
        height: 63%;
        width: 100%;
        border-radius: .5rem;
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
        font-size: 1.2em;
        line-height: 1.3;
    }

    .text-title i{
        font-size: 1em;
    }

   .text-body {
       font-size: .9em;
       padding-bottom: 10px;
       color: #5b5e6392;
       font-weight: 600;
        padding-left: .4vw;
   }
   
   .card-button {
    border: 1px solid #252525;
    display: flex;
    padding: .3em;
    cursor: pointer;
    border-radius: 50px;
    transition: .3s ease-in-out;
    }

    .card-img:hover {
        transform: scale(.97);
        box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
    }
   
    .card-button.hide, .card-button:hover {
       border: 1px solid #ffcaa6;
       background-color: #ffcaa6;
    }

    .rentBtn:hover{
        background-color: black;
    }
   

    </style>
    <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
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
                    <a href="#" id="active">Home</a>
                    <!-- <a href="card_list.php">Listed</a> -->
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

            <div class="hero">
                <div class="container">
                    <h1>Find Your Perfect <br>
                        Future Home
                    </h1>
                    <p>Search confidently with your trusted source of <br>
                        homes for sale or rent.
                    </p>
                </div>
            </div>
        </div>

        <div class="page2">
            <div class="up">
                <h2>New Listed Apartments</h2>
                <p>With over 2000+ homes for rent in available on the Rental Hub</p>
                <input type="text" name="" id="find" placeholder="search by city here...." onkeyup="search()"
                    autocomplete="off">
                <input type="text" name="" id="price" placeholder="search by price here...." onkeyup="searchPrice()"
                    autocomplete="off">
                <input type="text" name="" id="room" placeholder="search by rooms here...." onkeyup="searchRoom()"
                    autocomplete="off">
                <div class="filter-btn">
                    <button title="filter" class="filter">
                        <i class="ri-equalizer-line"></i>
                    </button>
                </div>
                <!-- <div id="filter-buttons">
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
                                                    <h6 class="text-title"><i class="ri-map-pin-line"></i> <?php echo $card['title']; ?> </h6>
                                                    <p class="text-body"><?php echo $card['description']; ?></p>
                                                </div>
                                                <div class="card-footer">
                                                    <h3>Rs.</h3><span style="margin-left: -5vw;" class="text-title" name="price"><?php echo $card['price']; ?></span><h3 style="margin-left: -5vw;">/month</h3>
                                                    <div class="card-button">
                                                        <i class="ri-bookmark-line"></i>
                                                    </div>
                                                </div>
                                                <div class="card-btn" style=" position: relative; padding-top: 0vh; margin-top: 1.2vh;">
                                                    <button type="submit" class="rentBtn" style="width: 100%; padding: 1vh 2vw; border-radius: .3rem; border: 1px solid #016450; background-color: #016450; color: #fff; font-size: 1vw; cursor: pointer;">Rent</button>
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
            <h4>our services</h4>
            <h1>How Rental Hub can help</h1>
            <div class="card">
                <div class="box"></div>
                <div class="card-info">
                    <img src="imgs/home search.png" alt="">
                    <div class="card-title">Search your dream <br> home</div>
                </div>
            </div>
            <div class="card">
                <div class="box"></div>
                <div class="card-info">
                    <img src="imgs/home buy.png" alt="">
                    <div class="card-title">Buy your dream <br> home</div>
                </div>
            </div>
            <div class="card">
                <div class="box"></div>
                <div class="card-info">
                    <img src="imgs/home sell.png" alt="">
                    <div class="card-title">Easily Sell your <br> home</div>
                </div>
            </div>
            <div class="card">
                <div class="box"></div>
                <div class="card-info">
                    <img src="imgs/house rent.png" alt="">
                    <div class="card-title">Rent your home <br> you love</div>
                </div>
            </div>
            <div class="card">
                <div class="box"></div>
                <div class="card-info">
                    <img src="imgs/partner.png" alt="">
                    <div class="card-title">Be partner with <br> Rentalhub</div>
                </div>
            </div>

        </div>


        <div class="page4">
            <div class="left">
                <img src="imgs/about.png" alt="img">
            </div>
            <div class="right">
                <h4>ABOUT US</h4>
                <h1>Helping People to <br> Find their Home</h1>
                <p>RentalHub can help you easily find a home of the, <br>
                    apartment for rent, sell and buy that you'll love. As <br>
                    with any new technology, building designers <br>
                    experiment and learn from each other in the pursuit <br>
                    of new solutions. can help you easily find a home, <br>
                    apartment for rent, sell and buy that you'll love.
                </p>
                <button>
                    <a href="#">Know more<i class="ri-arrow-right-fill"></i></a>
                </button>
            </div>
        </div>


        <div class="page5">
            <div class="left">
                <h4>SELL HOME</h4>
                <h1>Home selling is now <br> made easier.</h1>
                <p>The Winning Offer Doesn't Always Have To Be The <br>
                    Highest. Our Walter Buying Agent Help With Making <br>
                    The Best Offer For Your Situation. We Always Include <br>
                    Technical Checks, Reservation Of Funding, And When <br>
                    To Move In Our Final Bidding Strategy. Thanks To <br>
                    Walter You No Longer.
                </p>
                <button>
                    <a href="#">Know more<i class="ri-arrow-right-fill"></i></a>
                </button>
            </div>
            <div class="right">
                <img src="imgs/sellHome.png" alt="img">
            </div>
        </div>


        <div class="page6">
            <div class="up">
                <h2>Find Future Space <br> At Budget</h2>
                <div id="filter-buttons">
                    <button class="activa" data-filter="Show all">Show all</button>
                    <button data-filter="Apartment">Apartment</button>
                    <button data-filter="Office Space">Office Space</button>
                    <button data-filter="Full Property">Full Property</button>
                    <button data-filter="Share House">Share House</button>
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
                                House Rental Hub was amazing! Found my dream apartment easily & the application process
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
                            <p>"Finally, a rental platform that's user-friendly. Found several listings in my budget
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
                            <p>"The House Rental Hub has been a valuable tool for connecting me with potential tenants.
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
                <h2><span>Get listed</span> your home <br> as a owner</h2>
                <p>Put your email address and get listed</p>
                <input type="text" name="" placeholder="Enter your email address"
                    autocomplete="off">
                <button>
                    <a href="#">Get Listed</a>
                </button>
            </div>
        </div>

        <div class="page10">
            <h3>All right Reserved @Rentalhub, 2024</h3>
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