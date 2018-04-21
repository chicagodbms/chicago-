
<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store |  Creating Order
	</title>
  <link rel="stylesheet" href="css/style_all.css" type="text/css" media="all" />

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
    
  	function validateconsigneeName() {
			var x = document.forms["main_form"]["consigneeName"].value;
			if (x == null || x == ""){
	  			alert("Names must be filled out. ");
	  			return false;
 		  }
      else if (!onlyChar(x)){
        alert("Names must be characters only. ");
	  		return false;
      }
      return true;  
 		}

 		function consigneePhone() {
 			var x = document.forms["main_form"]["consigneePhone"].value;
 			if (x == null || x == "") {
 				alert("consigneePhone must be filled out. ");
 				return false;
 			}
      
      if (x.length > 10) {
     	  alert("Phone_NO must be 10 digits at most. ");
 				return false;
      }
 			return true;
 		}
    
 		function validatquantity() {
 			var x = document.forms["main_form"]["quantity"].value;
 			if (x == null || x == "") {
 				alert("quantity must be filled out. ");
 				return false;
 			}
 			return true;
 		}
    
   	function validateaddress() {
 			var x = document.forms["main_form"]["address"].value;
 			if (x == null || x == "") {
 				alert("address Date must be filled out. ");
 				return false;
 			}
 			return true;
 		}
        
 		function validateForm(){
			if (!validateconsigneeName() || !consigneePhone()|| !validatquantity()||!validateaddress())
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
          <li><a href="cust_profile.php">Home</a></li>
          <li><a href="about.php">About the Store</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
  $Shoe_ID = $_GET['shoesID'];
  $Quantity = $_POST['quantity'];
  $_SESSION['SHOEID'] = $Shoe_ID;
  $_SESSION['Quantity'] = $Quantity;
  echo "<p>Hello, ".$_SESSION['NAME']."!</p>";
  $shoes_name = array();
  $size = array();
  $price = array();
  $quantity =array(); 
     
  $db = '';
  $conn = oci_connect("", "", $db);
  $query = "select Shoes_Name, Size_NO, Price, Quantity from Shoes_Sponsor where Shoes_ID='".$Shoe_ID."'";
  $stmt = oci_parse($conn, $query);
  oci_execute($stmt, OCI_DEFAULT);
  while ($res = oci_fetch_row($stmt)){
    $shoes_name[]= $res[0];
    $size[]= $res[1];
    $price[]= $res[2];
    $quantity[]= $res[3];}
            
  oci_close($conn);
            
  echo "<p>Your order is here</p>"; 
    $buyshoes = "
      <table border='1'>
      <tr>
        <th>Shoes Name</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Total Price</th>
      </tr>";

  for ($i = 0; $i <sizeof($shoes_name); $i++) {
    $buyshoes = $buyshoes."
      <tr>
        <td>".$shoes_name[$i]."</td>
        <td>".$size[$i]."</td>
        <td>".$Quantity."</td>
        <td>".$price[$i]*$Quantity."</td>
      </tr>";
  }

  $buyshoes = $buyshoes."</table>";
  echo $buyshoes;
?> 
  
<br>  
<p> Step1: Please fill out the personalize tag that will show in your boots; </p>
<form action="finish_create_order.php" form name = "main_form" method="post" onsubmit="return validateForm();">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Personalize Tag (Words): <input type="text" name="personalizeTag" size="40" value="<?php echo $_SESSION['NAME'] ?>" />
  
  <br><br>
  <p> Step2: Please fill out the new quantity below if you want to change; </p>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Quantity: <input type="text" name="quantity" size="40" value="<?php echo $_SESSION['Quantity'] ?>" />
  
  <br><br>
  <p> Step3: Please fill out the new information below if you want to send it to other place, or person;  </p>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Consignee Name: <input type="text" name="consigneeName" size="40" value="<?php echo $_SESSION['NAME'] ?>" /><br>
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Consignee Phone: <input type="text" name="consigneePhone" size="40" /><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Address: <input type="text" name="address" size="40" value="<?php echo $_SESSION['CUST_ADDR'] ?>" />
  
  <br><br>
  <p> Step4:  please choose shipment, free ship today! </p>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Shipment:		<select id = "shipment" name = "shipment">
 	<option value ="UPS">UPS</option>
  <option value ="FEDEX">FEDEX</option>
 	</select>
  
  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" class="myButton" value="Create Order"><br>
</form>
	  
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
<a href = "mainstore.php">Back to main store. </a></p>

<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span>
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span>
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>