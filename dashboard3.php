<!-- <?php
$db = '//oracle.cise.ufl.edu/orcl';
    $conn = oci_connect("weiw", "!Zzz2018", $db);
    $custcase=$_POST["Email"];
    $password=$_POST["Password"];
    
    $query = "select UPASSWORD from CRIMEUSER where UNAME = '".$custcase."'";
    $stid = oci_parse($conn, $query);
   $r = oci_execute($stid);
   $row = oci_fetch_array($stid);
   print($row[0]);
   //if($password!=$row)
?> -->
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
            height: 85%;
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
        <h1 id="logo"><a href="mainpage.php">Online Database</a></h1>
        <div id="navigation">
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="about.php">About the Database</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="TotalCrime.php">TotalNumberTuple</a></li>
            </ul>
        </div>
    </div>
</div>



<div style="10px">&nbsp</div>

<div id="menu" style="background-color:#bcbcbc;height:110%;width: 27%;float:left">


<!--    <p>database Operation</p >-->
<!--    <form action="dashboard.php" method="post">-->
<!--<!--        Customer Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<input type="text" name="cust_email" /> <br>-->
<!--<!--        Customer Password: <input type="password" name="cust_password" /> <br>-->
<!--       <p>search case number < 5</p >-->
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
            <form action="crimedatabase.php" method="post">
                <input type="text"  class="name" name="case_number" placeholder="Case Number" required="">
                <input type="submit" value="Search">
            </form>
           <p>------- Advanced Filter -------</p>
            <form action="connectionTest.php" method="post">
                <div class="clear"> </div>
                <input type="text"  class="name" name="name" placeholder="Start date: dd-mm-yyyy" required="">
                <input type="text"  class="name" name="name" placeholder="End date: dd-mm-yyyy" required="">
                <div>&nbsp;</div>
                <div class="clear"> </div>
                <div class="form-control">
                    <div class="main-row">
                        <select name="time">
                            <option value="none" selected="" disabled="">Select Time</option>
                            <option value="Job-2">0-3 AM</option>
                            <option value="Job-3">3-6 AM</option>
                            <option value="Job-4">6-9 AM</option>
                            <option value="Job-5">9-12 AM</option>
                            <option value="Job-6">0-3 PM</option>
                            <option value="Job-7">3-6 PM</option>
                            <option value="Job-8">6-9 PM</option>
                            <option value="Job-9">9-12 PM</option>
                        </select>
                    </div>
                    <div class="main-row">
                        <select name="district">
                            <option value="none" selected="" disabled="">Select District</option>
                            <option value="Job-2">district 1</option>
                            <option value="Job-3">district 2</option>
                            <option value="Job-4">district 3</option>
                            <option value="Job-5">district 4</option>
                            <option value="Job-6">district 5</option>
                            <option value="Job-7">district 6</option>
                            <option value="Job-8">district 7</option>
                            <option value="Job-9">district 8</option>
                            <option value="Job-10">district 9</option>
                            <option value="Job-11">district 10</option>
                            <option value="Job-12">district 11</option>
                            <option value="Job-13">district 12</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <div class="main-row">
                            <select name="domestic">
                                <option value="none" selected="" disabled="">Domestic</option>
                                <option value="Job-2">True</option>
                                <option value="Job-3">False</option>
                            </select>
                            <i></i>
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="main-row">
                            <select name="arrest">
                                <option value="none" selected="" disabled="">Arrest</option>
                                <option value="Job-2">True</option>
                                <option value="Job-3">False</option>
                            </select>
                            <i></i>
                        </div>
                    </div>
                    <div class="content-wthree2">
                        <div class="grid-w3layouts1">
                            <div class="w3-agile1">
                                <label class="rating">&nbsp</label>
                                <label class="rating">Select Crime Type</label>
                                <ul>
                                    <li>
                                        <input type="radio" id="a-option" name="selector1">
                                        <label for="a-option">HOMICIDE</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="b-option" name="selector2">
                                        <label for="b-option">ASSAULT</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="c-option" name="selector3">
                                        <label for="c-option">ROBBERY</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="d-option" name="selector4">
                                        <label for="d-option">BATTERY</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="e-option" name="selector5">
                                        <label for="e-option">RITUALISM</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="f-option" name="selector6">
                                        <label for="f-option">BURGLARY</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="g-option" name="selector7">
                                        <label for="g-option">THEFT</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="h-option" name="selector8">
                                        <label for="h-option">ARSON</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="i-option" name="selector9">
                                        <label for="i-option">GAMBLING</label>
                                        <div class="check"></div>
                                    </li>
                                    
                                    <li>
                                        <input type="radio" id="j-option" name="selector11">
                                        <label for="j-option"> PROSTITUTION</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="k-option" name="selector12">
                                        <label for="k-option">KIDNAPPING</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="l-option" name="selector13">
                                        <label for="l-option">NARCOTICS</label>
                                        <div class="check"></div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"> </div>
                <input type="submit" value="Search">
            </form>
            <form action="adminpage.php">
                <input type="submit" value="Insert/Delete">
            </form>
        </div>

<!--    </div>-->

</div>

<div style="height:110%;width: 0.5%;float:left">
<!--    <p>database Operation</p >-->
</div>
<div id="content" style=" height:110%;width:50%;px;float:left">
<!--     style="background-color:beige;-->

<!--    <p>content</p >-->
    <div id="map"></div>
    <!-- <div><div id="txtHint">Search result will be listed here</div> </div> -->
</div>

    <div id="chart" style="background-color:#bcbcbc; height:110%;width: 22%;px;float:right">
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
<!--    <p>layer and chart</p >-->
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
    <a href="mainpage.php">Home</a> <span>|</span>
    <a href="about.php">About the Database</a> <span>|</span>
    <a href="contact.php">Contact</a>
</div>

<!---->
<!--<div id="footer">-->
<!--    < a href="login.php">Home</ a> <span>|</span>-->
<!--    < a href="about.php">About the Database</ a> <span>|</span>-->
<!--    < a href="contact.php">Contact</ a>-->
<!--</div>-->

</body>
</html>