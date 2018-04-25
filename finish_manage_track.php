<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Manage Track Complete
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
    update Track_Shipment
    set Delivery_Date = '".$_POST['Delivery_Date']."', Shipment_Carrier = '".$_POST['Shipment_Carrier']."', 
    Delivery_Status = '".$_POST['Delivery_Status']."', Ship_Price = '".$_POST['Ship_Price']."'
    where Track_ID = '".$_GET['track_id']."'";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  oci_commit($conn);
  oci_close($conn);
  $Order_ID=$_SESSION['OrderID_for_track'];

  echo "<p>Successfully Edited.</p>";
  echo "<p><a href='manage_track.php?order_id=$Order_ID'>Back</a></p>";
?>

<div id="footer">
  <a href="admin_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>