<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Administrator Change Password
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
	$old = $_POST['old'];
	$new = $_POST['new'];

	$pwdpwd = array();
	ini_set('display_errors', 'On');
	$db = '';
	$conn = oci_connect("", "", $db);
	$query = "select Admin_Password from Administrator where Admin_Email = '".$_SESSION['ADMIN_EMAIL']."'";
	$stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt)){
	  $pwdpwd[] = $res[0];
  }

	oci_close($conn);

	if ((sizeof($new) == 0)||($new==null)) {
		echo "<p>You should not set password to be null value.
				Click <a href = 'admin_change_password.php'>here</a> to reset it.
			 </p>";
	}
	elseif ($old != $pwdpwd[0]) {
		echo "<p>Wrong password.
				Click <a href = 'admin_profile.php'>here</a> to go back.
			 </p>";
	}

	else {
	    ini_set('display_errors', 'On');
	    $db = "";
	    $conn = oci_connect("", "", $db);
	    $query = "
	    	update Administrator set admin_Password = '".$new."' where Admin_Email = '".$_SESSION['ADMIN_EMAIL']."'
	    ";
	    $stmt = oci_parse($conn, $query);
	    oci_execute($stmt, OCI_DEFAULT);
	    oci_commit($conn);
	    oci_close($conn);
	    $_SESSION['ADMIN_PASSWORD'] = $new;
	    echo "<p>Password has been successfully changed.
	    			Click <a href = 'admin_profile.php'>here</a> to go back
	    	  </p>";
	}
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