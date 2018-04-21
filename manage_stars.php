<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Manage Stars
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

  $Star_Name=array();
  $Star_Soccer_Position=array();
  
  ini_set('display_errors', 'On');
  $db = '';
  $conn = oci_connect("", "", $db);
  $query = "select * from Soccer_Star";
  $stmt = oci_parse($conn, $query);
 	oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt))
  {
    $Star_Name[]=$res[0];
    $Star_Soccer_Position[]=$res[1];  
  }
  oci_close($conn);

	if (sizeof($Star_Name) == 0) 
  {
	  echo "<p>There are no stars sponsoring the shoes.</p>";
  }
  else
  {
    echo "<p>All stars are as follows.</p>";
    $stars = "
      <table border='1'>
      <tr>
      <th>Star Name</th>
      <th>Star Soccer Position</th>
      <th>Drop&Update</th>    
      </tr>";

    for ($i = 0; $i < sizeof($Star_Name); $i++) {
      $stars = $stars."
      <tr>
      <td>".$Star_Name[$i]."</td>
      <td>".$Star_Soccer_Position[$i]."</td>
      <td><a href = 'finish_drop_stars.php?star_name=$Star_Name[$i]'>Drop</a></td>
      </tr>
      
      <tr>
      <td>"."Update for ".$Star_Name[$i]."</td>
      <td>".'<form method="post" action = "finish_manage_stars.php?star_name='.$Star_Name[$i].'">'.
      '<select id = "position" name = "position">
  	  	<option value ="DEFENDER">DEFENDER</option>
  	  	<option value ="ATTACKER">ATTACKER</option>
        <option value ="GOALKEEPER">GOALKEEPER</option>
        <option value ="MIDFIELDER">MIDFIELDER</option>
		  </select><br>'."</td>       
      <td>".'<input type="submit" class="myButton" value="Update">'.'</form>'."</td>      
      </tr>";
    }

    $stars = $stars."</table>";
    echo $stars;   
  }
  echo '<br><br><p> You can also do the following things.</p>';
  echo '<p><a href = "add_stars.php">Add new Stars</a></p><br>';    
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