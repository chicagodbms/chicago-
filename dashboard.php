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

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--    <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>-->
<!--    <script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>-->
<!--    <script src="js/jquery.slide.js" type="text/javascript"></script>-->
<!--    <script src="js/jquery-func.js" type="text/javascript"></script>-->
    <link rel="stylesheet" href="css/style_mainstore.css" type="text/css" media="all" />
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
</head>

<body style="background-color: beige">

<div id="top">
    <div class="shell">
        <div id="header">
            <h1 id="logo"><a href="login.php">Online Store</a></h1>
            <div id="navigation">
                <ul>
                    <li><a href="login.php">Home</a></li>
                    <li><a href="about.php">About the Store</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a><li>
                </ul>
            </div>
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

<div id="menu" style="background-color:#bcbcbc;height:800px;width: 29%;float:left">
<!--    <p>database Operation</p>-->
</div>

<div style="height:600px;width: 0.5%;float:left">
<!--    <p>database Operation</p>-->
</div>
<div id="content" style="height:800px;width:57%;px;float:left">
<!--     style="background-color:beige;-->

<!--    <p>content</p>-->
    <div id="map"></div>
    <>
</div>

<div id="chart" style="background-color:#bcbcbc; height:800px;width: 13%;px;float:right">
<!--    <p>layer and chart</p>-->
</div>


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
    <a href="contact.php">Contact</a>
</div>

<!---->
<!--<div id="footer">-->
<!--    <a href="login.php">Home</a> <span>|</span>-->
<!--    <a href="about.php">About the Database</a> <span>|</span>-->
<!--    <a href="contact.php">Contact</a>-->
<!--</div>-->

</body>
</html>