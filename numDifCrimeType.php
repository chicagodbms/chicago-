<?php
/**
 * Created by IntelliJ IDEA.
 * User: qijiang
 * Date: 4/23/18
 * Time: 6:24 AM
 */

$crimetype = $_SESSION['Crime Type'];

$db = '';
$conn = oci_connect("", "", $db);
if(!$conn)
    die ("Connection Fail!") . ocierror();
$query = "select * from(select iucr.CRIME_TYPE as ctype, count(crime.CASE_NUMBE) from crime left outer join iucr on CRIME.IUCR = IUCR.IUCR_ID
group by iucr.CRIME_TYPE) where ctype = '".$crimetype."';";
$crime = oci_parse($conn, $query);
oci_execute($crime);
$res = oci_fetch_array($crime);
oci_close($conn);


$outlook1 = "
        <table border = '1'>
        <tr>
            <th>Crime_Number</th>
        </tr>";

$outlook1 = $outlook1."
        <tr>
     	    <td>\".$res.\"</td>
        </tr>";

$outlook1 = $outlook1."</table>";
echo $outlook1;
echo "<br>";

