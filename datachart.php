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
<title>datachart</title>
<!-- Custom-Theme-files -->
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
<body>
	<div class="main">
		<h1>Trendy Charts Widget</h1>
		<div class="w3_agile_main_grids">
			<div class="w3_agile_main_grid_left">
				<div class="agile_donut_chart agileits_w3layouts_text">
					<h3>Donut / pie-chart</h3>
					<div class="exp"></div>
				</div>
			</div>



			<div class="w3_agile_main_grid_right">
				<div class="w3_agileits_skills agileits_w3layouts_text">
					<h3>Animated Skills Bar</h3>
					<div class="skillbar" data-percent="85">
					  <span class="skillbar-title" style="background: #d35400;">HTML5</span>
					  <p class="skillbar-bar" style="background: #e67e22;"></p>
					  <span class="skill-bar-percent"></span>
					</div>
					<!-- End Skill Bar -->

					<div class="skillbar" data-percent="88">
					  <span class="skillbar-title" style="background: #2980b9;">CSS3</span>
					  <p class="skillbar-bar" style="background: #3498db;"></p>
					  <span class="skill-bar-percent"></span>
					</div>
					<!-- End Skill Bar -->

					<div class="skillbar" data-percent="75">
					  <span class="skillbar-title" style="background: #2c3e50;">jQuery</span>
					  <p class="skillbar-bar" style="background: #2c3e50;"></p>
					  <span class="skill-bar-percent"></span>
					</div>
					<!-- End Skill Bar -->

					<div class="skillbar" data-percent="55">
					  <span class="skillbar-title" style="background: #46465e;">PHP</span>
					  <p class="skillbar-bar" style="background: #5a68a5;"></p>
					  <span class="skill-bar-percent"></span>
					</div>
					<!-- End Skill Bar -->
				</div>


			</div>
			<div class="clear"> </div>
			<div class="wthree_bars_bottom">
				<div class="agileinfo_bars_bottom_left">
					<div class="agileits_gauge_meter agileits_w3layouts_text">
						<h3>Gauge Meter</h3>
						<div class="js-gauge js-gauge--1 gauge"></div>
					</div>
					<div class="w3_spider_graph agileits_w3layouts_text">
						<h3>Spider Graph</h3>
						<div id="spidergraphcontainer"></div>
					</div>
				</div>
				<div class="agileinfo_bars_bottom_right">
					<div class="w3l_candle_sticks agileits_w3layouts_text">
						<h3>Candlesticks Graph</h3>
						<div id="example-8"></div>
					</div>
					<div class="w3l_area_chart agileits_w3layouts_text">
						<h3>Area Chart</h3>
						<div id="graph"></div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="w3layouts_copyright">
			<p>© 2017 Trendy Charts Widget. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
	<!-- donut-chart -->
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
				  var props = ['javascript', "d3", "jQuery", "SVG"];
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
	<!-- //donut-chart -->





	 skill-bars
		<script src="js/skill.bars.jquery.js"></script>
		<script>

		$(document).ready(function(){

			$('.skillbar').skillBars({
				from: 0,
				speed: 4000,
				interval: 100,
				decimals: 0,
			});

		});

		</script>
	 //skill-bars





	 gauge-meter
		<script type="text/javascript" src="js/raphael-min.js"></script>
		<script type="text/javascript" src="js/kuma-gauge.jquery.js"></script>
		<script>
			$('.js-gauge--1').kumaGauge({
				value : Math.floor((Math.random() * 99) + 1)
			});

			$('.js-gauge--1').kumaGauge('update', {
				value : Math.floor((Math.random() * 99) + 1)
			});

			var update = setInterval(function() {
				var newVal = Math.floor((Math.random() * 99) + 1);
				$('.js-gauge--1').kumaGauge('update',{
					value : newVal
				});
			}, 1000);
		</script>
	 //gauge-meter
	 candle-sticks
		<script type="text/javascript">
		  // Generate data

		  var data = [];

		  var time = new Date('Dec 1, 2013 12:00').valueOf();

		  var h = Math.floor(Math.random() * 100);
		  var l = h - Math.floor(Math.random() * 20);
		  var o = h - Math.floor(Math.random() * (h - l));
		  var c = h - Math.floor(Math.random() * (h - l));

		  var v = Math.floor(Math.random() * 1000);

		  for (var i = 0; i < 30; i++) {
			data.push([time, o, h, l, c, v]);
			h += Math.floor(Math.random() * 10 - 5);
			l = h - Math.floor(Math.random() * 20);
			o = h - Math.floor(Math.random() * (h - l));
			c = h - Math.floor(Math.random() * (h - l));
			v += Math.floor(Math.random() * 100 - 50);
			time += 30 * 60000; // Add 30 minutes
		  }
		</script>
		<script type="text/javascript" src="js/jquery.jqcandlestick.min.js"></script>
		<script type="text/javascript">
		  $(function() {
			$('#example-8').jqCandlestick({
			  data: data,
			  theme: 'light',
			  yAxis: [{
				height: 7, // 7 / (7 + 3)
			  }, {
				height: 3, // 3 / (7 + 3)
			  }],
			  series: [{
				type: 'candlestick',
				upStroke: '#0C0',
				downStroke: '#C00',
				downColor: 'rgba(255, 0, 0, 0.4)',
			  }, {
				type: 'column',
				name: 'VOLUME',
				yAxis: 1,
				stroke: '#00C',
				color: 'rgba(0, 0, 255, 0.5)',
			  }],
			});
		  });
		</script>
	<!-- //candle-sticks -->
	<!-- spider-graph -->
		<script src="js/jquery.spidergraph.js"></script>
		<script>
			$(document).ready( function() {

				$('#spidergraphcontainer').spidergraph({
					'fields': ['a','b','c','d','e'],
					'gridcolor': 'rgba(20,20,20,1)'
				});
				$('#spidergraphcontainer').spidergraph('addlayer', {
					'strokecolor': 'rgba(230,104,0,0.8)',
					'fillcolor': 'rgba(230,104,0,0.6)',
					'data': [0, 8, 2, 4, 9]
				});
				$('#spidergraphcontainer').spidergraph('addlayer', {
					'strokecolor': 'rgba(230,204,0,0.8)',
					'fillcolor': 'rgba(230,204,0,0.6)',
					'data': [5, 4, 9, 9, 4]
				});


				$('#spidergraphcontainer').spidergraph('resetdata');

				$('#spidergraphcontainer').spidergraph('setactivedata', {
					'strokecolor': 'rgba(230,104,230,0.8)',
					'fillcolor': 'rgba(230,104,230,0.6)',
					'data': [3, 2, 3, 4, 9]
				});
				$('#spidergraphcontainer').spidergraph('addlayer', {
					'strokecolor': 'rgba(230,204,0,0.8)',
					'fillcolor': 'rgba(230,204,0,0.6)',
					'data': [5, 4, 9, 8, 1]
				});
				$('#spidergraphcontainer').spidergraph('addlayer', {
					'strokecolor': 'rgba(230,104,0,0.8)',
					'fillcolor': 'rgba(230,104,0,0.6)',
					'data': [0, 8, 2, 3, 5]
				});

			});
		</script>
	<!-- //spider-graph -->
	<!-- area -->

		<script src="js/morris.js"></script>
		<script>
			Morris.Area({
			  element: 'graph',
			  data: [
				{x: '2011 Q1', y: 3, z: 3},
				{x: '2011 Q2', y: 2, z: 0},
				{x: '2011 Q3', y: 2, z: 5},
				{x: '2011 Q4', y: 4, z: 4}
			  ],
			  xkey: 'x',
			  ykeys: ['y', 'z'],
			  labels: ['Y', 'Z']
			}).on('click', function(i, row){
			  console.log(i, row);
			});
		</script>
	 //area
	</div>
</body>
</html>