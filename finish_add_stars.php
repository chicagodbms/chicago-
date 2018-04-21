<?php
session_start(); 
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Finish Add New Stars
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
          <a href="logout.php">Logout</a>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
  $already_star_name = array();
  $star_name = $_POST['star_name'];
  $position = $_POST['position'];
  
  ini_set('display_errors', 'On');
  $db = "";
  $conn = oci_connect("", "", $db);
   
  $query = "select Star_Name from Soccer_Star";       
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  
 	while ($res = oci_fetch_row($stmt)){
		$already_star_name[] = $res[0];
	}
  oci_close($conn);
  
  $star_name_used=0;
  for($i = 0; $i < sizeof($already_star_name); $i++){
    if ($already_star_name[$i] == $star_name)
      $star_name_used = 1;     
  }

  if($star_name_used)
  {
    echo "<p>This Star has already existed. </p>
    <p>Click <a href = 'add_stars.php'>here</a> to go back.</p>";
  }
  else 
  {
    ini_set('display_errors', 'On');
    $db = "";
    $conn = oci_connect("", "", $db);
    
    $query = "insert into Soccer_Star values ( '".$star_name."', '".$position."') ";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
    
    echo "<p> A new Star has been successfully added. </p>
    <p>Click <a href = 'add_stars.php'>here</a> to go back.</p>";
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