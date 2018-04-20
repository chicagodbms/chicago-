<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Administrator Profile
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
          <li><a href="admin_profile.php">Home</a></li>
          <li><a href="about.php">About the Store</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
	$admin_email = $_POST['admin_email'];
	$admin_password = $_POST['admin_password'];

	if ($admin_email == "" || $admin_email == NULL) {
		$admin_email = $_SESSION['ADMIN_EMAIL'];
	}

	if ($admin_password == "" || $admin_password == NULL) {
		$admin_password = $_SESSION['ADMIN_PASSWORD'];
	}
 
 	$pwdpwd = array();
	ini_set('display_errors', 'On');
	$db = '';
	$conn = oci_connect("", "", $db);
	$query = "select Admin_Password from Administrator where Admin_Email = '".$admin_email."'";
	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	while ($res = oci_fetch_row($stmt)){
		$pwdpwd[] = $res[0];
	}
	oci_close($conn);

	if (sizeof($pwdpwd) == 0) {
		echo "<p>This is no such administrator.
				Click <a href = 'login.php'>here</a> to go back.
			 </p>";
	}

	elseif ($admin_password != $pwdpwd[0]) {
		echo "<p>Wrong password.
				Click <a href = 'login.php'>here</a> to go back.
			 </p>";
	}
 
 	else { 
    $admin_name = array();
    ini_set('display_errors', 'On');
	  $db = '';
	  $conn = oci_connect("", "", $db);
    $query = "select Admin_Name from Administrator where Admin_Email = '".$admin_email."'";
    $stmt = oci_parse($conn, $query);
  	oci_execute($stmt, OCI_DEFAULT);
    while ($res = oci_fetch_row($stmt)){
		  $admin_name[] = $res[0];
	  }
      
    oci_close($conn);
    $_SESSION['ADMIN_EMAIL'] = $admin_email;
    $_SESSION['ADMIN_NAME'] = $admin_name[0]; 
    $_SESSION['ADMIN_PASSWORD'] = $admin_password;   
    echo "<p>Hi, Administrator ".$admin_name[0]."!</p>";

    echo "<p>-------------------------------------------------------------</p>";       
    echo "<p>Please choose what you would like to do today:</p>";
    echo "<a href = 'admin_change_password.php'>Change password</a>&nbsp;&nbsp;&nbsp;&nbsp";
		echo "<a href = 'manage_order.php'>Manage orders</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'manage_products.php'>Manage products</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'manage_stars.php'>Manage Stars</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'logout.php'>Logout</a></p>";
  }
?>
 
<div id="footer">
  <a href="admin_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>