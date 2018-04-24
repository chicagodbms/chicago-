<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Manage Products Complete
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
	ini_set('display_errors', 'On');
  $db = "";
  $conn = oci_connect("", "", $db);
  $query = "
    update Shoes_Sponsor
    set Quantity = '".$_POST['Quantity']."', Price = '".$_POST['Price']."'
    where Shoes_ID = '".$_GET['shoes_id']."'";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  oci_commit($conn);
  oci_close($conn);
?>

<p>Successfully Edited.</p>
<p><a href='manage_case%20.php'>Back</a></p>

<div id="footer">
  <a href="admin_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>