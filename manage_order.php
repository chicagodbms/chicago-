<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Manage Order
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
if ($_SESSION['ADMIN_EMAIL'] == ""){
   echo "<p>Please login as an administrator before coming to this shoes store. </p>";
   echo "<p>Click <a href='login.php'>here</a> to come back. </p>";
 }
else{ 
  echo "<p>Hi, Administrator ".$_SESSION['ADMIN_NAME']."!</p>";

  $Order_ID = array();
  $Order_Status=array();
  $Consumer_Email=array();
  $Consignee_Name=array();
  $Consignee_Phone=array();
  $Consignee_Address=array();
  $Personalized_Words=array(); 
    
  ini_set('display_errors', 'On');
  $db = '';
	$conn = oci_connect("", "", $db);
  $query = "select * from Shoes_Order";
  $stmt = oci_parse($conn, $query);
 	oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt))
  {
    $Order_ID[]=$res[0];
    $Order_Status[]=$res[1];
    $Consumer_Email[]=$res[2];
    $Consignee_Name[]=$res[3];
    $Consignee_Phone[]=$res[4];
    $Consignee_Address[]=$res[5];
    $Personalized_Words[]=$res[6];
  }
  oci_close($conn);

	if (sizeof($Order_ID) == 0) 
  {
	  echo "<p>There is no orders in store.</p>";
  }
  else
  {
    echo "<br><p>All orders of customers are as follows.</p>";
    $orders = "
      <table border='1'>
      <tr>
      <th>Order_ID</th>
      <th>Order_Status</th>
      <th>Consumer_Email</th>
      <th>Consignee_Name</th>
      <th>Consignee_Phone</th>
      <th>Consignee_Address</th>
      <th>Personalized_Words</th>
      <th>TrackDetail</th>
      <th>DropOrder</th>
      </tr>";

    for ($i = 0; $i < sizeof($Order_ID); $i++) {
      $orders = $orders."
      <tr>
      <td>".$Order_ID[$i]."</td>
      <td>".$Order_Status[$i]."</td>
      <td>".$Consumer_Email[$i]."</td>
      <td>".$Consignee_Name[$i]."</td>
      <td>".$Consignee_Phone[$i]."</td>
      <td>".$Consignee_Address[$i]."</td>
      <td>".$Personalized_Words[$i]."</td>
      <td><a href = 'manage_track.php?order_id=$Order_ID[$i]'>Track</a></td>
      <td><a href = 'finish_drop_order.php?order_id=$Order_ID[$i]'>Drop</a></td>
      </tr>
      
      <tr>
      <td>"."Update for ".$Order_ID[$i]."</td>
      <td>".'<form method="post" action = "finish_manage_order.php?order_id='.$Order_ID[$i].'">'.'<select id = "Order_Status" name = "Order_Status">
				<option value ="paid">paid</option>
				<option value ="unpaid">unpaid</option>
			</select><br>'."</td>
      <td></td>
      <td>".'<input type="text" size ="10" name="Consignee_Name" style="text-align:center"value='.$Consignee_Name[$i].' />'."</td>
      <td>".'<input type="text" size ="10" name="Consignee_Phone" style="text-align:center" value='.$Consignee_Phone[$i].' />'."</td>
      <td>".'<input type="text" size ="40" name="Consignee_Address" style="text-align:center" value="'.$Consignee_Address[$i].'" />'."</td>
      <td>".'<input type="text" size ="20" name="Personalized_Words" style="text-align:center" value="'.$Personalized_Words[$i].'" />'."</td>
      <td>".'<input type="submit" class="myButton" value="Update">'.'</form>'."</td>    
      <td></td>
      </tr>";
    }

    $orders = $orders."</table>";
    echo $orders;   
  }
  echo '<br><p><a href = "admin_profile.php">Back to Home page. </a></p>';
}
?>

<div id="footer">
  <a href="admin_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>