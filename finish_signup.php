<?php
session_start(); 
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Finish Customer Signup
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
  $already_email = array();
  $email = $_POST['email'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $position = $_POST['position'];
  $admire_star = $_POST['admire_star'];
  $addr = $_POST['address'];

  ini_set('display_errors', 'On');
  $db = "";
  $conn = oci_connect("", "", $db);
   
  $query = "select Customer_Email from Customer";       
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  
 	while ($res = oci_fetch_row($stmt)){
		$already_email[] = $res[0];
	}
  oci_close($conn);
  
  $email_used=0;
  for($i = 0; $i < sizeof($already_email); $i++){
    if ($already_email[$i] == $email)
      $email_used = 1;     
  }

  if($email_used)
  {
    echo "<p>This email has already been used. </p>
    <p>Click <a href = 'login.php'>here</a> to go back.</p>";
  }
  else 
  {
    ini_set('display_errors', 'On');
    $db = "";
    $conn = oci_connect("", "", $db);
    
    $query = "insert into Customer values ( '".$email."', '".$name."', '".$password."', '".$position."', '".$addr."' ) ";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);
    
    ini_set('display_errors', 'On');
    $db = "";
    $conn = oci_connect("", "", $db);
    
    $query = "insert into Admire values ( '".$email."', '".$admire_star."' ) ";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_close($conn);     
    echo "<p> Account is successfully created. </p>
    <p>Click <a href = 'login.php'>here</a> to go back.</p>";
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