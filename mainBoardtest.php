<?php
/**
 * Created by IntelliJ IDEA.
 * User: qijiang
 * Date: 4/22/18
 * Time: 8:48 PM
 */

    // 1. search the total number of crimes occurred in Chicago 2015
    $db = '';
    $conn = oci_connect("", "", $db);
    if(!$conn)
        die ("Connection Fail!") . ocierror();

    $query = "select count(*) as crime_total_number from crime;";
    $crime = oci_parse($conn, $query);
    oci_execute($crime);
    $res = oci_fetch_array($crime);
    oci_close($conn);


    $outlook1 = "
      <table border = '1'>
      <tr>
        <th>Crime_Total_Number</th>
      </tr>";
    
    $outlook1 = $outlook1."
      <tr>
     	  <td>\".$res.\"</td>
      </tr>";

    $outlook1 = $outlook1."</table>";
    echo $outlook1;
    echo "<br>";

    echo "<p>The total crime number in Chicago (2015) is ".$res.".</p>";

    // 2. search crime number of certain Crime_Type and Time_Group
    $Crime_Type = array();
    $Time_Group = array();

    $db = '';
    $conn = oci_connect("", "", $db);
    if(!$conn)
        die ("Connection Fail!") . ocierror();

    $query1 = "select crime_type from iucr group by crime_type;";
    $query2 = "select time_group from crime group by time_group;";
    $ct = oci_parse($conn, $query1);
    $tg = oci_parse($conn, $query2);
    oci_execute($ct);
    oci_execute($tg);

    while ($res1= oci_fetch_array($ct)) {
        $Crime_Type[] = $res1[0];
    }
    while ($res2 = oci_fetch_array($tg)) {
        $Time_Group[] = $res2[0];
    }
    oci_close($conn);



    if(!$_POST) {
        echo '
        <form action="formSelectData.php" method="POST">
        Crime_Type: <select name="Crime_Type">
        <option value=\"1\">."$Crime_Type[0]".</option>
        <option value=\'2\'>."$Crime_Type[1]".</option>
        <option value=\'3\'>."$Crime_Type[2]".</option>
        <option value=\'4\'>."$Crime_Type[3]".</option>
        <option value=\'5\'>."$Crime_Type[4]".</option>
        <option value=\'6\'>."$Crime_Type[5]".</option>
        <option value=\'7\'>."$Crime_Type[6]".</option>
        <option value=\'8\'>."$Crime_Type[7]".</option>
        <option value=\'9\'>."$Crime_Type[8]".</option>
        </select>
        
        Time_Group: <select name="Time_Group">
        <option value=\'1\'>."$Time_Group[0]".</option>
        <option value=\'2\'>."$Time_Group[1]".</option>
        <option value=\'3\'>."$Time_Group[2]".</option>
        <option value=\'4\'>."$Time_Group[3]".</option>
        <option value=\'5\'>."$Time_Group[4]".</option>
        <option value=\'6\'>."$Time_Group[5]".</option>
        <option value=\'7\'>."$Time_Group[6]".</option>
        <option value=\'8\'>."$Time_Group[7]".</option>
        </select>
        
        <br>
        <input type="submit" value="Submit">
        </form>';
    }
?>

    // 3. search by location, case_id and date

<html>
    <body>

    <form action="../../../../Users/grandstar/Dropbox/dbmsApp/chicago--master/formSelectLCD.php" method="post">
        Location: <input type="text" name="Location">
        Case ID: <input type="text" name="Case_ID">
        Date: <input type="text" name="Date">
    <input type="submit" value="Search">
    </form>


    // 4. the number of crimes for different crime types

    <form action="../../../../Users/grandstar/Dropbox/dbmsApp/chicago--master/numDifCrimeType.php" method="post">
        Crime Type: <input type="text" name="Crime Type">
        <input type="submit" value="Search">
    </form>

    </body>
</html>

    // 5.