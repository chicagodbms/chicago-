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
  
	$cust_email = $_POST["account"];
	$password = $_POST["password"];

	
 
 	$pwdpwd = array();
	ini_set('display_errors', 'On');
  $db = '//oracle.cise.ufl.edu/orcl';
  $conn = oci_connect("weiw", "!Zzz2018", $db);
	$query = "select UPASSWORD from CRIMEUSER where UNAME = '".$cust_email."'";
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
    ini_set('display_errors', 'On');
	   $db = '//oracle.cise.ufl.edu/orcl';
    $conn = oci_connect("weiw", "!Zzz2018", $db);
    $query = "select * from CRIMEUSER c  where c.UNAME = '".$cust_email."'";
    $stmt = oci_parse($conn, $query);
  	oci_execute($stmt, OCI_DEFAULT);
    while ($res = oci_fetch_row($stmt)){
		  $name[] = $res[0];
     
	  }
      
    oci_close($conn);
    $_SESSION['NAME'] = $cust_email;
 
      
    $_SESSION['PASSWORD'] = $password;   
    echo "<p>Hi, ".$name[0]."!</p>";

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