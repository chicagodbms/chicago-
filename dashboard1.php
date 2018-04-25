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

<div id="menu" style="background-color:#bcbcbc;height:800px;width: 27%;float:left">


<!--    <p>database Operation</p>-->
<!--    <form action="dashboard.php" method="post">-->
<!--<!--        Customer Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<input type="text" name="cust_email" /> <br>-->
<!--<!--        Customer Password: <input type="password" name="cust_password" /> <br>-->
<!--       <p>search case number < 5</p>-->
<!--        <input type="submit" class="myButton" value="search2"/> <br>-->
<!--    </form>-->
<!--    <form action="DaterangeSearch.php" method="post">-->
<!--        Date_Start:<input type="text" name="Date_Start" /> <br>-->
<!--        Date_End:<input type="text" name="Date_End" /> <br>-->
<!---->
<!--        <input type="submit" class="myButton" value="Search"/> <br>-->
<!--    </form>-->
<!--    <form action="TotalCrime.php" method="post">-->
<!---->
<!--        <input type="submit" class="myButton" value="TotalCrime"/> <br>-->
<!--    </form>-->
<!--    <form action="update.php" method="post">-->
<!--        CASENUMBER:<input type="text" name="CASENUMBER" /> <br>-->
<!--        ADDRESS:<input type="text" name="ADDRESS" /> <br>-->
<!--        IUCR:<input type="text" name="IUCR" /> <br>-->
<!--        ARRESTED:<input type="text" name="ARRESTED" /> <br>-->
<!--        DOMESTIC:<input type="text" name="DOMESTIC" /> <br>-->
<!--        C_BEAT:<input type="text" name="C_BEAT" /> <br>-->
<!--        WARD:<input type="text" name="WARD" /> <br>-->
<!--        TIME_STAMP:<input type="text" name="TIME_STAMP" /> <br>-->
<!--        LAT:<input type="text" name="LAT" /> <br>-->
<!--        LONG:<input type="text" name="LONG" /> <br>-->
<!--        <input type="submit" class="myButton" value="TotalCrime"/> <br>-->
<!--    </form>-->

<!--    <div class="main-agilerow">-->
        <div class="sub-w3lsright agileits-w3layouts">
            <form action="manageData.php" method="post">
                <input type="text"  class="name" name="name" placeholder="Case Number" required="">

                <div class="clear"> </div>
                <p>Advanced Filter</p>
                <div class="form-control">
                    <div class="main-row">
                        <select name="country">
                            <option value="none" selected="" disabled="">Select Time</option>
                            <option value="Job-2">0-3 AM/option>
                            <option value="Job-3">3-6 AM</option>
                            <option value="Job-4">6-9 AM</option>
                            <option value="Job-5">9-12 AM</option>
                            <option value="Job-6">0-3 PM</option>
                            <option value="Job-6">3-6 PM</option>
                            <option value="Job-6">6-9 PM</option>
                            <option value="Job-6">9-12 PM</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <div class="main-row">
                            <select name="country">
                                <option value="none" selected="" disabled="">Arrest Domes</option>

                                <option value="Job-2">True</option>
                                <option value="Job-3">False</option>
                            </select>
                            <i></i>
                        </div>
                    </div>
                    <div class="content-wthree2">
                        <div class="grid-w3layouts1">
                            <div class="w3-agile1">
                                <label class="rating">Select Type</label>
                                <ul>
                                    <li>
                                        <input type="radio" id="a-option" name="selector1">
                                        <label for="a-option">type1</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="b-option" name="selector1">
                                        <label for="b-option">type2</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="c-option" name="selector1">
                                        <label for="c-option">type3</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="d-option" name="selector1">
                                        <label for="d-option">type4</label>
                                        <div class="check"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"> </div>
                <input type="submit" value="Send">
            </form>
        </div>
<!--    </div>-->

</div>

<div style="height:600px;width: 0.5%;float:left">
<!--    <p>database Operation</p>-->
</div>
<div id="content" style="height:800px;width:50%;px;float:left">
<!--     style="background-color:beige;-->

<!--    <p>content</p>-->
    <div id="map"></div>

</div>

    <div id="chart" style="background-color:#bcbcbc; height:800px;width: 22%;px;float:right">
        <div class="main">
<!--            <div class="w3_agile_main_grids">-->
<!--            <div class="w3_agile_main_grid_left">-->
                <div class="agile_donut_chart agileits_w3layouts_text">
<!--                    <h3>Donut / pie-chart</h3>-->
                    <div class="exp"></div>
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
<!--    <p>layer and chart</p>-->
</div>

<script src="js/d3.min.js"></script>
<script src="js/donut-pie-chart.min.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {

        /**
         [
         {"name" : "JavaScript", "hvalue" : 20 },
         {"name" : "d3", "hvalue" : 2},
         {"name" : "jQuery", "hvalue" : 25},
         {"name" : "SVG", "hvalue" : 5}
         ]
         */
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