<form action="dashboard3.php" method="post">
        <input type="submit" class="myButton" value="return"/> <br>
    </form>
<?php
	$DateStart=$_POST["Date_Start"];
  $DateEnd=$_POST["Date_End"];
	 $db = '//oracle.cise.ufl.edu/orcl';
  	$conn = oci_connect("weiw", "!Zzz2018", $db);
	$query = "select case_numbe,block,arrest,Time_stAmp from CRIME where TIME_STAMP between '".$DateStart."' and '".$DateEnd."'";
   $stid = oci_parse($conn, $query);
   $r = oci_execute($stid);
   print '<table border="1">';
  while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';
oci_close($conn);

 ?>
