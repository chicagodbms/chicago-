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
    // print "Connected to Oracle!";
}
//=========================================下面这个区域是default的值top： 如果没有选择==================================
$allTimeGroup = array('0-3 AM', '3-6 AM', '6-9 AM', '9-12 AM', '12-15 PM', '15-18 PM', '18-21 PM','21-24 PM');
$allCrimeType = array('HOMICIDE','CRIM SEXUAL ASSAULT','ROBBERY','BATTERY','PUBLIC PEACE VIOLATION','RITUALISM',
    'ASSAULT','STALKING','BURGLARY','THEFT','MOTOR VEHICLE THEFT','ARSON','HUMAN TRAFFICKING','DECEPTIVE PRACTICE',
    'CRIMINAL DAMAGE','CRIMINAL TRESPASS','WEAPONS VIOLATION','CONCEALED CARRY LICENSE VIOLATION','NON-CRIMINAL',
    'PROSTITUTION','OBSCENITY','PUBLIC INDECENCY','OFFENSE INVOLVING CHILDREN','SEX OFFENSE','GAMBLING',
    'OTHER OFFENSE','KIDNAPPING','NARCOTICS','OTHER NARCOTIC VIOLATION','LIQUOR LAW VIOLATION','CRIMINAL ABORTION',
    'INTERFERENCE WITH PUBLIC OFFICER','INTIMIDATION','OTHER OFFENSE');
$arrestBoolean = array('TRUE','FALSE');
$domesticBoolean = array('TRUE','FALSE');
$allDistrict=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,22,24,25,31);
$districtNo =-1;
$CASENO = '-1'; //INPUT CASE NUMBER1
$dateBegin = '10-01-2015';
$dateEnd ='31-12-2015';
//========================================上面这个区域是default的值bottom： 如果没有选择================================
//----------------------------------------下面区域是要替换的值，如果有输入，请替换---------------------------------------------------------------------------------------------------------
$CASENO = 'HY364551'; //INPUT CASE NUMBER1
//$dateBegin = '20-08-2015';
//$dateEnd ='31-08-2015';
//$districtNo =-1;
//$allTimeGroup = array('0-3 AM', '3-6 AM', '6-9 AM', '9-12 AM', '12-15 PM', '15-18 PM', '18-21 PM','21-24 PM');
/*$allCrimeType = array('HOMICIDE','CRIM SEXUAL ASSAULT','ROBBERY','BATTERY','PUBLIC PEACE VIOLATION','RITUALISM',
	'ASSAULT','STALKING','BURGLARY','THEFT','MOTOR VEHICLE THEFT','ARSON','HUMAN TRAFFICKING','DECEPTIVE PRACTICE',
	'CRIMINAL DAMAGE','CRIMINAL TRESPASS','WEAPONS VIOLATION','CONCEALED CARRY LICENSE VIOLATION','NON-CRIMINAL',
	'PROSTITUTION','OBSCENITY','PUBLIC INDECENCY','OFFENSE INVOLVING CHILDREN','SEX OFFENSE','GAMBLING',
	'OTHER OFFENSE','KIDNAPPING','NARCOTICS','OTHER NARCOTIC VIOLATION','LIQUOR LAW VIOLATION','CRIMINAL ABORTION',
	'INTERFERENCE WITH PUBLIC OFFICER','INTIMIDATION','OTHER OFFENSE');*/
//$arrestBoolean = array('TRUE','FALSE');
//$domesticBoolean = array('TRUE','FALSE');
//$allDistrict=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,22,24,25,31);*/
//-----------------------------------------上面区域是要替换的值，如果有输入，请替换---------------------------------------------------------------------------------------------------------
//下面四行不需要变！！！
$timeGroup = arrayToQuery($allTimeGroup);
$crimeType= arrayToQuery($allCrimeType);
$arrestedNot=arrayToQuery($arrestBoolean);
$domesticNot=arrayToQuery($domesticBoolean);




