<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Check Order
	</title>
  <link rel="stylesheet" href="css/style_mainstore.css" type="text/css" media="all" />
  <script>
  function a (x){
    alert("1");
    return false;
  }
 
  </script>
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
  echo "<p>Hi, ".$_SESSION['NAME']."!</p><br>";

  $Order_ID = array();
  $Order_Status=array();
  $Consignee_Name=array();
  $Consignee_Phone=array();
  $Consignee_Address=array();
  $Personalized_Words=array(); 
    
  ini_set('display_errors', 'On');
  $db = '';
	$conn = oci_connect("", "", $db);
  $query = "select * from Shoes_Order where Customer_Email='".$_SESSION['EMAIL']."'";
  $stmt = oci_parse($conn, $query);
 	oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt))
  {
    $Order_ID[]=$res[0];
    $Order_Status[]=$res[1];
    $Consignee_Name[]=$res[3];
    $Consignee_Phone[]=$res[4];
    $Consignee_Address[]=$res[5];
    $Personalized_Words[]=$res[6];
  }
  oci_close($conn);

	if (sizeof($Order_ID) == 0) 
  {
	  echo "<p>You have no orders up to now.</p>";
  }
  else
  {
    echo "<p>You have the following orders.</p>";
    $orders = "
      <table border='1'>
      <tr>
      <th>Order_ID</th>
      <th>Order_Status</th>
      <th>Consignee_Name</th>
      <th>Consignee_Phone</th>
      <th>Consignee_Address</th>
      <th>Personalized_Words</th>
      <th>Track and Detail</th>
      <th>Pay</th>
      </tr>";

    for ($i = 0; $i < sizeof($Order_ID); $i++) {
      $orders = $orders."
      <tr>
      <td>".$Order_ID[$i]."</td>
      <td>".$Order_Status[$i]."</td>
      <td>".$Consignee_Name[$i]."</td>
      <td>".$Consignee_Phone[$i]."</td>
      <td>".$Consignee_Address[$i]."</td>
      <td>".$Personalized_Words[$i]."</td>
      <td><a href = 'check_track.php?order_id=$Order_ID[$i]'>Track&Detail</a></td>
      <td>".'<form name = "main_form" method="post" action = "payment.php?order_id='.$Order_ID[$i].'"><input type="submit" class="myButton" value="Pay" /></form>'."</td>
      </tr>";
    }

    $orders = $orders."</table>";
    echo $orders;   
  }
    
?>
<br><p><a href = "cust_profile.php">Back to main page. </a></p>

<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>