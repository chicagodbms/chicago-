<?php
/**
 * Created by IntelliJ IDEA.
 * User: grandstar
 * Date: 18/4/24
 * Time: 下午8:23
 */?>

<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title> Online Crime Database | Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--     jQuery (necessary for Bootstrap's JavaScript plugins)-->
<!--     Custom Theme files-->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/loginstyle.css" rel='stylesheet' type='text/css' />
    <!--fonts-->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">

    <script>
        function onlyChar(x){
            var len = x.length;
            if (len == 0)
                return false;
            for (var i = 0; i < len; i ++){
                var c = x.charCodeAt(i);
                if (c < 65|| (c >90 && c < 97) || c > 122)
                    return false;
            }
            return true;
        }

        function validateEmail() {
            var x = document.forms["main_form"]["email"].value;
            var re = new RegExp('[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}');
            if (x == null || x == ""){
                alert("Email must be filled out. ");
                return false;
            }
            else if (!x.match(re)) {
                alert("Email should be in the form abc@abc. ");
                return false;
            }
            return true;
        }

        function validateNames() {
            var x = document.forms["main_form"]["name"].value;
            if (x == null || x == ""){
                alert("Names must be filled out. ");
                return false;
            }
            else if (!onlyChar(x)){
                alert("Names must be characters only. ");
                return false;
            }
            return true;
        }
        function validatePassword() {
            var x = document.forms["main_form"]["password"].value;
            if (x == null || x == "") {
                alert("Password must be filled out. ");
                return false;
            }

            if (x.length > 15) {
                alert("Password must be 10 digits at most. ");
                return false;
            }
            return true;
        }

        function validateAddress() {
            var x = document.forms["main_form"]["address"].value;
            if (x == null || x == ""){
                alert("Address must be filled out. ");
                return false;
            }
            return true;
        }

        function validateForm(){
            if (!validateEmail() || !validateNames() || !validatePassword()|| !validateAddress())
                return false;
        }
    </script>
</head>
<body background="css/images/chicago4.jpg">
<div class="video" data-vide-bg="video/water">

<div class="center-container">
        <!--background-->
        <!-- login -->
        <h1>Please fill in the blank</h1>
        <div class="login-w3l">

            <div class="login-form">
                <h2 class="sub-head-w3-agileits">Sign Up</h2>
                <!--				<div class="social-bottons-w3ls">-->
                <!--				<a href="#" class="hvr-shutter-out-vertical facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span>Sign in with Facebook</span></a>-->
                <!--				<a href="#" class="hvr-shutter-out-vertical twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span>Sign in with Twitter</span></a>-->
                <!--				</div>-->

                <!--                <form action="signup.php" method = "post">-->
                <!--                    <input type="submit" class="myButton" value="Sign up"/>-->
                <!--                </form>-->
                <form action="mainpage.php" method="post">
                    <div class="inputs-w3ls">
                        <h3 class="sub-head-w3-agileits">Please enter E-mail</h3>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" name="Email" placeholder="Username" required=""/>
                    </div>
                    <div>&nbsp</div>
                    <div>&nbsp</div>
                    <div>&nbsp</div>
                    <div class="inputs-w3ls">
                        <h3 class="sub-head-w3-agileits">Please enter your passwords</h3>
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <input type="password" name="Password" placeholder="Password" required=""/>
                    </div>

                    <div class="inputs-w3ls">
                        <h3 class="sub-head-w3-agileits">Please enter your passwords twice</h3>
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <input type="password" name="Password" placeholder="Password" required=""/>
                    </div>

                    <div>&nbsp</div>
                    <div>&nbsp</div>
                    <input type="submit" value="Sign up">
                    <!--                    <input type="submit" value="Sign Up">-->
                </form>
            </div>
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