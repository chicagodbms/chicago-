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

$allTimeGroup = array('0-3 AM', '3-6 AM', '6-9 AM', '9-12 AM', '12-15 PM', '15-18 PM', '18-21 PM','21-24 PM');
$allCrimeType = array('HOMICIDE','CRIM SEXUAL ASSAULT','ROBBERY','BATTERY','PUBLIC PEACE VIOLATION','RITUALISM',
	'ASSAULT','STALKING','BURGLARY','THEFT','MOTOR VEHICLE THEFT','ARSON','HUMAN TRAFFICKING','DECEPTIVE PRACTICE',
	'CRIMINAL DAMAGE','CRIMINAL TRESPASS','WEAPONS VIOLATION','CONCEALED CARRY LICENSE VIOLATION','NON-CRIMINAL',
	'PROSTITUTION','OBSCENITY','PUBLIC INDECENCY','OFFENSE INVOLVING CHILDREN','SEX OFFENSE','GAMBLING',
	'OTHER OFFENSE','KIDNAPPING','NARCOTICS','OTHER NARCOTIC VIOLATION','LIQUOR LAW VIOLATION','CRIMINAL ABORTION',
	'INTERFERENCE WITH PUBLIC OFFICER','INTIMIDATION','OTHER OFFENSE');
$arrestDomesBoolean = array('TRUE','FALSE');
$allDistrict=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,22,24,25,31);


$CASENO = 'HY009000'; //INPUT CASE NUMBER1
$dateBegin = '01-08-2015';
$dateEnd ='31-08-2015';
$timeGroup = arrayToQuery($allTimeGroup);
$districtNo =-1;
$crimeType= arrayToQuery($allCrimeType);
$arrestedNot=arrayToQuery($arrestDomesBoolean);
$domesticNot=arrayToQuery($arrestDomesBoolean);

/* IF THERE ARE INPUT, CHANGE THE VALUES OF THE DEFAULT HERE
time group, crime type, arrest, domestic and district can be multiple choice, and add the input into an array...
$CASENO = 
$dateBegin = 
$dateEnd =
$timeGroup = arrayToQuery($allTimeGroup);
$districtNo =implode(',', $allDistrict);
$crimeType= arrayToQuery($allCrimeType);
$arrestedNot=arrayToQuery($arrestDomesBoolean);
$domesticNot=arrayToQuery($arrestDomesBoolean);
*/



if ($districtNo ==-1){
	$query = "SELECT CRIME.CASE_NUMBE,CRIME.BLOCK,IUCR.CRIME_TYPE, TO_CHAR(CRIME.TIME_STAMP,'DD-MON-YYYY'),CRIME.ARREST,CRIME.DOMESTIC,PLACE.LATITUDE,PLACE.LONGITUDE
		FROM CRIME,PLACE,IUCR WHERE 
		CRIME.CASE_NUMBE=PLACE.CASE_NUMBE AND IUCR.IUCR_ID=CRIME.IUCR AND
		CRIME.TIME_STAMP>= to_timestamp('".$dateBegin."', 'dd-mm-yyyy') AND
		CRIME.TIME_STAMP<= to_timestamp('".$dateEnd."', 'dd-mm-yyyy') AND
		CRIME.TIME_GROUP IN $timeGroup AND
		IUCR.CRIME_TYPE IN $crimeType AND
		CRIME.ARREST IN $arrestedNot AND
		CRIME.DOMESTIC IN $domesticNot
	";
}else{
	//$districtNo = implode(',', $allDistrict);
	PRINT($districtNo);
	$query = "SELECT CRIME.CASE_NUMBE,PLACE.LATITUDE,PLDISTRICT.DIST_LABEL
		FROM CRIME,PLACE,IUCR,PLDISTRICT WHERE 
		CRIME.CASE_NUMBE=PLACE.CASE_NUMBE AND IUCR.IUCR_ID=CRIME.IUCR AND SDO_CONTAINS(PLDISTRICT.PDGEO, PLACE.PLACEGEO) = 'TRUE' AND 
		CRIME.TIME_STAMP>= to_timestamp('".$dateBegin."', 'dd-mm-yyyy') AND
		CRIME.TIME_STAMP<= to_timestamp('".$dateEnd."', 'dd-mm-yyyy') AND
		CRIME.TIME_GROUP IN $timeGroup AND
		IUCR.CRIME_TYPE IN $crimeType AND
		CRIME.ARREST IN $arrestedNot AND
		CRIME.DOMESTIC IN $domesticNot AND
		PLDISTRICT.DISTRICTNU IN ($districtNo)
		";
}
//$query = "SELECT CRIME.CASE_NUMBE,PLACE.LATITUDE FROM CRIME,PLACE WHERE CRIME.CASE_NUMBENO= '".$CASENO."' AND CRIME.CASE_NUMBE=PLACE.CASE_NUMBE";
//$query = "SELECT CRIME.CASE_NUMBE,PLACE.LATITUDE FROM CRIME,PLACE WHERE CRIME.CASE_NUMBE IN ('HY009000','HY310631') AND CRIME.CASE_NUMBE=PLACE.CASE_NUMBE";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
//print $r;
print '<table border="1"
		<tr>
        <th>CRIME NUMBER</th>
        <th>ADDRESS</th>
		<th>CRIME TYPE</th>
        <th>DATE</th>  

        <th>ARREST</th>
        <th>DOMESTIC</th>
		<th>LATITUDE</th>
        <th>LONGITUDE</th>   		
      </tr>
	>';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';

function arrayToQuery($useArray){
	$newArray = '(';
	foreach ($useArray as &$value) {
	$newArray .= '\'';
    $newArray .= $value;
	$newArray .= '\',';
	}
	$newArray=rtrim($newArray,',');
	$newArray .= ')';
	return $newArray;
} 

// Close the Oracle connection
oci_close($conn);
?>