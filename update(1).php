<?php

/**
 * User: WEI ZHANG
 * Date: 4/24/18
 * Time: 1:40 AM
 */
// Create connection to Oracle
$conn = oci_connect("weiw", "!Zzz2018", "//oracle.cise.ufl.edu/orcl");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   print "Connected to Oracle!";
}

/*
$CASENUMBER = 
$ADDRESS = 
$IUCR =
$ARRESTED = 
$DOMESTIC 
$C_BEAT= 
$WARD=
$TIME_STAMP=
$LAT =
$LONG =
*/

//THE FOLLOWING ARE MY SAMPLES
$CASENUMBER = 'TEST2';
$ADDRESS = 'ZZZ BLOCK ZZZ';
$IUCR = '2014';
$ARRESTED = 'TRUR';
$DOMESTIC ='FALSE';
$C_BEAT= 7694;
$WARD=2;
$TIME_STAMP='14-08-2015 21:24:00';
$LONG =-87.695165461;
$LAT = 41.906594182;



$query1 ="INSERT INTO CRIME111 VALUES(
'".$CASENUMBER."','".$ADDRESS."','".$IUCR."','".$ARRESTED."','".$DOMESTIC."','".$C_BEAT."','".$WARD."',to_timestamp('".$TIME_STAMP."', 'dd-mm-yyyy hh24:mi:ss'),null)";

$query2 ="INSERT INTO PLACE111 VALUES(
'".$CASENUMBER."','".$LONG."','".$LAT."',SDO_GEOMETRY(2001,8307,SDO_POINT_TYPE('".$LONG."','".$LAT."', NULL),NULL,NULL))";
$stid = oci_parse($conn, $query2);
oci_execute($stid);

$stid = oci_parse($conn, $query1);
oci_execute($stid);

PRINT('INSERTED!!!');

/*
$CASENUMBER = 'TEST2';

$query1 ="DELETE FROM CRIME WHERE CASE_NUMBE='".$CASENUMBER."'";

$query2 ="DELETE FROM PLACE WHERE CASE_NUMBE='".$CASENUMBER."'";
$stid = oci_parse($conn, $query1);
oci_execute($stid);

$stid = oci_parse($conn, $query2);
oci_execute($stid);

PRINT('DELETED!!!');*/


// Close the Oracle connection
oci_close($conn);
?>