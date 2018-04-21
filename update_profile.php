<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Update Profile
	</title>
  <link rel="stylesheet" href="css/style_mainstore.css" type="text/css" media="all" />
</head>

<body>
<div id="top">
  <div class="shell">
    <div id="header">
      <h1 id="logo"><a href="login.php">Online Store</a></h1>
      <div id="navigation">
        <ul>
          <li><a href="cust_profile.php">Home</a></li>
          <li><a href="about.php">About the Database</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<p> Your Current information is as follows, </p>
  
<?php  
  echo "<p>Address is ".$_SESSION['CUST_ADDR'].".</p>";
  echo "<p>Favorite position is ".$_SESSION['POSITION'].".</p>";  
?>
	  
  <br><p> Please fill out the new information below, </p>
  <form action="finish_update_profile.php" method="post">
	 Address: <input type="text" name="address" size="40" value="<?php echo $_SESSION['CUST_ADDR'] ?>" /><br>
	 Position: <input type="text" name="position" size="40" value="<?php echo $_SESSION['POSITION'] ?>" /><br>
	 <br><input type="submit" class="myButton" value="Done"><br>
	</form>
	<p><br><a href = "cust_profile.php">Back to Home page. </a></p>

<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>