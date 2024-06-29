<?php

	include("connection.php");
	error_reporting(0);

?>



<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Rentalhub Login </title>
        <link rel="stylesheet" href="login.css">
		<link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>

		<div class="main">
			<div class="left">
			<div class="logo">
                    <i class="ri-home-heart-line"></i>
                    Furniture <span>Rental</span>
                </div>
				<div class="overlay"></div>
				<h1>The Best Place to <br>Rent and Buy <span>Furniture</span></h1>
			</div>
			<section class="container forms">
				<div class="form login">
					<div class="form-content">
						<header>Login</header>
						<form action="#" method="post">
							<div class="field input-field">
								<input type="email" name="emailId" required placeholder="Email" class="input">
							</div>
	
							<div class="field input-field">
								<input type="password" name="pwd" required placeholder="Password" class="password">
								<i class='bx bx-hide eye-icon'></i>
							</div>
	
							<div class="form-link">
								<a href="#" class="forgot-pass">Forgot password?</a>
							</div>
	
							<div class="field button-field">
								<button type="submit" name="login">
									Submit
								</button>
							</div>
						</form>
	
						<div class="form-link">
							<span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span> <br>
							<span>are you a Admin? <a href="isadmin.php" >Signup</a></span>

						</div>
					</div>
	
					<div class="line"></div>
	
					<div class="media-options">
						<a href="#" class="field facebook">
							<i class='bx bxl-facebook facebook-icon'></i>
							<span>Login with Facebook</span>
						</a>
					</div>
	
					<div class="media-options">
						<a href="#" class="field google">
							<img src="imgs/glogo.png" alt="" class="google-img">
							<span>Login with Google</span>
						</a>
					</div>
	
				</div>
	
				<!-- Signup Form -->
	
				<div class="form signup">
					<div class="form-content">
						<header>Signup</header>
						<form action="" method="post">

							<div class="field input-field">
								<input type="text" name="firstName" required placeholder="First Name" class="input">
							</div>
	
							<div class="field input-field">
								<input type="text" name="lastName" required placeholder="Last Name" class="password">
							</div>

							<div class="field input-field">
								<input type="email" name="email" required placeholder="Email" class="input">
							</div>
	
							<div class="field input-field">
								<input type="password" name="password"  placeholder="Create password" class="password" required>
							</div>
	
							<div class="field input-field">
								<input type="password" name="rePassword"  placeholder="Confirm password" class="password" required>
								<i class='bx bx-hide eye-icon'></i>
							</div>
	
							<div class="field button-field">
								<button type="submit" name="submit">
										Signup
								</button>
							</div>
						</form>
	
						<div class="form-link">
							<span>Already have an account? <a href="#" class="link login-link">Login</a></span>
						</div>
					</div>
	
				</div>
			</section>
		</div>
        

        <script src="login.js"></script>
    </body>
</html>


<?php
	require 'connection.php';
	if (isset($_POST["submit"])){
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$email=$_POST["email"];
		$password = $_POST["password"];
		$repassword = $_POST["rePassword"];
		$duplicate = mysqli_query($conn , "select * from signup where Email='$email'");
		if(mysqli_num_rows($duplicate)>0){
			echo "<script>alert(' Email already Exists. ')</script>";
		}
		else{
			if($password == $repassword){
				// $q="insert into `login_data`.`userdata` values ('', '$name', '$email', '$password')";
				$sql = "INSERT INTO signup VALUES ('' ,'$firstName','$lastName','$email','$password')";

				mysqli_query($conn,$sql);
				echo "<script>alert(' User Registration Successful. Please Login to Continue. ')</script>";
			}
			else{
				echo "<script>alert(' Wrong Email or Password ! ')</script>";
			}
		}

	}

	if(isset($_POST["login"])){
		$emailId= $_POST["emailId"];
		$pwd = $_POST["pwd"];
		$result=mysqli_query($conn , "SELECT * from signup where Email='$emailId'");
		$row= mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result)>0){
			if($pwd == $row["Password"]){
				$_SESSION["login"]=true;
				$_SESSION["id"]=$row["id"];
				header("location: index.php");
			}
			else{
				echo "<script>alert(' Wrong Email or Password! ')</script>";
			}
		}else{
			echo "<script>alert(' Please Register your self first! ')</script>";
	
		}
	
	}

?> 

