<?php
	session_start();
?>

<html>

<head>
	<title>
		Online Soccer Shoes Store |  Payment
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
    
  	function validateNames() {
			var x = document.forms["main_form"]["Card_Holder_Name"].value;
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

 		function validateCard_NO() {
 			var x = document.forms["main_form"]["Card_NO"].value;
 			if (x == null || x == "") {
 				alert("Card_NO must be filled out. ");
 				return false;
 			}
      
      if (x.length > 16) {
     	  alert("Card_NO must be 16 digits at most. ");
 				return false;
      }
 			return true;
 		}
    
   	function validateDate() {
 			var x = document.forms["main_form"]["Expiration"].value;
 			if (x == null || x == "") {
 				alert("Expiration Date must be filled out. ");
 				return false;
 			}
 			return true;
 		}
        
 		function validateForm(){
			if (!validateNames() || !validateCard_NO()|| !validateDate())
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
  $order_status='unpaid';
    
  if (!empty($_GET["order_id"])) {
    $_SESSION['ORDERID'] = $_GET["order_id"];
    $order_id = $_GET["order_id"];
      
    ini_set('display_errors', 'On');
    $db = '';
    $conn = oci_connect("", "", $db);
    $query = "select Order_Status from Shoes_Order where Order_ID='".$order_id."'";
    $stmt = oci_parse($conn, $query);
 	  oci_execute($stmt, OCI_DEFAULT);
    while ($res = oci_fetch_row($stmt)){
      $order_status= $res[0];          
    } 
    oci_close($conn);
          
    if ($order_status=='paid')  
    {   
      echo "You cannot pay for an already paid order. "; 
      echo '<p><a href = "check_order.php">Back to orders. </a></p>'; 
    } 
    else
    {
      echo "<p> Please fill out the payment information; </p>";
      echo '<form name = "main_form" form action="finish_payment.php" onsubmit="return validateForm();" method="post">'.
             'Card Number: <input type="text" name="Card_NO" size="40"/><br>    
              Card Holder Name: <input type="text" name="Card_Holder_Name" size="40" value="'.$_SESSION['NAME'].'" /><br>
              <br><p>Please fill out using YYYY-MM-DD format; </p>'.
             'Expiration Date: <input type="text" name="Expiration" size="40"  /><br>
              Card_Type:		
              <select id = "Card_Type" name = "Card_Type">
             	 <option value ="Credit">Credit</option>
                <option value ="Debit">Debit</option>
	           </select><br><br>
	            <input type="submit" class="myButton" value="Submit Now!!!"><br>
            </form>
            <p><a href = "check_order.php">Back to orders. </a></p>';  
    }
  }
  else
  {
    echo "<p> Please fill out the payment information </p>";
    echo '<form name = "main_form" form action="finish_payment.php" onsubmit="return validateForm();" method="post">'.
           'Card Number: <input type="text" name="Card_NO" size="40"/><br>    
            Card Holder Name: <input type="text" name="Card_Holder_Name" size="40" value="'.$_SESSION['NAME'].'" /><br>
            <p> Please fill out using YYYY-MM-DD format,  </p>'.
           'Expiration Date: <input type="text" name="Expiration" size="40"  /><br>
            Card_Type:		
            <select id = "Card_Type" name = "Card_Type">
            	 <option value ="Credit">Credit</option>
               <option value ="Debit">Debit</option>
	          </select><br>
	          <input type="submit"class="myButton" value="Submmit Now!!!"><br>
          </form>
          <p><a href = "mainstore.php">Back</a></p>';       
  }
?>

<div id="footer">
  <a href="cust_profile.php">Home</a> <span>|</span> 
  <a href="about.php">About the Database</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span> 
  <a href="logout.php">Logout</a> 
</div>
</body>
</html>