<?php
     session_start();    
?>

<html>
<head>
  <title>
    SoccerShop | Main
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

  if (($_SESSION['NAME'] == "") || ($_SESSION['POSITION'] == "") || ($_SESSION['EMAIL'] == "")){
    echo "<p>Please login before coming to this shoes store. </p>";
    echo "<p>Click <a href='login.php'>here</a> to come back. </p>";
  }
  else{
    echo '<a href="mainstore.php" target="_blank"><img src="http://i157.photobucket.com/albums/t44/Tong__Wang/banner_zps8da76e0b.jpg" border="0" alt=" photo banner_zps8da76e0b.jpg"/></a>';
    echo "<p>Hello, ".$_SESSION['NAME']."!</p>";
    echo "<p>Welcome to our online shoes store. </p>";
	  ini_set('display_errors', 'On');
    $shoesName = array();
    $producer = array();
    $suitablePosition = array();
    $price = array();
    $Size_NO = array();
  
	  $db = '';
	  $conn = oci_connect("", "", $db);
	  $stid = oci_parse($conn, 'SELECT Producer, Shoes_Name, Suitable_Position, Price, Picture_URL, Size_NO FROM Shoes_Sponsor');
	  oci_execute($stid);
  
    while ($res = oci_fetch_array($stid)) {	
      $producer[] = $res[0];
      $shoesName[] = $res[1];
      $suitablePosition[] = $res[2];
      $price[] = $res[3]; 
      $Size_NO[] = $res[5];      
    }
    oci_close($conn);      
    $outlook = "
      <table border='1'>
      <tr>
        <th>Producer</th>
        <th>Name</th>
        <th>Position</th>
        <th>Size</th>
        <th>Price</th>
        <th>Buy Now!</th>              
      </tr>";
               
    for ($i = 0; $i < sizeof($shoesName); $i++) {
    $outlook = $outlook."
      <tr>
     	  <td>".$producer[$i]."</td>
     	  <td>".$shoesName[$i]."</td>
     	  <td>".$suitablePosition[$i]."</td> 
     	  <td>".$Size_NO[$i]."</td>                                
     	  <td>".$price[$i]."</td>                       
     	  <td><a href = 'purchase.php?shoesName=$shoesName[$i]'>Buy</a></td>
      </tr>";
    }

    $outlook = $outlook."</table>";
    echo $outlook;
    echo "<br>";
    //recommend
    echo "<p>Your favorite position is ".$_SESSION['POSITION'].".</p>";
    echo "<p>Here follows our shoes recommendation to you according to your favorite position. </p>";	
  
    $shoesName1 = array();
    $producer1 = array();
    $suitablePosition1 = array();
    $price1 = array();
    $email = $_SESSION['EMAIL'];
    $size1 = array();
  
    $db = '';
    $conn = oci_connect("", "", $db);
    $query = "SELECT S.Producer, S.Shoes_Name, S.Suitable_Position, S.Price, S.Size_NO FROM Shoes_Sponsor S, Customer C Where C.Customer_Email = '".$email."' AND S.Suitable_Position = C.Soccer_Position";
	  $stid = oci_parse($conn, $query);
	  oci_execute($stid);
  
    while ($res = oci_fetch_array($stid)) {	
      $producer1[] = $res[0];
      $shoesName1[] = $res[1];
      $suitablePosition1[] = $res[2];
      $price1[] = $res[3];
      $size1[] = $res[4];
    }
    oci_close($conn);      
    $outlook1 = "
      <table border='1'>
      <tr>
        <th>Producer</th>
        <th>Name</th>
        <th>Position</th>
        <th>Size</th>                 
        <th>Price</th>
        <th>Buy Now!</th>              
      </tr>";
               
    for ($i = 0; $i < sizeof($shoesName1); $i++) {
      $outlook1 = $outlook1."
      <tr>
        <td>".$producer1[$i]."</td>
        <td>".$shoesName1[$i]."</td>
        <td>".$suitablePosition1[$i]."</td>
        <td>".$size1[$i]."</td>                                  
        <td>".$price1[$i]."</td>
        <td><a href = 'purchase.php?shoesName=$shoesName1[$i]'>Buy</a></td>
      </tr>";
    }

    $outlook1 = $outlook1."</table>";
    echo $outlook1; 
    echo "<br>"; 
    echo "Here follows the shoes sposored by your favorite star! ";
    //recommend2

    $shoesName2 = array();
    $producer2 = array();
    $suitablePosition2 = array();
    $price2 = array();
    $size2 = array();
    
    $db = '';
    $conn = oci_connect("", "", $db);
    $query = "SELECT S.Producer, S.Shoes_Name, S.Suitable_Position, S.Price, S.Size_NO FROM Shoes_Sponsor S, admire A Where A.Customer_Email = '".$email."' AND A.Star_Name = S.Star_Name";
  	$stid = oci_parse($conn, $query);
  	oci_execute($stid);
  
    while ($res = oci_fetch_array($stid)) {    	
      $producer2[] = $res[0];
      $shoesName2[] = $res[1];
      $suitablePosition2[] = $res[2];
      $price2[] = $res[3];
      $size2[] = $res[4];
    }
    oci_close($conn); 
  
    $outlook2 = "	    	
      <table border='1'>
        <tr>
	      	<th>Producer</th>
	      	<th>Name</th>
	      	<th>Position</th>
	      	<th>Price</th>
          <th>Buy Now!</th>              
        </tr>";
	    	             
    for ($i = 0; $i < 1; $i++) {
      $outlook2 = $outlook2."
        <tr>
	      	<td>".$producer2[$i]."</td>
	      	<td>".$shoesName2[$i]."</td>
	      	<td>".$suitablePosition2[$i]."</td>                        
	    	  <td>".$price2[$i]."</td>
    	    <td><a href = 'purchase.php?shoesName=$shoesName2[$i]'>Buy</a></td>
        </tr>";
    }

    $outlook2 = $outlook2."</table>";
    echo $outlook2;
 
    echo "<br><p>Your can choose other things you can do.</p>";
    echo "<p><a href='cust_profile.php'>Back to profile</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'update_profile.php'>Update Profile</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'change_password.php'>Change password</a>&nbsp;&nbsp;&nbsp;&nbsp";
  	echo "<a href = 'check_order.php'>Check orders</a>&nbsp;&nbsp;&nbsp;&nbsp";
    echo "<a href = 'logout.php'>Logout</a></p>";  

} 
?>

<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>