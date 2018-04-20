<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Administrator Change password
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
          <li><a href="about.php">About the Store</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
  if ($_SESSION['ADMIN_EMAIL'] == ""){
     echo "<p>Please login as an administrator before trying to change poassword. </p>";
     echo "<p>Click <a href='login.php'>here</a> to come back. </p>";
   }
  else{ 
    echo '<p>Please enter your old and new password</p><br>';
    echo '<form action="admin_finish_change_password.php" method="post">
  	Old Password: <input type="password" name="old" /> <br>
  	New Password: <input type="password" name="new" /> <br><br>
  	<input type="submit" class="myButton" value="Submit"/> <br>
    </form>';

    echo '<p><a href = "admin_profile.php">Back to Home page. </a></p>';
  }
?> 
<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>