<?php
session_start(); 
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Finish Add New shoes
	</title>
  <link rel="stylesheet" href="css/style_all.css" type="text/css" media="all" />
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
  $already_Shoes_ID = array();
  $Shoes_ID = $_POST['Shoes_ID'];
  $Size_ID = $_POST['Size_ID'];
  $Producer = $_POST['Producer'];
  $Quantity = $_POST['Quantity'];
  $Picture_URL = $_POST['Picture_URL'];
  $position = $_POST['position'];
  $Shoes_Name = $_POST['Shoes_Name'];
  $star_name = $_POST['star_name'];

  ini_set('display_errors', 'On');
  $db = "";
  $conn = oci_connect("", "", $db);
   
  $query = "select Shoes_ID from Shoes_Sponsor";       
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  
 	while ($res = oci_fetch_row($stmt)){
		$already_Shoes_ID[] = $res[0];
	}
  oci_close($conn);
  
  $Shoes_ID_used=0;
  for($i = 0; $i < sizeof($already_Shoes_ID); $i++){
    if ($already_Shoes_ID[$i] == $Shoes_ID)
      $Shoes_ID_used = 1;     
  }

  if($Shoes_ID_used)
  {
    echo "<p>This shoes ID has already been used. </p>
    <p>Click <a href = 'add_case.php'>here</a> to go back.</p>";
  }
  else 
  {
    ini_set('display_errors', 'On');
    $db = "";
    $conn = oci_connect("", "", $db);
    
    $query = "insert into Shoes_Sponsor values ( '".$Shoes_ID."', '".$Size_ID."', '".$Producer."',
     '".$Quantity."', '".$Picture_URL."' , '".$position."', '".$Shoes_Name."', '".$star_name."') ";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
    
    echo "<p> Shoes is successfully added. </p>
    <p>Click <a href = 'add_case.php'>here</a> to go back.</p>";
  }
?>

<div id="footer">
  <a href="admin_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Store</a> <span>|</span> 
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>