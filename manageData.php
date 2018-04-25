<?php
/**
 * Created by IntelliJ IDEA.
 * User: qijiang
 * Date: 4/24/18
 * Time: 8:34 PM
 */

$Case_Number = $_POST['name'];
// Open connection
  $db = '//oracle.cise.ufl.edu/orcl';
  $conn = oci_connect("weiw", "!Zzz2018", $db);
if(!$conn) {
    die ("Connection Fail!") . ocierror();
}

// Select all the rows in the markers table
$query1 = "CREATE TABLE markers(
  lat FLOAT NOT NULL ,
  lng FLOAT NOT NULL ,
  PRIMARY KEY (lat,lng))";
$result1 = oci_parse($conn, $query1);
oci_execute($result1);
if(!$result1) {
    die('Invalid query!');
}

$query2 = "select LATITUDE, LONGITUDE from place where PLACE.CASE_NUMBE = '".$Case_Number."'";
$result2 = oci_parse($conn, $query2);
oci_execute($result2);
if(!$result2) {
    die('Invalid query!');
}

while ($row = oci_fetch_array($result2)){

    $latitude = $row[0];
    $longitude = $row[1];
}

$query3 = "INSERT INTO markers (lat, lng) VALUES ('".$latitude."', '".$longitude."')";
$result3 = oci_parse($conn, $query3);
oci_execute($result3);
if(!$result3) {
    die('Invalid query!');
}

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}

// Open connection
$db = '//oracle.cise.ufl.edu/orcl';
  $conn = oci_connect("weiw", "!Zzz2018", $db);
if(!$conn) {
    die ("Connection Fail!") . ocierror();
}

// Select all the rows in the markers table
$query = "select * from markers";
$result = oci_parse($conn, $query);
oci_execute($result);
if(!$result) {
    die('Invalid query!');
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';
while ($row = oci_fetch_array($result)){
    // Add to XML document node
    echo '<marker ';
    echo 'lat="' . $row[0] . '" ';
    echo 'lng="' . $row[1] . '" ';
    echo '/>';
}
// End XML file
echo '</markers>';


?>
