<html>

<head>
  <title>
    Online Soccer Shoes Store | Logout
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
          <li><a href="login.php">Home</a></li>
          <li><a href="about.php">About the Store</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
  session_start();
	session_destroy();
?>

<p>Log out successfully. </p>
<p>Click <a href = "login.php">here</a> to log in again.</p>

<div id="footer">
  <a href="login.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>

</body>
</html>