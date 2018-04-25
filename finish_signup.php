
<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>
     Finish Signup
  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
<!--    <!--     jQuery (necessary for Bootstrap's JavaScript plugins)-->
<!--    <!--     Custom Theme files-->
<!--    <link href="css/font-awesome.css" rel="stylesheet">-->
<!--    <link href="css/style.css" rel='stylesheet' type='text/css' />-->
<!--    <!--fonts-->
    <link href="css/stylemain.css" rel='stylesheet' type='text/css' />
<!--    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">-->


</head>

<body background="css/images/chicago4.jpg" style="height: 100%;">
<div style="height: 100%;">
<div style="height: 100%;">
    <div class="center-container">
        <div style="height:200px">
            &nbsp;
        </div>
        <h1>Sign up complete! Please return to home page and log in.</h1>
        <a href="mainpage.php"><h1>Log in</h1></a>
        <div style="height:300px">
            &nbsp;
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


<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/jquery.vide.min.js"></script>

</body>
</html>