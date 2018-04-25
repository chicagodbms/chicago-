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



$CASENUMBER =$_POST["CASENUMBER"];
$ADDRESS = $_POST["ADDRESS"];
$IUCR =$_POST["IUCR"];
$ARRESTED =$_POST["ARRESTED"];
$DOMESTIC =$_POST["DOMESTIC"];
$C_BEAT= intval($_POST["C_BEAT"]);
$WARD=intval($_POST["WARD"]);
$TIME_STAMP=$_POST["TIME_STAMP"];
$LAT =floatval($_POST["LAT"]);
$LONG =floatval($_POST["LONG"]);

/*
$CASENUMBER = 'TEST2';
$ADDRESS = 'ZZZ BLOCK ZZZ';
$IUCR = '2014';
$ARRESTED = 'TRUE';
$DOMESTIC ='FALSE';
$C_BEAT= 7694;
$WARD=2;
$TIME_STAMP='14-08-2015 21:24:00';
$LONG =-87.695165461;
$LAT = 41.906594182;*/



$query1 ="INSERT INTO CRIME VALUES(
'".$CASENUMBER."','".$ADDRESS."','".$IUCR."','".$ARRESTED."','".$DOMESTIC."','".$C_BEAT."','".$WARD."',to_timestamp('".$TIME_STAMP."', 'dd-mm-yyyy hh24:mi:ss'),null)";

$query2 ="INSERT INTO PLACE VALUES(
'".$CASENUMBER."','".$LONG."','".$LAT."',SDO_GEOMETRY(2001,8307,SDO_POINT_TYPE('".$LONG."','".$LAT."', NULL),NULL,NULL))";
$stid = oci_parse($conn, $query2);
oci_execute($stid);

$stid = oci_parse($conn, $query1);
oci_execute($stid);
print "Successful Updated";

}

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
<?php
/**
 * Created by IntelliJ IDEA.
 * User: grandstar
 * Date: 18/4/21
 * Time: 上午12:49
 */
?>
<html>

<head>
    <title>
        Online Crime Database | Login
    </title>

    <!--    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />-->
    <link rel="stylesheet" href="css/stylemain.css" type="text/css" media="all" />
    <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
    <script src="js/jquery.slide.js" type="text/javascript"></script>
    <script src="js/jquery-func.js" type="text/javascript"></script>
    <!--    <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>-->
    <!--    <script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>-->
    <!--    <script src="js/jquery.slide.js" type="text/javascript"></script>-->
    <!--    <script src="js/jquery-func.js" type="text/javascript"></script>-->
    <!--    <link rel="stylesheet" href="css/style_mainstore.css" type="text/css" media="all" />-->
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 60%;
        }
        /* Optional: Makes the sample page fill the window. */
        /*html, body {*/
        /*height: 100%;*/
        /*margin: 0;*/
        /*padding: 0;*/
        /*}*/
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Trendy Charts Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Custom-Theme-files -->
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <link rel="stylesheet" type="text/css" href="css/jqcandlestick.css" />
    <!-- area-chart -->
    <link rel="stylesheet" href="css/morris.css">
    <!-- //area-chart -->
    <link href="css/datachartstyle.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

</head>

<body style="background-color:gainsboro">

<div id="top">
    <!--    <div class="shell">-->
    <div>
        <h1 id="logo"><a href="login.php">Online Database</a></h1>
        <div id="navigation">
            <ul>
                <li><a href="login.php">Home</a></li>
                <li><a href="about.php">About the Database</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</div>



<div style="10px">&nbsp</div>
<div id="menu" style="height:93%;width: 5%;float:left"></div>

