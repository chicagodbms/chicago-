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
		function onlyChar(x){
 			var len = x.length;
 			if (len == 0)
 				return false;
 			for (var i = 0; i < len; i ++){
 				var c = x.charCodeAt(i);
 				if (c < 65|| (c >90 && c < 97) || c > 122)
 					return false;
 			}
 			return true;
 		}
      
		function validateShoes_ID() {
 			var x = document.forms["main_form"]["Shoes_ID"].value;
 			if (x == null || x == "") {
 				alert("Shoes ID must be filled out. ");
 				return false;
 			}
 			return true;
 		}
     
		function validateSize_ID() {
			var x = document.forms["main_form"]["Size_ID"].value;
			if (x == null || x == ""){
	  			alert("Size ID must be filled out. ");
	  			return false;
 		  }
      else if (onlyChar(x)){
        alert("Size ID must be all numbers. ");
	  		return false;
      }
      return true;  
 		}

 		function validateProducer() {
 			var x = document.forms["main_form"]["Producer"].value;
 			if (x == null || x == "") {
 				alert("Producer must be filled out. ");
 				return false;
 			}
 			return true;
 		}
    
 		function validateURL() {
 			var x = document.forms["main_form"]["Picture_URL"].value;
 			if (x == null || x == ""){
 				alert("Picture URL must be filled out. ");
 				return false;
 			}
 			return true;
 		}
    
 		function validateShoes_Name() {
 			var x = document.forms["main_form"]["Shoes_Name"].value;
 			if (x == null || x == ""){
 				alert("Shoes Name must be filled out. ");
 				return false;
 			}
 			return true;
 		}
                
 		function validateForm(){
			if (!validateShoes_ID() || !validateSize_ID() || !validateProducer()|| !validateURL() || !validateShoes_Name())
				return false;
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
    echo "<p>Please fill in new shoes information below. </p><br>";

  	$star_names = array();
  	ini_set('display_errors', 'On');
  	$db = '';
  	$conn = oci_connect("", "", $db);
  	$stmt = oci_parse($conn, "select Star_Name from Soccer_Star");
  	oci_execute($stmt, OCI_DEFAULT);
  	while ($res = oci_fetch_row($stmt)){
  		$star_names[] = $res[0];
  	}

  	oci_close($conn);

  	echo '<form name = "main_form" action="finish_add_products.php" onsubmit="return validateForm()" method="post">
  		Shoes_ID: <input type="text" name="Shoes_ID" /> <br><br>';
 		echo 'Size_ID: <input type="text" name="Size_ID" /> &nbsp;&nbsp;&nbsp;&nbsp
      Producer: &nbsp;&nbsp
      <input type="text" size = "20" name="Producer"><br>';
    echo 'Quantity: <input type="text" name="Quantity"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
      Picture_URL: <input type="text" size= "18" name="Picture_URL"><br>';
	  echo 'Suitable_Position:
	  	<select id = "position" name = "position">
    		<option value ="DEFENDER">DEFENDER</option>
    		<option value ="ATTACKER">ATTACKER</option>
        <option value ="GOALKEEPER">GOALKEEPER</option>
        <option value ="MIDFIELDER">MIDFIELDER</option>
  		</select>&nbsp;&nbsp;&nbsp;&nbsp;
      Shoes Name: <input type="text" size= "14" name="Shoes_Name"><br>
	  	Star Name: <select name="star_name">';

    for($i = 0; $i < sizeof($star_names); $i++){
	    echo '<option value="';
  	  echo $star_names[$i]; 
  	  echo'">';
  	  echo $star_names[$i]; 
  	  echo '</option>';
	  }		
    echo '</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
	  echo  'Price: <input type="text" size= "22" name="price" /> <br>	<br>';
	  echo '<input type="submit" class="myButton" value="Submit" /></form><br>';
    echo '<p><a href = "manage_products.php">Back</a> to product management</p>';
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