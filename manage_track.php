<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Manage Track
	</title>
  <link rel="stylesheet" href="css/style_mainstore.css" type="text/css" media="all" />
  <script>
    function ValidateDate(x)
    {
 			var len = x.length;
  		if ((len == 0)||(x==null)){
        alert("Please input a date!");
  			return false;
      }
      var d1 = x.charAt(0);
      var day = d1.concat(x.charAt(1));
      var m1 = x.charAt(3);
      var mon = m1.concat(x.charAt(4), x.charAt(5));
      var y1 = x.charAt(7);
      var year = y1.concat(x.charAt(8));
      document.write(mon);
       
      if ((mon=='JAN')||(mon=='MAR')||(mon=='MAY')||(mon=='JUL')||(mon=='AUG')||(mon=='OCT')||(mon=='DEC')){
        if ((day>0)&&(day<32)){
          return true;
        }
      }
      else if ((mon=='APR')||(mon=='JUN')||(mon=='SEP')||(mon=='NOV')){
        if ((day>0)||(day<31)){
          return true;
        }
      }
      else if (mon=='FEB'){
        if (((day>0)&&(day<30))&&(year%4==0)){
          return true;
        }
        else if (((day>0)&&(day<29))&&(year%4!=0)){
          return true;
        }
      }      
      alert("Please input a Valid Date like (12-MON-14)!");
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
if ($_SESSION['ADMIN_EMAIL'] == ""){
   echo "<p>Please login as an administrator before coming to this shoes store. </p>";
   echo "<p>Click <a href='login.php'>here</a> to come back. </p>";
 }
else{ 
  echo "<p>Hi, Administrator ".$_SESSION['ADMIN_NAME']."!</p>";

  $Track_ID = array();
  $Delivery_Date=array();
  $Shipment_Carrier=array();
  $Order_ID=$_GET['order_id'];
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

  $_SESSION['OrderID_for_track']=$Order_ID;
	if (sizeof($Track_ID) == 0) 
  {
	  echo "<p>There is no tracks for this order now.</p>";
  }
  else
  {
    echo "<br><p>The track information of this order is as follows.</p>";
    echo "*The delivery date should be written like (YYYY-MM-DD). ";
    $tracks = "
      <table border='1'>
      <tr>
      <th>Track_ID</th>
      <th>Delivery_Date</th>
      <th>Shipment_Carrier</th>
      <th>Order_ID</th>
      <th>Delivery_Status</th>
      <th>Ship_Price</th>
      <th>Update</th>      
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
      <td></td>
      </tr>
      
      <tr>
      <td>"."Update for ".$Track_ID[$i]."</td>
      <td>".'<form method="post" onsubmit="return ValidateDate('.$Delivery_Date[$i].');" action = "finish_manage_track.php?track_id='.$Track_ID[$i].'">'.'<input type="text" size ="10" name="Delivery_Date" style="text-align:center" value='.$Delivery_Date[$i].' >'."</td>  
      <td>".'<select id = "Shipment_Carrier" name = "Shipment_Carrier">
				<option value ="UPS">UPS</option>
				<option value ="FEDEX">FEDEX</option>
			</select><br>'."</td>
      <td></td>  
      <td>".'<select id = "Delivery_Status" name = "Delivery_Status">
				<option value ="shipping">shipping</option>
				<option value ="not_shipping">not_shipping</option>
        <option value ="not_shipping">received</option>
			</select><br>'."</td>
      <td>".'<input type="text" size ="5" name="Ship_Price" style="text-align:center" value='.$Ship_Price[$i].' />'."</td>
      <td>".'<input type="submit" class="myButton" value="Update">'.'</form>'."</td>           
      </tr>";
    }

    $tracks = $tracks."</table>";
    echo $tracks;   
  }
  echo '<br><p><a href = "manage_order.php">Back</a> to all orders. </p>';
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