<div id="insert" style="background-color:#bcbcbc;height:93%;width:43%;float:left">
    <div class="sub-w3lsright agileits-w3layouts" style="height:93%;>
        <h1 style="font-size: x-large;">Insert</h1>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <!--        <form action="#" method="post">-->
    <!--            <input type="text"  class="name" name="name" placeholder="Case Number" required="">-->
    <!--            <input type="text"  class="name" name="name" placeholder="Case Number" required="">-->
    <!--            <input type="text" name="ADDRESS" placeholder="066XX S DREXEL AVE" required="">-->
    <!--            <input type="submit" value="Search">-->
    <!--        </form>-->

    <!--    <div class="sub-w3lsright agileits-w3layouts">-->
    <!--        <div id="txtHint">insert</div>-->
    <!--    </div>-->
    <form action="delete.php" method="post">

        <input type="text" name="CASENUMBER" placeholder="CASE NUMBER:(like HY000000)" required="" />
        <div>&nbsp;</div>
        <input type="text" name="ADDRESS" placeholder="ADDRESS:(like 066XX S DREXEL AVE)" required=""/>
        <div>&nbsp;</div>
        <input type="text" name="IUCR" placeholder="IUCR: (Integer)"  required=""/>
        <div>&nbsp;</div>
        <input type="text" name="ARRESTED" placeholder="ARRESTED:(TRUE/FALSE)"  required=""/>
        <div>&nbsp;</div>
        <input type="text" name="DOMESTIC" placeholder="DOMESTIC:(TRUE/FALSE)"  required=""/>
        <div>&nbsp;</div>
        <input type="text" name="C_BEAT" placeholder="C_BEAT:(Integer)"  required=""/>
        <div>&nbsp;</div>

        <input type="text" name="WARD" placeholder="WARD:(Integer)" required=""/>
        <div>&nbsp;</div>
        <input type="text" name="TIME_STAMP" placeholder="TIME_STAMP:(01-AUG-15)" required=""/>
        <div>&nbsp;</div>
        <input type="text" name="LAT" placeholder="LAT:(Float Number)"  required=""/>
        <div>&nbsp;</div>
        <input type="text" name="LONG"  placeholder="LONG:(Float Number)" required=""/>
        <div>&nbsp;</div>
        <input type="submit" class="myButton" value="Insert"/>

    </form>
</div>
</div>

<div id="menu" style="height:93%;width: 5%;float:left">
    <!--    <p>database Operation</p>-->

</div>
<div id="update" style="background-color:#bcbcbc;height:93%;width:43%;float:left">
    <div class="sub-w3lsright agileits-w3layouts" style="height:93%;>
        <h1 style="font-size: x-large;">Delete</h1>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <!--        <form action="#" method="post">-->
    <!--            <input type="text"  class="name" name="name" placeholder="Case Number" required="">-->
    <!--            <input type="text"  class="name" name="name" placeholder="Case Number" required="">-->
    <!--            <input type="text" name="ADDRESS" placeholder="066XX S DREXEL AVE" required="">-->
    <!--            <input type="submit" value="Search">-->
    <!--        </form>-->

    <!--    <div class="sub-w3lsright agileits-w3layouts">-->
    <!--        <div id="txtHint">insert</div>-->
    <!--    </div>-->
    <form action="#" method="post">

        <input type="text" name="CASENUMBER" placeholder="CASE NUMBER" required="" />
        <div>&nbsp;</div>
        <!--            <input type="text" name="ADDRESS" placeholder="ADDRESS:(like 066XX S DREXEL AVE)" required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!--            <input type="text" name="IUCR" placeholder="IUCR: (Integer)"  required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!--            <input type="text" name="ARRESTED" placeholder="ARRESTED:(TRUE/FALSE)"  required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!--            <input type="text" name="DOMESTIC" placeholder="DOMESTIC:(TRUE/FALSE)"  required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!--            <input type="text" name="C_BEAT" placeholder="C_BEAT:(Integer)"  required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!---->
        <!--            <input type="text" name="WARD" placeholder="WARD:(Integer)" required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!--            <input type="text" name="TIME_STAMP" placeholder="TIME_STAMP:(01-AUG-15)" required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!--            <input type="text" name="LAT" placeholder="LAT:(Float Number)"  required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <!--            <input type="text" name="LONG"  placeholder="LONG:(Float Number)" required=""/>-->
        <!--            <div>&nbsp;</div>-->
        <input type="submit" class="myButton" value="Delete"/>

    </form>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>

    <form action="dashboard3.php" method="#">
        <p>return home page</p>
        <input type="submit" class="myButton" value="Back query page"/>
    </form>
    <div>&nbsp;</div>
    <div>&nbsp;</div>


    <form action="adminpage.php" method="#">
        <p>continue insert</p>
        <input type="submit" class="myButton" value="Back Update Page"/>
    </form>

</div>
</div>

<script src="js/d3.min.js"></script>
<script src="js/donut-pie-chart.min.js"></script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHxq1IQOM8aepyDc5kQYtRxOm6IYRxiWo&callback=initMap">
</script>
<div id="update" style="height:5%;width:50%;float:left">
    <div class="clear"></div>
    <div id="footer">
        <a href="login.php">Home</a> <span>|</span>
        <a href="about.php">About the Database</a> <span>|</span>
        <a href="contact.php">Contact</a>
    </div>



    <!---->
    <!--<div id="footer">-->
    <!--    <a href="login.php">Home</a> <span>|</span>-->
    <!--    <a href="about.php">About the Database</a> <span>|</span>-->
    <!--    <a href="contact.php">Contact</a>-->
    <!--</div>-->
    <script>
        alert("Insert Success!")
    </script>


</body>
</html>

