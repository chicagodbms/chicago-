<?php
 $db = '//oracle.cise.ufl.edu/orcl';
    $conn = oci_connect("weiw", "!Zzz2018", $db);
	$custcase=$_POST["case_number"];
	
	$query = "select * from CRIME where CASE_NUMBE = '".$custcase."'";
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


 ?>
 <form action="dashboard3.php" >
                
                <input type="submit" value="Return">
            </form>