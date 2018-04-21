<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Check Track
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
  echo "<p>Hello, ".$_SESSION['NAME'].", your order ".$_GET['order_id']." detail is as follows!</p>";
  //order
  $Order_ID=$_GET['order_id'];
  
  $Shoes_Name=array();
  $Size_NO=array();
  $Order_Quantity=array(); 
  
  $db = '';
	$conn = oci_connect("", "", $db);
  $query = "select S.Shoes_Name, S.Size_NO, C.Order_Quantity from corresponds C, Shoes_Sponsor S where C.Order_ID='".$Order_ID."' AND C.Shoes_ID = S.Shoes_ID";
  $stmt = oci_parse($conn, $query);
 	oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt))
  {
    $Shoes_Name[]=$res[0];
    $Size_NO[]=$res[1];
    $Order_Quantity[]=$res[2];

  }
  oci_close($conn);
  
  $order = "
    <table border='1'>
      <tr>
        <th>Shoes Name</th>
        <th>Size</th>
        <th>Quantity</th>
      </tr>";

  for ($i = 0; $i < sizeof($Shoes_Name); $i++) {
    $order = $order."
      <tr>
        <td>".$Shoes_Name[$i]."</td>
        <td>".$Size_NO[$i]."</td>
        <td>".$Order_Quantity[$i]."</td>
      </tr>";
  }

  $order = $order."</table>";
  echo $order; 
  echo "<br>";
  
  //track
  $Track_ID = array();
  $Delivery_Date=array();
  $Shipment_Carrier=array();
  $Delivery_Status=array();
  $Ship_Price=array(); 
    
  ini_set('display_errors', 'On');
  $db = '';
	$conn = oci_connect("", "", $db);
  $query = "select * from Track_Shipment where Order_ID='".$Order_ID."'";
  $stmt = oci_parse($conn, $query);
 	oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt))
  {
    $Track_ID[]=$res[0];
    $Delivery_Date[]=$res[1];
    $Shipment_Carrier[]=$res[2];
    $Delivery_Status[]=$res[4];
    $Ship_Price[]=$res[5];
  }
  oci_close($conn);

	if (sizeof($Track_ID) == 0) 
  {
	  echo "<p>You have no track information up to now.</p>";
  }
  else
  {
    echo "<p>You have the following track information for orders.</p>";
    $tracks = "
      <table border='1'>
      <tr>
      <th>Track_ID</th>
      <th>Delivery_Date</th>
      <th>Shipment_Carrier</th>
      <th>Order_ID</th>
      <th>Delivery_Status</th>
      <th>Ship_Price</th>
      </tr>";

    for ($i = 0; $i < sizeof($Track_ID); $i++) {
      $tracks = $tracks."
      <tr>
      <td>".$Track_ID[$i]."</td>
      <td>".$Delivery_Date[$i]."</td>
      <td>".$Shipment_Carrier[$i]."</td>
      <td>".$Order_ID."</td>
      <td>".$Delivery_Status[$i]."</td>
      <td>".$Ship_Price[$i]."</td>
      </tr>";
    }

    $tracks = $tracks."</table>";
    echo $tracks;   
    echo "<p>*If there is nothing in delivery date, you haven't pay for that order. </p>";
  }  
?>

<p><a href = "check_order.php">Back to all orders. </a></p>
<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>

