online-crime-database
=====================

Online Crime database using PHP, javaScript, Oracle SQL server database

Introduction
In this modern world, with the advance of science and technology, data analysis is widely
applied in different kinds of fields, such as financial, education, business, and retail. Our group
investigated many modern databases, and found that abundant software are designed for those
modern databases. However, our group can’t stand for doing the same work other people
already did, we want to do more challenge and look for an uncommon, suitable, and significant
topic for this important project. After several discussion, finally, we found a tough but interesting
topic, which has potential, and challenge to be finished. The topic is “criminal database system”.
Motivation
The first reason is that our group decide to apply data analysis on criminal incidents since we
want to help people to figure out the security of their living environment, and find better place for
living. People have demand and right to find a safe place for living. Second, help police,
scholars or public who have demand for criminal investigation or criminal research, to have
analytic tools to analyze criminal incidents or predict the pattern of criminal behavior on our
database. This will let users to extract some useful information from the criminal data or have
opportunity to find criminal incidents pattern. Third, since database management serves as the
intermediary between the user and database, designing a database system with good user interface is also an important goal. That is, if we provide abundant and important data, however,
users cannot utilize them easily, this will let users waste time for learning how to use our
database, decrease users’ willing for doing research, and have great impact on users’
experience. So we have to design an excellent user interface that users have no difficulty to do
some application or add customized function on our database. Fourth, warning local
government that which area is danger. This can help governments to assign policeman to those
danger area effectively and then decrease crime rate.
This application gives users a hint where and when crimes tend to occur. It helps people to
avoid crimes. It also give officers a hint how to reduce the crimes. For example, if cluster of
crimes is found at a place at certain time, there can be more police patrol at that area at the
specific time.

Functionality of the system
This application is about crime. It allows users to explore the data with flexibility and they can
find interesting results themselves. We will accomplish these following requirements in our
application.
1. The users can search crimes under certain condition such like time, date or season. For
example, user can search the total number of crimes occured in Chicago 2015, or the
number of Narcotics crime occurred between 8:00 PM to 6:00 AM in Chicago 2015.
Besides showing the numbers and the charts, the map will show the locations of
selected crimes accordingly.
2. Additionally, the users can create bins and compare crime frequency under different
conditions. For example, the average crash frequencies during each hour of the day; the
number of crimes for different crime types; crime frequency for each day of the week;
crime frequency for different months or seasons. The results will be shown in bar chart
with value labels, which is better for users to make comparisons. Users can also choose
to use pie charts to present the percentage of each category.
3. Obviously, crimes have association with location. We design this application to show
crimes with location on map. The location can be described with various approach, such
as latitude and longitude, zipcode or block group. Users can find out which areas are
more likely to occur crimes and take more attention. Furthermore, it can be different
types of crimes such as steal and crash. It will also show on the map. With these
information, users can learn about relationship between type of crime and regions.
4. This application will enable the users to explore relationships and trends between crime
and other variables. For example, the relationship of crime frequency and percentage of
bachelor degree people in the neighborhood (relationship of crime frequency and
neighborhood education); the relationship of crime frequency and neighborhood median
income. The relationship is not limited to crime frequency only. For example, the user
can also explore whether there is any relationship between crime type and the time the
crime occured.
5. This application also allow users to customize their queries. For example, the user can
calculate the percentage of crimes with criminals being arrested, and then find out what
type of crash has higher percent of criminals being arrested.
6. The map can show the area with clusters of crimes. The cluster of crimes can also be
explored in three dimensions. For example, the user can plot a 3D chart with three
variables: time of the day, neighborhood income and percent of old people (people older
than 65). This chart will show the clusters of crimes.
Data information and source
The data is from Chicago Police Department's CLEAR (Citizen Law Enforcement Analysis and
Reporting) system (contact Research & Development Division of the Chicago Police
Department at 312.745.6071, RDAnalysis@chicagopolice.org). Our database reflects reported
incidents of crime that occurred in the City of Chicago from 2001 to present. Each year the
number of crime is about 150K and we firstly use the data of 2015.
Each incidents of crime have a unique crime ID for each criminal record. And it also contains
other information: Primary Type, Date, Whether or not arrest, District, Number of Reported
Crimes,
Domestic, Location Description, Location(Community Areas, ZIP Codes Location, Wards),
Education, Ethnic, Gender.
