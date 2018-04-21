<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Purchase Today!
	</title>
  <link rel="stylesheet" href="css/style_mainstore.css" type="text/css" media="all" />
  <script>
    function validateForm(x)
    { 
      var q = document.forms["main_form"]["quantity"].value; 
      if (q>x]){
        return false;
      }
      return true;
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
          <li><a href="cust_profile.php">Home</a></li>
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
  $Shoes_Name=$_GET['shoesName'];
  echo "<p>Here is the shoes named ".$Shoes_Name."</p>";
  $shoesID = array();
  $size = array();
  $price = array();
  $quantity =array();      
  $url = array ();
  
  ini_set('display_errors', 'On');
  $db = '';
  $conn = oci_connect("", "", $db);
  $query = "select Shoes_ID, Size_NO, Price, Quantity, Picture_URL from Shoes_Sponsor where Shoes_Name='".$Shoes_Name."'";
  $stmt = oci_parse($conn, $query);
 	oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt)){
    $shoesID[]= $res[0];
    $size[]= $res[1];
    $price[]= $res[2];
    $quantity[]= $res[3];
    $url = $res[4]; }
          
  oci_close($conn);
  echo $url;
  echo "<br><br>";
    
  if (sizeof($shoesID) == 0) {
	  echo "<p>Sold out.</p>";} else {
      $buyshoes = "
      <table border='1'>
      <tr>
        <th>Shoes Name</th>
        <th>Size</th>
        <th>Price</th>
        <th>Quantity&Order!</th>
      </tr>";

    for ($i = 0; $i < sizeof($shoesID); $i++) {
      $buyshoes = $buyshoes."
      <tr>
        <td>".$Shoes_Name."</td>
        <td>".$size[$i]."</td>
        <td>".$price[$i]."</td>
        <td>".'<form name = "main_form" method="post" action = "order.php?shoesID='.$shoesID[$i].'"><input type="text" name="quantity" size = "2"/><input type="submit" class="myButton" value="Order" /></form>'."</td>
      </tr>";
    }

    $buyshoes = $buyshoes."</table>";
    echo $buyshoes;   
  }
  echo "<p><a href = 'mainstore.php'>Main Store</a></p>";
?>

<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>