if ($districtNo ==-1 && $CASENO=='-1'){
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
}else if ($CASENO=='-1'){
    //$districtNo = implode(',', $allDistrict);
    PRINT($districtNo);
    $query = "SELECT CRIME.CASE_NUMBE,CRIME.BLOCK,IUCR.CRIME_TYPE, TO_CHAR(CRIME.TIME_STAMP,'DD-MON-YYYY'),CRIME.ARREST,CRIME.DOMESTIC,PLACE.LATITUDE,PLACE.LONGITUDE
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
}else if($districtNo ==-1 && $CASENO!='1'){
    $query = "SELECT CRIME.CASE_NUMBE,CRIME.BLOCK,IUCR.CRIME_TYPE, TO_CHAR(CRIME.TIME_STAMP,'DD-MON-YYYY'),CRIME.ARREST,CRIME.DOMESTIC,PLACE.LATITUDE,PLACE.LONGITUDE
		FROM CRIME,PLACE,IUCR WHERE 
		CRIME.CASE_NUMBE='".$CASENO."' AND
		CRIME.CASE_NUMBE=PLACE.CASE_NUMBE AND IUCR.IUCR_ID=CRIME.IUCR AND
		CRIME.TIME_STAMP>= to_timestamp('".$dateBegin."', 'dd-mm-yyyy') AND
		CRIME.TIME_STAMP<= to_timestamp('".$dateEnd."', 'dd-mm-yyyy') AND
		CRIME.TIME_GROUP IN $timeGroup AND
		IUCR.CRIME_TYPE IN $crimeType AND
		CRIME.ARREST IN $arrestedNot AND
		CRIME.DOMESTIC IN $domesticNot
	";
}else {
    $query = "SELECT CRIME.CASE_NUMBE,CRIME.BLOCK,IUCR.CRIME_TYPE, TO_CHAR(CRIME.TIME_STAMP,'DD-MON-YYYY'),CRIME.ARREST,CRIME.DOMESTIC,PLACE.LATITUDE,PLACE.LONGITUDE
		FROM CRIME,PLACE,IUCR,PLDISTRICT WHERE 
		CRIME.CASE_NUMBE='".$$CASENO."' AND
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
$i=0;

$selectCrime = array();
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    print '<tr>';
    foreach ($row as $item) {
        if(($i%8)==0 ){array_push($selectCrime, $item);}
        $i++;
        print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';

    }
    print '</tr>';
}
print '</table>';



//THE FOLLOWING IS FOR THE GROUP BY CHART=============================================================================================================
$groupAtt = 'TIME_GROUP'; //这里替换变量：group by，default是time group  选择范围在                                                                         ---------------替换变量：group--------------
$size=count($selectCrime);
if($size>0 && $groupAtt !='-1'){                                    //    |
    if ($size>990){$size=990;}                                         //    |
    $crimeIn = arrayToQuery(array_chunk($selectCrime, $size)[0]);      //    |
    //    |
//PRINT($crimeIn."=========================");                     //    |
    //    |
    $crimeGroup = array('IUCR','ARREST','DOMESTIC','TIME_GROUP');      //这一行
    $raceGroup = array('WHITE', 'ASIAN','OTHER');                      //或者这一行
    $demoGroup = array('BACHELORPERC','MALEPERC');                     //或者这一行


    if (in_array($groupAtt, $crimeGroup)){
        $groupQuery = "select $groupAtt,ROUND(COUNT(CASE_NUMBE)/$size*100,2) FROM CRIME WHERE CASE_NUMBE IN $crimeIn GROUP BY $groupAtt";}
//echo($groupQuery);
    if (in_array($groupAtt, $raceGroup)){
        $groupQuery = "select RACE1.$groupAtt,ROUND(COUNT(PLACE.CASE_NUMBE)/$size*100,2) 
					FROM PLACE,NEIGHBORHOOD,RACE1
					WHERE PLACE.CASE_NUMBE IN $crimeIn AND NEIGHBORHOOD.GEOID=RACE1.N_ID AND SDO_CONTAINS(NEIGHBORHOOD.NBGEO, PLACE.PLACEGEO) = 'TRUE' AND RACE1.$groupAtt IS NOT NULL
					GROUP BY RACE1.$groupAtt";}
    if (in_array($groupAtt, $demoGroup)){
        $groupQuery = "select DEMOGRAPHICS1.$groupAtt,ROUND(COUNT(PLACE.CASE_NUMBE)/$size*100,2) 
					FROM PLACE,NEIGHBORHOOD,DEMOGRAPHICS1
					WHERE PLACE.CASE_NUMBE IN $crimeIn AND NEIGHBORHOOD.GEOID=DEMOGRAPHICS1.N_ID AND SDO_CONTAINS(NEIGHBORHOOD.NBGEO, PLACE.PLACEGEO) = 'TRUE' AND DEMOGRAPHICS1.$groupAtt IS NOT NULL
					GROUP BY DEMOGRAPHICS1.$groupAtt";}
//echo($groupQuery);

    $groupQ = oci_parse($conn, $groupQuery);
    $rQ = oci_execute($groupQ);
    $perc='PERCENTAGE';
    $dataPoints=array();//array of arrXYs
    $arrXY=array();     //array of x and the corresponding y
    $i=0;


    print '<table border="1">';
    print '<tr>';
    print '<td>'.$groupAtt.'</td>';
    print '<td>'.$perc.'</td>';
    print '</tr>';
    while ($row = oci_fetch_array($groupQ, OCI_RETURN_NULLS+OCI_ASSOC)) {
        print '<tr>';
        foreach ($row as $item1) {
            if(($i%2)==0 ){$arrXY["label"]=$item1;}

            if(($i%2)==1 ){
                $arrXY["y"]=$item1;
                array_push($dataPoints,$arrXY);
                $arrXY=array();}
            $i++;


            print '<td>'.($item1 !== null ? htmlentities($item1, ENT_QUOTES) : '&nbsp').'</td>';
        }
        print '</tr>';
    }
    print '</table>';
}


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

<html>
<head>
    <script>

        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: " "
                },
                axisY: {
                    suffix: "%",
                    scaleBreaks: {
                        autoCalculate: true
                    }
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0\"%\"",
                    indexLabel: "{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "white",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>