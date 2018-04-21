<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Change Password
	</title>
  <link rel="stylesheet" href="css/style_all.css" type="text/css" media="all" />
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
	$old = $_POST['old'];
	$new = $_POST['new'];

	$pwdpwd = array();
	ini_set('display_errors', 'On');
    $db = "";
    $conn = oci_connect("", "", $db);
	$query = "select Customer_Password from Customer where Customer_Email = '".$_SESSION['EMAIL']."'";
	$stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt)){
	  $pwdpwd[] = $res[0];
  }

	oci_close($conn);

	if ((sizeof($new) == 0)||($new==null)) {
		echo "<p>You should not set password to be null value.
				Click <a href = 'change_password.php'>here</a> to reset it.
			 </p>";
	}
	elseif ($old != $pwdpwd[0]) {
		echo "<p>Wrong password.
				Click <a href = 'cust_profile.php'>here</a> to go back.
			 </p>";
	}

	else {
	    ini_set('display_errors', 'On');
   		$db = "";
   		$conn = oci_connect("", "", $db);
	    $query = "
	    	update Customer set Customer_Password = '".$new."' where Customer_Email = '".$_SESSION['EMAIL']."'
	    ";
	    $stmt = oci_parse($conn, $query);
	    oci_execute($stmt, OCI_DEFAULT);
	    oci_commit($conn);
	    oci_close($conn);
	    $_SESSION['PASSWORD'] = $new;
	    echo "<p>Password has been successfully changed.
	    			Click <a href = 'cust_profile.php'>here</a> to go back. 
	    	  </p>";
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