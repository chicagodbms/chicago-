<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<title> Online Crime Database | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/loginstyle.css" rel='stylesheet' type='text/css' />
<!--fonts-->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
<!--//fonts--> 
</head>
<body>
<div class="video" data-vide-bg="video/water">
<div class="center-container">
<!--background-->
<!-- login -->
<h1>Welcome to our online crime database</h1>
	        <div class="login-w3l">

			<div class="login-form">
				<h2 class="sub-head-w3-agileits">Sign In</h2>
<!--				<div class="social-bottons-w3ls">-->
<!--				<a href="#" class="hvr-shutter-out-vertical facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span>Sign in with Facebook</span></a>-->
<!--				<a href="#" class="hvr-shutter-out-vertical twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span>Sign in with Twitter</span></a>-->
<!--				</div>-->

<!--                <form action="signup.php" method = "post">-->
<!--                    <input type="submit" class="myButton" value="Sign up"/>-->
<!--                </form>-->
				<form action="dashboard.php" method="post">
					<div class="inputs-w3ls">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="email" name="Email" placeholder="Username" required=""/>
					</div>
					<div class="inputs-w3ls">
						<i class="fa fa-key" aria-hidden="true"></i>
						<input type="password" name="Password" placeholder="Password" required=""/>
					</div>
					<input type="submit" value="Sign In">
<!--                    <input type="submit" value="Sign Up">-->
				</form>
                <form action="signup.php" method = "post">
                    <input type="submit" value="Sign up"/>
                </form>
			</div>

                <div style="height=10px"><p> &nbsp </p></div>

            <div class="login-form" style="float:left">
                <h2 class="sub-head-w3-agileits">Administrator Sign In</h2>
<!--                <div class="social-bottons-w3ls">-->
<!--                    <a href="#" class="hvr-shutter-out-vertical facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span>Sign in with Facebook</span></a>-->
<!--                    <a href="#" class="hvr-shutter-out-vertical twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span>Sign in with Twitter</span></a>-->
<!--                </div>-->
                <form action="adminpage.php" method="post">
                    <div class="inputs-w3ls">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" name="Email" placeholder="Username" required=""/>
                    </div>
                    <div class="inputs-w3ls">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <input type="password" name="Password" placeholder="Password" required=""/>
                    </div>
                    <input type="submit" value="Sign In">
<!--                    <input type="submit" value="Sign Up">-->
                </form>
<!--                <form action="signup.php" method = "post">-->-->
<!--                    <input type="submit" value="Sign up"/>-->
<!--                </form>-->
            </div>

			<!-- //login -->
				</div> 
				<div class="clear"></div>
            <div id="footer">
                <a href="login.php">Home</a> <span>|</span>
                <a href="about.php">About the Database</a> <span>|</span>
                <a href="contact.php">Contact</a>
            </div>
			<div class="footer-agileits">
			<p>© 2018 Online Crime Databas. All Rights Reserved | Design by <a href="https://github.com/GrandStar/chicago-/"> DBMS no crime goupe</a></p>
			</div>
			<!--//login-->
			</div>
			</div>
<!--js-->
		<script src="js/jquery-2.2.3.min.js"></script> 
		<script src="js/jquery.vide.min.js"></script>
<!--//js-->

</body>
</html>