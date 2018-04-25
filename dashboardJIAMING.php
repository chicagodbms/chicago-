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
            height: 70%;
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
    <link href="//fonts.googleapis.com/css?family=Roboto:100,1005i,300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

</head>

<body style="background-color: beige">

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

<!--<div class="main">-->
<!--    <br>-->
<!---->
<!--    <p> Welcome to our online crime database!</p><br>-->
<!---->
<!--    --><?php
//    echo"______Customers______";
//    ?>
<!--</div>-->

<div style="20px">&nbsp</div>

<div id="menu" style="background-color:#bcbcbc;height:100%;width: 30%;float:left">
<!--    <p>database Operation</p>-->
    <form action="crimedatabase.php" method="post">
        Case_Number: <input type="text" name="case_number" placeholder="HY000000" /> <br>
      
        <input type="submit" class="myButton" value="search case_number"/> <br>
    </form>

<form action="DaterangeSearch.php" method="post">
        Date_Start:<input type="text" name="Date_Start" placeholder="01-AUG-15"/> <br>
        Date_End:<input type="text" name="Date_End" placeholder="01-AUG-16"/> <br>

        <input type="submit" class="myButton" value="Search"/> <br>
</form>
    <form action="TotalCrime.php" method="post">
        
        <input type="submit" class="myButton" value="TotalCrime"/> <br>
    </form>
    <form action="update.php" method="post">
        CASENUMBER:<input type="text" name="CASENUMBER" placeholder="HY000000" /> <br>
        ADDRESS:<input type="text" name="ADDRESS" placeholder="066XX S DREXEL AVE"/> <br>
        IUCR:<input type="text" name="IUCR" placeholder="Integer" /> <br>
        ARRESTED:<input type="text" name="ARRESTED" placeholder="TRUE/FALSE" /> <br>
        DOMESTIC:<input type="text" name="DOMESTIC" placeholder="TRUE/FALSE" /> <br>
       C_BEAT:<input type="text" name="C_BEAT" placeholder="Integer" /> <br>
       WARD:<input type="text" name="WARD" placeholder="Integer" /> <br>
        TIME_STAMP:<input type="text" name="TIME_STAMP" placeholder="01-AUG-15" /> <br>
        LAT:<input type="text" name="LAT" placeholder="Float Number"  /> <br>
        LONG:<input type="text" name="LONG"  placeholder="Float Number"/> <br>
        <input type="submit" class="myButton" value="Update"/> <br>
        <br>
    </form>
<form action="formselectdata.php" method="POST">
 <select name="products[]" multiple>
    <option>PUBLIC PEACE VIOLATION
    <option>ASSAULT
    <option>ARSON
    <option>CONCEALED CARRY LICENSE VIOLATION
    <option>PROSTITUTION
    <option>KIDNAPPING
    <option>CRIMINAL ABORTION
    <option>DECEPTIVE PRACTICE
    <option>OBSCENITY
    <option>THEFT
    <option>MOTOR VEHICLE THEFT
    <option>WEAPONS VIOLATION
    <option>NARCOTICS
    <option>INTIMIDATION
    <option>HOMICIDE
    <option>STALKING
    <option>HUMAN TRAFFICKING
    <option>CRIMINAL TRESPASS
    <option>CRIM SEXUAL ASSAULT
    <option>PUBLIC INDECENCY
    <option>OFFENSE INVOLVING CHILDREN
    <option>SEX OFFENSE
    <option>GAMBLING
    <option>RITUALISM
    <option>NON-CRIMINAL
    <option>OTHER OFFENSE
    <option>BURGLARY
    <option>CRIMINAL DAMAGE
    <option>OTHER NARCOTIC VIOLATION
    <option>LIQUOR LAW VIOLATION
    <option>CRIMINAL DAMAGE
  </select>
