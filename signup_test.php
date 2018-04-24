<?php
	session_start(); 
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store | Customer Signup
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
    
		function validateEmail() {
 			var x = document.forms["main_form"]["email"].value;
      var re = new RegExp('[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}');
 			if (x == null || x == ""){
 				alert("Email must be filled out. ");
 				return false;
 			}
      else if (!x.match(re)) {
        alert("Email should be in the form abc@abc. ");
        return false;
      }
 			return true;
 		}
     
		function validateNames() {
			var x = document.forms["main_form"]["name"].value;
			if (x == null || x == ""){
	  			alert("Account must be filled out. ");
	  			return false;
 		  }
      else if (false){
        alert("Names must be characters only. ");
	  		return false;
      }
      return true;  
 		}

 		function validatePassword() {
 			var x = document.forms["main_form"]["password"].value;
 			if (x == null || x == "") {
 				alert("Password must be filled out. ");
 				return false;
 			}
      
      if (x.length > 15) {
     	  alert("Password must be 10 digits at most. ");
 				return false;
      }
 			return true;
 		}
    
 		function validateAddress() {
 			var x = document.forms["main_form"]["address"].value;
 			if (x == null || x == ""){
 				alert("Address must be filled out. ");
 				return false;
 			}
 			return true;
 		}
    
 		function validateForm(){
			if ( !validateNames() || !validatePassword())
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
          <li><a href="login.php">Home</a></li>
          <li><a href="about.php">About the Store</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<p>Please fill in registration below. </p><br>

<?php
	$star_names = array();
	ini_set('display_errors', 'On');
	$db = '//oracle.cise.ufl.edu/orcl';
	$conn = oci_connect("weiw", "!Zzz2018", $db);
	$stmt = oci_parse($conn, "select UNAME from CRIMEUSER");
	oci_execute($stmt, OCI_DEFAULT);
	while ($res = oci_fetch_row($stmt)){
		$star_names[] = $res[0];
	}

	oci_close($conn);

	echo '<form name = "main_form" action="finish_signup.php" onsubmit="return validateForm()" method="post">
		Account: <input type="text" name="name" /> 
     <br>';
    

  echo '
    Password: <input type="password" size= "9" name="password">&nbsp;&nbsp;&nbsp;&nbsp
	  <br>
		';

  
  echo '</select> &nbsp;&nbsp;&nbsp;&nbsp';
	

	echo '<br><input type="submit" class="myButton" value="Submit" /></form>';
?>

<p>Click <a href = "login.php">here</a> to log in if you remember your information.</p>

<div id="footer">
  <a href="login.php">Home</a> <span>|</span> 
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>
