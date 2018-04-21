<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store |  Created Order
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
/*
  if ((bool?) $_SESSION['ORDERID'] != null) {
    $random_id = $_SESSION['ORDERID'];
    $shoeID = $_SESSION['SHOEID'];
    $quantity = $_POST['quantity'];
    
    ini_set('display_errors', 'On');
    $db = "";
    $conn = oci_connect("", "", $db);
    $query = "insert into corresponds values ('".$random_id."','".$shoeID."', '".$quantity."')";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
     
     // update quantity 
    
    
  } else {
     $random_id = substr(number_format(time() * rand(),0,'',''),0,8);
  }   
  */
  $random_id = substr(number_format(time() * rand(),0,'',''),0,8);
  $now_quantity = array();
  $Shoes_Name = "";
  $random_track = substr(number_format(time() * rand(),0,'',''),0,5);
     
  ini_set('display_errors', 'On');
  echo "<p>Hello, ".$_SESSION['NAME']."!</p>";
       
  $shoeID = $_SESSION['SHOEID'];
  $personalizeTag = $_POST['personalizeTag'];
  $quantity = $_POST['quantity'];
  $address = $_POST['address'];
  $shipment = $_POST['shipment'];
  $consigneeName = $_POST['consigneeName'];
  $consigneePhone = $_POST['consigneePhone'];
  $email = $_SESSION['EMAIL'];
       
  //check if quantity is ok
  $db = "";
  $conn = oci_connect("", "", $db);
  $query = "select Quantity, Shoes_Name from Shoes_Sponsor where Shoes_ID='".$shoeID."'";       
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  
 	while ($res = oci_fetch_row($stmt)){
	  $now_quantity[] = $res[0];
    $Shoes_Name = $res[1];
	}
  oci_close($conn);
  
  $cant=0;
  if ($now_quantity[0] < $quantity) {
    $cant = 1;     
  }
     
  if($cant){
    echo "<p>There is not enough shoes, please change to a smaller quantity. </p>
      <p>Click <a href = 'purchase.php?shoesName=$Shoes_Name'>here</a> to go back.</p>";
  }
  else{ 
    $db = "";
    $conn = oci_connect("", "", $db);
    $query = "insert into Shoes_Order values ('".$random_id."','unpaid','".$email."', '".$consigneeName."','".$consigneePhone."','".$address."','".$personalizeTag."','".$random_track."')";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
    
    $db = "";
    $conn = oci_connect("", "", $db);
    $query = "insert into Track_Shipment values ('".$random_track."',null,'".$shipment."', '".$random_id."','not_shipping','0')";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
         
    $db = "";
    $conn = oci_connect("", "", $db);
    $query = "insert into corresponds values ('".$random_id."','".$shoeID."', '".$quantity."')";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
     
     // update quantity 
    $new = $now_quantity[0] - $quantity;
    $db = "";
    $conn = oci_connect("", "", $db);
    $query = "update Shoes_Sponsor set Quantity = '".$new."'  where  Shoes_ID='".$shoeID."' ";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
     
    echo "<p>Great, your order id is ".$random_id."!</p>"; 
    echo "<p>Please pay the order ASAP!</p>";
    $_SESSION['ORDERID'] = $random_id;
    
    echo '<p><a href = "payment.php">Pay now!</a></p>';
    echo '<p><a href = "mainstore.php">Store in bucket and buy more</a></p>';
    echo '<p><a href = "check_order.php">Check orders</a></p>';
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
