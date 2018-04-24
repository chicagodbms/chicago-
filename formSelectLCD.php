<?php
/**
 * Created by IntelliJ IDEA.
 * User: qijiang
 * Date: 4/23/18
 * Time: 5:25 AM
 */

$Time_Stamp = '';
$Block = '';
$Crime_Type = '';
$Description = '';
$Arrest = '';

$location = $_SESSION['Location'];
$case_id = $_SESSION['Case_ID'];
$date = $_SESSION['Date'];
$db = '';
$conn = oci_connect("", "", $db);
if(!$conn)
    die ("Connection Fail!") . ocierror();
$query = "select crime.time_stamp, crime.block, iucr.crime_type, iucr.description, crime.arrest from crime left outer join iucr on crime.IUCR = iucr.iucr_id 
where crime.CASE_NUMBER = '".$location."' and crime.case_number = '".$case_id."'and crime.timae_stamp = '".$date."';";

$res = oci_parse($conn, $query);
oci_execute($res);

while ($res1= oci_fetch_array($res)) {
    $Time_Stamp = $res1[0];
    $Block = $res1[1];
    $Crime_Type = $res1[2];
    $Description = $res1[3];
    $Arrest = $res1[4];
}

$outlook1 = "
      <table border='1'>
      <tr>
        <th>Time_Stamp</th>
        <th>Block</th>
        <th>Crime_Type</th>
        <th>Description</th>                 
        <th>Arrest</th>             
      </tr>";

$outlook1 = $outlook1."
      <tr>
        <td>".$Time_Stamp."</td>
        <td>".$Block."</td>
        <td>".$Crime_Type."</td>
        <td>".$Description."</td>                                  
        <td>".$Arrest."</td>
      </tr>";

echo $outlook1;
echo "<br>";


