<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Customer Profile
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
            <li><a href="about.php">About the Database</a></li>
            <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php

	$cust_email = $_POST['cust_email'];
	$password = $_POST['cust_password'];

	if ($cust_email == "" || $cust_email == NULL) {
		$cust_email = $_SESSION['EMAIL'];
	}

	if ($password == "" || $password == NULL) {
		$password = $_SESSION['PASSWORD'];
	}
 
 	$pwdpwd = array();
	ini_set('display_errors', 'On');
	$db = '';
	$conn = oci_connect("", "", $db);
	$query = "select Customer_Password from Customer where Customer_Email = '".$cust_email."'";
	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	while ($res = oci_fetch_row($stmt)){
		$pwdpwd[] = $res[0];
	}
	oci_close($conn);

	if (sizeof($pwdpwd) == 0) {
		echo "<p>There is no such user.</p>
				<p>Click <a href = 'login.php'>here</a> to go back.
			 </p>";
	}

	elseif ($password != $pwdpwd[0]) {
		echo "<p>Wrong password.</p>
				<p>Click <a href = 'login.php'>here</a> to go back.
			 </p>";
	}
 
 	else { 
    $name = array();
    $addr = array();
    $position = array();
    $star_name = array();
    $star_position = array();
    ini_set('display_errors', 'On');
	  $db = '';
	  $conn = oci_connect("", "", $db);
    $query = "select c.Customer_Name, c.Customer_Address, c.Soccer_Position, a.Star_Name, s.Star_Soccer_Position 
    from Customer c, Admire a, Soccer_Star s where c.Customer_Email = a.Customer_Email and a.Star_Name = s.Star_Name and c.Customer_Email = '".$cust_email."'";
    $stmt = oci_parse($conn, $query);
  	oci_execute($stmt, OCI_DEFAULT);
    while ($res = oci_fetch_row($stmt)){
		  $name[] = $res[0];
      $addr[] = $res[1];
      $position[] = $res[2];
      $star_name[] = $res[3];
      $star_position[] = $res[4];
	  }
      
    oci_close($conn);
    $_SESSION['EMAIL'] = $cust_email;
    $_SESSION['NAME'] = $name[0];
   	$_SESSION['CUST_ADDR'] = $addr[0];
    $_SESSION['POSITION'] = $position[0];  
    $_SESSION['PASSWORD'] = $password;   
    echo "<p>Hi, ".$name[0]."!</p>";
    echo "<p>Your address is ".$addr[0].".</p>";
    echo "<p>Your favorite position is ".$position[0].".</p>";
    echo "<p>Your favorite Star is ".$star_name[0].".</p>";
    echo "<p>Your favorite Star's position is ".$star_position[0].".</p>";

    echo "<p>-------------------------------------------------------------</p>";       
    echo "<p>Please choose what you would like to do today:</p>";
    echo "<p><a href = 'update_profile.php'>Update Profile</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'change_password.php'>Change password</a>&nbsp;&nbsp;&nbsp;&nbsp";
		echo "<a href = 'mainstore.php'>Main Store</a>&nbsp;&nbsp;&nbsp;&nbsp";
		echo "<a href = 'check_order.php'>Check orders</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'logout.php'>Logout</a></p>";
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