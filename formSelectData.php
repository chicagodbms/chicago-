<?php
/**
 * Created by IntelliJ IDEA.
 * User: qijiang
 * Date: 4/23/18
 * Time: 4:10 AM
 */

$Crime_Type = $_SESSION['Crime_Type'];
$Time_Group = $_SESSION['Time_Group'];

$db = '';
$conn = oci_connect("", "", $db);
if(!$conn)
    die ("Connection Fail!") . ocierror();
$query = "select * from crime left outer join iucr on crime.IUCR = iucr.IUCR_ID
where iucr.CRIME_TYPE = '".$Crime_Type."' and CRIME.TIME_GROUP =  '".$Time_Group."';";
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
