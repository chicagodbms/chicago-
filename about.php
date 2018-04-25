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
        Online Crime Database |  About the  database
	</title>
  <link rel="stylesheet" href="css/stylemain.css" type="text/css" media="all" />
</head>
<body>

<body background="css/images/chicago4.jpg" style="height: 100%;">
<div id="top">
  <div class="shell">
    <div id="header">
      <h1 id="logo"><a href="login.php">Online Store</a></h1>
      <div id="navigation">
        <ul>
          <li><a href="login.php">Home</a></li>
          <li><a href="about.php">About the Database</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a><li>
        </ul>
      </div>
    </div>
  </div>
</div>

<H1>About This Online Crime Database</H1>
<h3>
    Online Crime database using PHP, javaScript, Oracle SQL server database

</h3>
<p>Functionality of the system This application is about crime. It allows users to explore the data with flexibility and they can find interesting results themselves. We will accomplish these following requirements in our application.

</p>
<!--<div  align="center">-->
<!--<div id="slider">-->
<!--                <div id="slider-holder">-->
<!--                    <ul>-->
<!--                        <li><img src="css/images/slide1.jpg"  /></li>-->
<!--                        <li><img src="css/images/slide2.jpg" alt="" /></li>-->
<!--                        <li><img src="css/images/slide1.jpg" alt="" /></li>-->
<!--                        <li><img src="css/images/slide2.jpg" alt="" /></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div id="slider-nav"> <a href="#" class="prev">Previous</a> <a href="#" class="next">Next</a> </div>-->
<!--            </div>-->
<!--</div>-->
<p>The users can search crimes under certain condition such like time, date or season. For example, user can search the total number of crimes occured in Chicago 2015, or the number of Narcotics crime occurred between 8:00 PM to 6:00 AM in Chicago 2015. Besides showing the numbers and the charts, the map will show the locations of selected crimes accordingly.
    Additionally, the users can create bins and compare crime frequency under different conditions. For example, the average crash frequencies during each hour of the day;
    the number of crimes for different crime types; crime frequency for each day of the week; crime frequency for different months or seasons. The results will be shown in bar chart with value labels,
    which is better for users to make comparisons. Users can also choose to use pie charts to present the percentage of each category.
    Obviously, crimes have association with location. We design this application to show crimes with location on map. The location can be described with various approach, such as latitude and longitude, zipcode or block group. Users can find out which areas are more likely to occur crimes and take more attention. Furthermore, it can be different types of crimes such as steal and crash.
    It will also show on the map. With these information, users can learn about relationship between type of crime and regions.
    This application will enable the users to explore relationships and trends between crime and other variables. For example, the relationship of crime frequency and percentage of bachelor degree people in the neighborhood (relationship of crime frequency and neighborhood education);
    the relationship of crime frequency and neighborhood median income. The relationship is not limited to crime frequency only. For example, the user can also explore whether there is any relationship between crime type and the time the crime occured.
    This application also allow users to customize their queries. For example, the user can calculate the percentage of crimes with criminals being arrested, and then find out what type of crash has higher percent of criminals being arrested.
    The map can show the area with clusters of crimes. The cluster of crimes can also be explored in three dimensions. For example, the user can plot a 3D chart with three variables: time of the day, neighborhood income and percent of old people (people older than 65). This chart will show the clusters of crimes.
    Data information and source The data is from Chicago Police Department's CLEAR (Citizen Law Enforcement Analysis and Reporting) system (contact Research & Development Division of the Chicago Police Department at 312.745.6071, RDAnalysis@chicagopolice.org). Our database reflects reported incidents of crime that occurred in the City of Chicago from 2001 to present. Each year the number of crime is about 150K and we firstly use the data of 2015. Each incidents of crime have a unique crime ID for each criminal record. And it also contains other information: Primary Type, Date, Whether or not arrest, District, Number of Reported Crimes, Domestic, Location Description, Location(Community Areas, ZIP Codes Location, Wards), Education, Ethnic, Gender.</p>
<h1>Thanks for coming!
Click <a href = 'login.php'>here</a> to go back to main page.</h1>

<div id="footer">
  <a href="login.php">Home</a> <span>|</span>
  <a href="about.php">About the Store</a> <span>|</span>
  <a href="contact.php">Contact</a> <span>|</span>
  <a href="logout.php">Logout</a>

</div>

</body>
</html>