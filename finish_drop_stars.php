<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Drop Stars Complete
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
	ini_set('display_errors', 'On');
  $db = "";
  $conn = oci_connect("", "", $db);
  $query = "
    delete from Soccer_Star s where s.Star_Name = '".$_GET['star_name']."'";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  oci_commit($conn);
  oci_close($conn);
  
	ini_set('display_errors', 'On');
  $db = "";
  $conn = oci_connect("", "", $db);
  $query = "
    delete from Admire a where a.Star_Name = '".$_GET['star_name']."'";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  oci_commit($conn);
  oci_close($conn);  
?>

<p>Successfully Dropped.</p>
<p><a href='manage_stars.php'>Back</a></p>

<div id="footer">
  <a href="admin_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>

</body>
</html>