<html>

<head>
    <title>
        Online Crime Database | Login
    </title>

    <link rel="stylesheet" href="css/stylemain.css" type="text/css" media="all" />
    <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
    <script src="js/jquery.slide.js" type="text/javascript"></script>
    <script src="js/jquery-func.js" type="text/javascript"></script>
<!--    <style>-->
<!--        background-image: url(css/images/chicago.jpg);-->
<!--        background-size: 100%;-->
<!--        background-repeat: no-repeat;-->
<!--    </style>-->
</head>
<!---->
<body background="css/images/chicago4.jpg">
<!--<body>-->

<div id="top">
<!--    <div class="shell">-->
        <div>
            <h1 id="logo"><a href="login.php">Online Database</a></h1>
            <div id="navigation">
                <ul>
                    <li><a href="login.php">Home</a></li>
                    <li><a href="about.php">About the Database</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
</div>

<!--         End Header-->
<!--         Slider-->
<!--        remove the slider-->
<!--        <div id="slider">-->
<!--            <div id="slider-holder">-->
<!--                <ul>-->
<!--                    <li><img src="css/images/slide1.jpg"  /></li>-->
<!--                    <li><img src="css/images/slide2.jpg" alt="" /></li>-->
<!--                    <li><img src="css/images/slide1.jpg" alt="" /></li>-->
<!--                    <li><img src="css/images/slide2.jpg" alt="" /></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div id="slider-nav"> <a href="#" class="prev">Previous</a> <a href="#" class="next">Next</a> </div>-->
<!--        </div>-->
<!--         End Slider-->
<!--    </div>-->

<div class="main">
    <br>

    <p> Welcome to our online crime database!</p><br>

    <?php
    echo"______Customers______";
    ?>

    <p>Please log in before using</p>
    <form action="cust_profile.php" method="post">
        Customer Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<input type="text" name="cust_email" /> <br>
        Customer Password: <input type="password" name="cust_password" /> <br>
        <input type="submit" class="myButton" value="Sign in"/> <br>
    </form>

    <br><p>Please signup if you do not have an account</p>
    <form action="signupold.php" method = "post">
        <input type="submit" class="myButton" value="Sign up"/>
    </form>

    <br><p>------------------------------------------</p>

    <?php
    echo"______Administrator______";
    ?>

    <p>Please login for management</p>
    <form action="admin_profile.php" method="post">
        Administrator Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<input type="text" name="admin_email" /> <br>
        Administrator Password: <input type="password" name="admin_password" /> <br>
        <input type="submit" class="myButton" value="Sign in"/> <br>
    </form>

    <div id="footer">
        <a href="login.php">Home</a> <span>|</span>
        <a href="about.php">About the Database</a> <span>|</span>
        <a href="contact.php">Contact</a>
    </div>

</body>
</html>