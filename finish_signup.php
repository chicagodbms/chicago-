<?php
session_start(); 
?>

<html>

<head>
	<title>
		 Finish Customer Signup
	</title>
  <link rel="stylesheet" href="css/style_all.css" type="text/css" media="all" />
</head>

<body>
<div id="top">
  <div class="shell">
    <div id="header">
      <h1 id="logo"><a href="mainpage.php">Online Store</a></h1>
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
  $already_name = array();
  $name = $_POST['name'];
  $password = $_POST['password'];
  ini_set('display_errors', 'On');
  $db = '//oracle.cise.ufl.edu/orcl';
  $conn = oci_connect("weiw", "!Zzz2018", $db);
   
  $query = "select UNAME from CRIMEUSER";       
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  
 	while ($res = oci_fetch_row($stmt)){
		$already_email[] = $res[0];
	}
  oci_close($conn);
  
  $name_used=0;
  for($i = 0; $i < sizeof($already_name); $i++){
    if ($already_name[$i] == $name)
      $name_used = 1;     
  }

  if($name_used)
  {
    echo "<p>This email has already been used. </p>
    <p>Click <a href = 'login.php'>here</a> to go back.</p>";
  }
  else 
  {
    ini_set('display_errors', 'On');
  $db = '//oracle.cise.ufl.edu/orcl';
  $conn = oci_connect("weiw", "!Zzz2018", $db);
    
    $query = "insert into CRIMEUSER values ( '".$name."', '".$password."','".'0'."' ) ";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
    ini_set('display_errors', 'On');
         
    echo "<p> Account is successfully created. </p>
    <p>Click <a href = 'mainpage.php'>here</a> to go back.</p>";
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