<?php
	session_start(); 
?>

<html>

<head>
	<title>
        Online Crime Database | Customer Signup
	</title>

<!--    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/loginstyle.css" rel='stylesheet' type='text/css' />
    <!--fonts-->

<!--    <link href="css/style.css" rel='stylesheet' type='text/css' />-->
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
<!--<div id="top">-->
<!--    <!--    <div class="shell">-->
<!--    <div>-->
<!--        <h1 id="logo"><a href="login.php">Online Database</a></h1>-->
<!--        <div id="navigation">-->
<!--            <ul>-->
<!--                <li><a href="login.php">Home</a></li>-->
<!--                <li><a href="about.php">About the Database</a></li>-->
<!--                <li><a href="contact.php">Contact</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<div class="login-w3l">
    <div class="login-form">
        <h2 class="sub-head-w3-agileits">Please fill in registration below</h2>
        				<div class="social-bottons-w3ls">
        				<a href="#" class="hvr-shutter-out-vertical facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span>Sign in with Facebook</span></a>
        				<a href="#" class="hvr-shutter-out-vertical twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span>Sign in with Twitter</span></a>
        				</div>

                        <form action="signup.php" method = "post">
                            <input type="submit" class="myButton" value="Sign up"/>
                        </form>
        <form action="admin_profile.php" method="post">
            <div class="inputs-w3ls">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input type="email" name="Username" placeholder="Input your username" required=""/>
            </div>
            <div class="inputs-w3ls">
                <i class="fa fa-key" aria-hidden="true"></i>
                <input type="password" name="Password" placeholder="Input your password" required=""/>
            </div>
            <input type="submit" value="Sign Up">
            <!--                    <input type="submit" value="Sign Up">-->
        </form>
<!--        <form action="signup.php" method = "post">-->
<!--            <input type="submit" value="Sign up"/>-->
<!--        </form>-->
    </div>
</div>>

<?php
	$star_names = array();
	ini_set('display_errors', 'On');
	$db = '';
	$conn = oci_connect("", "", $db);
	$stmt = oci_parse($conn, "select Star_Name from Soccer_Star");
	oci_execute($stmt, OCI_DEFAULT);
	while ($res = oci_fetch_row($stmt)){
		$star_names[] = $res[0];
	}

	oci_close($conn);

	echo '<form name = "main_form" action="finish_signup.php" onsubmit="return validateForm()" method="post">
		Email: <input type="text" name="email" /> &nbsp;&nbsp;&nbsp;&nbsp
		First Name: <input type="text" name="name" />
    Last Name: <input type="text" name="name2" /> <br>';


  echo '
    Password: <input type="password" size= "9" name="password">&nbsp;&nbsp;&nbsp;&nbsp
	  Position:
		<select id = "position" name = "position">
  		<option value ="DEFENDER">DEFENDER</option>
  		<option value ="ATTACKER">ATTACKER</option>
      <option value ="GOALKEEPER">GOALKEEPER</option>
      <option value ="MIDFIELDER">MIDFIELDER</option>
		</select><br>
		Admired star: <select name="admire_star">';

  for($i = 0; $i < sizeof($star_names); $i++){
	  echo '<option value="';
	  echo $star_names[$i];
	  echo'">';
	  echo $star_names[$i];
	  echo '</option>';
	}
  echo '</select> &nbsp;&nbsp;&nbsp;&nbsp';
	echo  'Address: <input type="text" name="address" /> <br>	';

	echo '<br><input type="submit" class="myButton" value="Submit" /></form>';
?>

<p>Click <a href = "login.php">here</a> to log in if you remember your information.</p>

<div id="footer">
  <a href="login.php">Home</a> <span>|</span> 
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>
