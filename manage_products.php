<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Manage Products
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
  echo "<p>Hi, Administrator ".$_SESSION['ADMIN_NAME']."!</p><br>";

  $Shoes_ID=array();
  $Size_NO=array();
  $Producer=array();
  $Quantity=array();
  $Picture_URL=array();
  $Suitable_Position=array();
  $Shoes_Name=array(); 
  $Star_Name=array();
  $Price=array();
  
  ini_set('display_errors', 'On');
  $db = '';
  $conn = oci_connect("", "", $db);
  $query = "select * from Shoes_Sponsor";
  $stmt = oci_parse($conn, $query);
 	oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt))
  {
    $Shoes_ID[]=$res[0];
    $Size_NO[]=$res[1];
    $Producer[]=$res[2];
    $Quantity[]=$res[3];
    $Picture_URL[]=$res[4];
    $Suitable_Position[]=$res[5];
    $Shoes_Name[]=$res[6];
    $Star_Name[]=$res[7];
    $Price[]=$res[8];    
  }
  oci_close($conn);

	if (sizeof($Shoes_ID) == 0) 
  {
	  echo "<p>There are no shoes in store.</p>";
  }
  else
  {
    echo "<p>All shoes are as follows.</p>";
    $products = "
      <table border='1'>
      <tr>
      <th>Shoes_ID</th>
      <th>Size_NO</th>
      <th>Producer</th>
      <th>Quantity</th>
      <th>Suitable_Position</th>
      <th>Shoes_Name</th>
      <th>Star_Name</th>
      <th>Price</th> 
      <th>Drop&Update</th>    
      </tr>";

    for ($i = 0; $i < sizeof($Shoes_ID); $i++) {
      $products = $products."
      <tr>
      <td>".$Shoes_ID[$i]."</td>
      <td>".$Size_NO[$i]."</td>
      <td>".$Producer[$i]."</td>
      <td>".$Quantity[$i]."</td>      
      <td>".$Suitable_Position[$i]."</td>
      <td>".$Shoes_Name[$i]."</td>
      <td>".$Star_Name[$i]."</td>
      <td>".$Price[$i]."</td>
      <td><a href = 'finish_drop_products.php?shoes_id=$Shoes_ID[$i]'>Drop</a></td>
      </tr>
      
      <tr>
      <td>"."Update for ".$Shoes_ID[$i]."</td>
      <td></td>
      <td></td>
      <td>".'<form method="post" action = "finish_manage_products.php?shoes_id='.$Shoes_ID[$i].'">'.'<input type="text" size ="5" name="Quantity" style="text-align:center" value='.$Quantity[$i].' />'."</td>
      <td></td>
      <td></td>
      <td></td>
      <td>".'<input type="text" size ="5" name="Price" style="text-align:center" value='.$Price[$i].' />'."</td>         
      <td>".'<input type="submit" class="myButton" value="Update">'.'</form>'."</td>      
      </tr>";
    }

    $products = $products."</table>";
    echo $products;   
  }
  echo '<br><br><p> You can also do the following things.</p>';
  echo '<p><a href = "add_products.php">Add new Shoes</a></p><br>';    
  echo '<p><a href = "admin_profile.php">Back</a> to administrator profile. </p>';
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