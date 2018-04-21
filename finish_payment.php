<?php
	session_start();
?>

<html>
<head>
	<title>
		Online Soccer Shoes Store |  Creating Order
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
  echo "<p>Hello, ".$_SESSION['NAME']."!</p>";
  $random_pid = substr(number_format(time() * rand(),0,'',''),0,4);
  $order_ID = $_SESSION['ORDERID'];
  $email = $_SESSION['EMAIL'];
  $card_NO = $_POST['Card_NO'];
  $expiration = $_POST['Expiration'];
  $card_Type = $_POST['Card_Type'];
  $card_holder_name = $_POST['Card_Holder_Name'];  
  $delivery_date=date("Y-m-d", strtotime("+3 days")); 
  
  ini_set('display_errors', 'On');
  //insert payment 
  $db = "";
  $conn = oci_connect("", "", $db);
  $query = "insert into Payment values ('".$random_pid."','".$card_NO."', '".$card_holder_name."','".$card_Type."', (to_date('".$expiration."','yyyy-mm-dd')), '".$email."')";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  oci_commit($conn);
  oci_close($conn);
     
  //update order 
  $db = "";
  $conn = oci_connect("", "", $db);
  $query = "update Shoes_Order set Order_Status = 'paid'  where  Order_ID='".$order_ID."' ";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  oci_commit($conn);
  oci_close($conn);
  
  //update track 
  $db = "";
  $conn = oci_connect("", "", $db);
  $query = "update Track_Shipment set Delivery_Date = (to_date('".$delivery_date."','yyyy-mm-dd')) where Order_ID='".$order_ID."' ";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  oci_commit($conn);
  oci_close($conn); 
  echo "<p>This order is paid!</p> ";

  echo "<p>THANK YOU! We will ship as soon as possible!</p>";
?>

<p><a href = "check_order.php">Check orders</a></p>
<p><a href = "mainstore.php">Main Store</a></p>

<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>