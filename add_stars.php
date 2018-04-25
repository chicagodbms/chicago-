<?php
	session_start(); 
?>

<html>

<head>
	<title>
        Online Crime Database
	</title>
  <link rel="stylesheet" href="css/style_mainstore.css" type="text/css" media="all" />
	<script>
		function onlyCharAndSpace(x){
 			var len = x.length;
 			if (len == 0)
 				return false;
 			for (var i = 0; i < len; i ++){
 				var c = x.charCodeAt(i);
 				if ((c <31) || (c >33 && c < 65)|| (c >90 && c < 97) || c > 122)
 					return false;
 			}
 			return true;
 		}
          
		function validateStar_Name() {
			var x = document.forms["main_form"]["star_name"].value;
			if (x == null || x == ""){
	  			alert("Star Name must be filled out. ");
	  			return false;
 		  }
      else if (!onlyCharAndSpace(x)){
        alert("Star Name must be all characters. ");
	  		return false;
      }
      return true;  
 		}
   
	</script> 
</head>

<body>

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
    echo "<p>Please fill in star information below. </p><br>";
  	echo '<form name = "main_form" action="finish_add_stars.php" onsubmit="return validateStar_Name()" method="post">
		Star Name: <input type="text" name="star_name" /> <br>';

    echo '
	  	Star Soccer Position:		
      <select id = "position" name = "position">
    		<option value ="DEFENDER">DEFENDER</option>
    		<option value ="ATTACKER">ATTACKER</option>
        <option value ="GOALKEEPER">GOALKEEPER</option>
        <option value ="MIDFIELDER">MIDFIELDER</option>
	  	</select><br><br>';

	  echo '<input type="submit" class="myButton" value="Submit" /></form><br>';
    echo '<p><a href = "admin_profile.php">Back</a> to administrator profile. </p>';
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