<br>
<input type="submit" class="myButton" value="OK">
</form>
        <input type="checkbox" value="9" name="Type9"> DECEPTIVE PRACTICE<br>
        <input type="checkbox" value="10" name="Type10"> OBSCENITY<br>
        <input type="checkbox" value="11" name="Type11"> ROBBERY<br>
        <input type="checkbox" value="12" name="Type12"> THEFT<br>
        <input type="checkbox" value="13" name="Type13"> MOTOR VEHICLE THEFT<br>
        <input type="checkbox" value="14" name="Type14"> WEAPONS VIOLATION<br>
        <input type="checkbox" value="15" name="Type15"> NARCOTICS<br>
        <input type="checkbox" value="16" name="Type16"> INTIMIDATION<br>
        <input type="checkbox" value="17" name="Type17"> HOMICIDE<br>
        <input type="checkbox" value="18" name="Type18"> STALKING<br>
        <input type="checkbox" value="19" name="Type19"> HUMAN TRAFFICKING<br>
        <input type="checkbox" value="20" name="Type20"> CRIMINAL TRESPASS<br>
        <input type="checkbox" value="21" name="Type21"> CRIM SEXUAL ASSAULT<br>
        <input type="checkbox" value="22" name="Type22"> PUBLIC INDECENCY<br>
        <input type="checkbox" value="23" name="Type23"> OFFENSE INVOLVING CHILDREN<br>
        <input type="checkbox" value="24" name="Type24"> SEX OFFENSE<br>
        <input type="checkbox" value="25" name="Type25"> GAMBLING<br>
        <input type="checkbox" value="26" name="Type26"> RITUALISM<br>
        <input type="checkbox" value="27" name="Type27"> NON-CRIMINAL<br>
        <input type="checkbox" value="28" name="Type28"> OTHER OFFENSE<br>
        <input type="checkbox" value="29" name="Type29"> INTERFERENCE WITH PUBLIC OFFICER<br>
        <input type="checkbox" value="30" name="Type30"> OTHER OFFENSE <br>
        <input type="checkbox" value="31" name="Type31"> BURGLARY<br>
        <input type="checkbox" value="32" name="Type32"> CRIMINAL DAMAGE<br>
        <input type="checkbox" value="33" name="Type33"> OTHER NARCOTIC VIOLATION <br>
        <input type="checkbox" value="34" name="Type34"> LIQUOR LAW VIOLATION<br>
        <input type="checkbox" value="35" name="Type35"> CRIMINAL DAMAGE<br>


        <input type="submit" class="myButton" value="Update"/> <br>
        


        男 <input type="radio" name="sex" value="man" />
        女 <input type="radio" name="sex" value="woman" />
    </form>

</div>

<div style="height:600px;width: 0.5%;float:left"> 
<!--    <p>database Operation</p>-->
</div>
<div id="content" style="height:800px;width:47%;px;float:left">
<!--     style="background-color:beige;-->

<!--    <p>content</p>-->
    <div id="map"></div>
    <>
</div>

    <div id="chart" style="background-color:#bcbcbc; height:800px;width: 22%;px;float:right">
        <div class="main">

                <div class="agile_donut_chart agileits_w3layouts_text">
                    <div class="exp"></div>

<!--    <p>layer and chart</p>-->
</div>

<script src="js/d3.min.js"></script>
<script src="js/donut-pie-chart.min.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {

        function get_data() {
            var props = ['crime1', "crime2", "crime3", "crime4"];
            var out   = [];
            for (var i = 0; i < props.length; i++) {
                out.push({"name":props[i], "hvalue": Math.floor(Math.random() * 100)});
            };
            return out;
        }

        // init the pie
        $(".exp").donutpie();

        // update it with some fake data
        $(".exp").donutpie('update', get_data());

        // keep updating every x sec
        setInterval( function () {
            $(".exp").donutpie('update', get_data());
        }, 1200);

    });

</script>


<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 2,
            center: new google.maps.LatLng(2.8,-187.3),
            mapTypeId: 'terrain'
        });

        // Create a <script> tag and set the USGS URL as the source.
        var script = document.createElement('script');
        // This example uses a local copy of the GeoJSON stored at
        // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    }

    // Loop through the results array and place a marker for each
    // set of coordinates.
    window.eqfeed_callback = function(results) {
        for (var i = 0; i < results.features.length; i++) {
            var coords = results.features[i].geometry.coordinates;
            var latLng = new google.maps.LatLng(coords[1],coords[0]);
            var marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
        }
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHxq1IQOM8aepyDc5kQYtRxOm6IYRxiWo&callback=initMap">
</script>

<div id="footer">
    <a href="login.php">Home</a> <span>|</span>
    <a href="about.php">About the Database</a> <span>|</span>
    <br>
    <a href="contact.php">Contact</a> <span>|</span>
    <a href="TotalCrime.php">Total Number Crime</a>
</div>

<!---->
<!--<div id="footer">-->
<!--    <a href="login.php">Home</a> <span>|</span>-->
<!--    <a href="about.php">About the Database</a> <span>|</span>-->
<!--    <a href="contact.php">Contact</a>-->
<!--</div>-->

</body>
</html>